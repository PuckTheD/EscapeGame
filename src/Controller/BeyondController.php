<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BeyondController extends AbstractController
{
    /**
     * @Route("/beyond", name="beyond")
     */
    public function index()
    {
        return $this->render('beyond/index.html.twig', [
            'controller_name' => 'BeyondController',
        ]);
    }


    /**
     * @Route("/beyond/mail/", name="beyond-mail")
     */
    public function indexMail()
    {
        $data = file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/mails.json');
        $data = json_decode($data, true);
        return $this->render('beyond/mail.html.twig', [
            'controller_name' => 'MailController',
            'data' => $data
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
