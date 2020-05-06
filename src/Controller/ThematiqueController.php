<?php

namespace App\Controller;

use App\Entity\Thematique;
use App\Form\ThematiqueType;
use App\Repository\ThematiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/thematique")
 */
class ThematiqueController extends AbstractController
{
    /**
     * @Route("/", name="thematique_index", methods={"GET"})
     */
    public function index(ThematiqueRepository $thematiqueRepository): Response
    {
        return $this->render('thematique/index.html.twig', [
            'thematiques' => $thematiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="thematique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $thematique = new Thematique();
        $form = $this->createForm(ThematiqueType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($thematique);
            $entityManager->flush();

            return $this->redirectToRoute('thematique_index');
        }

        return $this->render('thematique/new.html.twig', [
            'thematique' => $thematique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="thematique_show", methods={"GET"})
     */
    public function show(Thematique $thematique): Response
    {
        return $this->render('thematique/show.html.twig', [
            'thematique' => $thematique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="thematique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Thematique $thematique): Response
    {
        $form = $this->createForm(ThematiqueType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thematique_index');
        }

        return $this->render('thematique/edit.html.twig', [
            'thematique' => $thematique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="thematique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Thematique $thematique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thematique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($thematique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('thematique_index');
    }
}
