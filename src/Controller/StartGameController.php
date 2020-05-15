<?php

namespace App\Controller;

use App\Entity\Scenario;
use App\Repository\ScenarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StartGameController extends AbstractController
{
    /**
     * @Route("/mission-instructions-beyond", name="read_mission")
     */
    public function show(): Response
    {

        // creation de la team

        return $this->render('start_game/mission-instructions-beyond.html.twig', [
            'controller_name' => 'StartGameController',
        ]);
    }
}
