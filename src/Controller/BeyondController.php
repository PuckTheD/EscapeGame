<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\CurrentGame;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeyondController extends AbstractController
{
    /**
     * @Route("beyond/mission-instructions-beyond", name="read_mission")
     */
    public function show()
    {
        return $this->render('beyond/mission-instructions-beyond.html.twig', [
            'controller_name' => 'BeyondController',
        ]);
    }

    /**
     * @Route("/beyond/start", name="beyond-start")
     */
    public function start(Request $request): Response
    {

        function random($nbr) {
            $chn = '';
            for ($i=1;$i<=$nbr;$i++)
                $chn .= chr(floor(rand(0, 25)+97));
            return $chn;
        }
        $team = new Team();
        $currentGame = new CurrentGame();
        $entityManager = $this->getDoctrine()->getManager();
        $team->setName('Team:'.random(20));
        $entityManager->persist($team);
        //$currentGame->setTeams([$team]);
        $entityManager->persist($currentGame);
        $entityManager->flush();

        return $this->render('beyond/start.html.twig', [
            'controller_name' => 'BeyondController',
            'team' => $team,
            'currentGame' => $currentGame,
        ]);
    }

    /**
     * @Route("/beyond/dashboard", name="beyond-dashboard")
     */
    public function index()
    {
        $data = file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/folders.json');
        $data = json_decode($data, true);
        return $this->render('beyond/index.html.twig', [
            'controller_name' => 'BeyondController',
            'data' => $data,
            dump($data),
        ]);
    }
    /**
     * @Route("/beyond/mail", name="beyond-mail")
     */
    public function indexMail()
    {
        $data = file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/mails.json');
        $data = json_decode($data, true);
        return $this->render('beyond/mail.html.twig', [
            'controller_name' => 'BeyondController',
            'data' => $data,
        ]);
    }
    /**
     * @Route("/beyond/map", name="beyond-map")
     */
    public function showMap()
    {
        return $this->render('beyond/map.html.twig', [
            'controller_name' => 'BeyondController',
        ]);
    }
}
