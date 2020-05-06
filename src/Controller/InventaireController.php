<?php

namespace App\Controller;

use App\Entity\Inventaire;
use App\Form\InventaireType;
use App\Repository\InventaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/inventaire")
 */
class InventaireController extends AbstractController
{
    /**
     * @Route("/", name="inventaire_index", methods={"GET"})
     */
    public function index(InventaireRepository $inventaireRepository): Response
    {
        return $this->render('inventaire/index.html.twig', [
            'inventaires' => $inventaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="inventaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $inventaire = new Inventaire();
        $form = $this->createForm(InventaireType::class, $inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inventaire);
            $entityManager->flush();

            return $this->redirectToRoute('inventaire_index');
        }

        return $this->render('inventaire/new.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="inventaire_show", methods={"GET"})
     */
    public function show(Inventaire $inventaire): Response
    {
        return $this->render('inventaire/show.html.twig', [
            'inventaire' => $inventaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="inventaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Inventaire $inventaire): Response
    {
        $form = $this->createForm(InventaireType::class, $inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventaire_index');
        }

        return $this->render('inventaire/edit.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="inventaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Inventaire $inventaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inventaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($inventaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('inventaire_index');
    }
}
