<?php

namespace App\Controller;

use App\Entity\CurrentGame;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StartGameController extends AbstractController
{
    /**
     * @Route("/mission-instructions-beyond", name="read_mission")
     */
    public function show(Request $request): Response
    {
        function random($nbr) {
            $chn = '';
            for ($i=1;$i<=$nbr;$i++)
            $chn .= chr(floor(rand(0, 25)+97));
            return $chn;
        }
        $team = new Team();
        $entityManager = $this->getDoctrine()->getManager();
        $team->setName(random(20));
        $entityManager->persist($team);
        $entityManager->flush();

        return $this->render('start_game/mission-instructions-beyond.html.twig', [
            'controller_name' => 'StartGameController',
            'team' => $team,
        ]);
    }

    /**
     * @Route("/beyond/{id}", name="beyond",  methods={"GET"})
     */
    public function start(Request $request, $id): Response
    {
        $id = $request->query->get('id');
        $currentGame = new CurrentGame();
        $entityManager = $this->getDoctrine()->getManager();
        $currentGame->setTeams($id);
        $entityManager->persist($currentGame);
        $entityManager->flush();

        return $this->render('beyond/index.html.twig', [
            'controller_name' => 'StartGameController',
            'currentGame' => $currentGame,
        ]);
    }






}

