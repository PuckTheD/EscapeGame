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
     * @Route("/beyond/mail", name="beyond-mail")
     */
    public function indexMail()
    {
        return $this->render('beyond/mail.html.twig', [
            'controller_name' => 'BeyondController',
        ]);
    }
}
