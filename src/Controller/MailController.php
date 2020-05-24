<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index()
    {
        $data = file_get_contents($this->getParameter('kernel.project_dir') . '/public/data/mails.json');
        $data = json_decode($data);
        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
            'data' => $data
        ]);
    }
}
