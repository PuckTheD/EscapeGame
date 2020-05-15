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
}
