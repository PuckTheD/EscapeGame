<?php

namespace App\Controller;

use App\Entity\Progression;
use App\Form\ProgressionType;
use App\Repository\ProgressionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/progression")
 */
class ProgressionController extends AbstractController
{
    /**
     * @Route("/", name="progression_index", methods={"GET"})
     */
    public function index(ProgressionRepository $progressionRepository): Response
    {
        return $this->render('progression/index.html.twig', [
            'progressions' => $progressionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="progression_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $progression = new Progression();
        $form = $this->createForm(ProgressionType::class, $progression);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($progression);
            $entityManager->flush();

            return $this->redirectToRoute('progression_index');
        }

        return $this->render('progression/new.html.twig', [
            'progression' => $progression,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="progression_show", methods={"GET"})
     */
    public function show(Progression $progression): Response
    {
        return $this->render('progression/show.html.twig', [
            'progression' => $progression,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="progression_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Progression $progression): Response
    {
        $form = $this->createForm(ProgressionType::class, $progression);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('progression_index');
        }

        return $this->render('progression/edit.html.twig', [
            'progression' => $progression,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="progression_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Progression $progression): Response
    {
        if ($this->isCsrfTokenValid('delete'.$progression->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($progression);
            $entityManager->flush();
        }

        return $this->redirectToRoute('progression_index');
    }
}
