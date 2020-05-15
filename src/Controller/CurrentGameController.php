<?php

namespace App\Controller;

use App\Entity\CurrentGame;
use App\Form\CurrentGameType;
use App\Repository\CurrentGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/current/game")
 */
class CurrentGameController extends AbstractController
{
    /**
     * @Route("/", name="current_game_index", methods={"GET"})
     */
    public function index(CurrentGameRepository $currentGameRepository): Response
    {
        return $this->render('current_game/index.html.twig', [
            'current_games' => $currentGameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="current_game_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $currentGame = new CurrentGame();
        $form = $this->createForm(CurrentGameType::class, $currentGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currentGame);
            $entityManager->flush();

            return $this->redirectToRoute('current_game_index');
        }

        return $this->render('current_game/new.html.twig', [
            'current_game' => $currentGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="current_game_show", methods={"GET"})
     */
    public function show(CurrentGame $currentGame): Response
    {
        return $this->render('current_game/show.html.twig', [
            'current_game' => $currentGame,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="current_game_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CurrentGame $currentGame): Response
    {
        $form = $this->createForm(CurrentGameType::class, $currentGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('current_game_index');
        }

        return $this->render('current_game/edit.html.twig', [
            'current_game' => $currentGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="current_game_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CurrentGame $currentGame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$currentGame->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($currentGame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('current_game_index');
    }
}
