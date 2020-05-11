<?php

namespace App\Controller;

use App\Entity\Indice;
use App\Form\IndiceType;
use App\Repository\IndiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/indice")
 */
class IndiceController extends AbstractController
{
    /**
     * @Route("/", name="indice_index", methods={"GET"})
     */
    public function index(IndiceRepository $indiceRepository): Response
    {
        return $this->render('indice/index.html.twig', [
            'indices' => $indiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="indice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $indice = new Indice();
        $form = $this->createForm(IndiceType::class, $indice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($indice);
            $entityManager->flush();

            return $this->redirectToRoute('indice_index');
        }

        return $this->render('indice/new.html.twig', [
            'indice' => $indice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="indice_show", methods={"GET"})
     */
    public function show(Indice $indice): Response
    {
        return $this->render('indice/show.html.twig', [
            'indice' => $indice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="indice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Indice $indice): Response
    {
        $form = $this->createForm(IndiceType::class, $indice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indice_index');
        }

        return $this->render('indice/edit.html.twig', [
            'indice' => $indice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="indice_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Indice $indice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$indice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($indice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('indice_index');
    }
}
