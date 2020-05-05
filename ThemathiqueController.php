<?php

namespace App\Controller;

use App\Entity\Themathique;
use App\Form\ThemathiqueType;
use App\Repository\ThemathiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/themathique")
 */
class ThemathiqueController extends AbstractController
{
    /**
     * @Route("/", name="themathique_index", methods={"GET"})
     */
    public function index(ThemathiqueRepository $themathiqueRepository): Response
    {
        return $this->render('themathique/index.html.twig', [
            'themathiques' => $themathiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="themathique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $themathique = new Themathique();
        $form = $this->createForm(ThemathiqueType::class, $themathique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($themathique);
            $entityManager->flush();

            return $this->redirectToRoute('themathique_index');
        }

        return $this->render('themathique/new.html.twig', [
            'themathique' => $themathique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="themathique_show", methods={"GET"})
     */
    public function show(Themathique $themathique): Response
    {
        return $this->render('themathique/show.html.twig', [
            'themathique' => $themathique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="themathique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Themathique $themathique): Response
    {
        $form = $this->createForm(ThemathiqueType::class, $themathique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('themathique_index');
        }

        return $this->render('themathique/edit.html.twig', [
            'themathique' => $themathique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="themathique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Themathique $themathique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$themathique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($themathique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('themathique_index');
    }
}
