<?php

namespace App\Controller;

use App\Entity\Mail;
use Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MailController implements  SerializerInterface, ContextAwareDenormalizerInterface, ContextAwareDecoderInterface
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index()
    {
        $data = file_get_contents('/data/beyond-mail.json');
        $data = $this->decode($data, 'json');

        //$serializer->decode($data, 'json')
        //$serializer->denormalize($data, 'Mail', 'json')
        ///////////////////////////
        //$serializer->deserialize($data, Mail::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $mail]);
        //////////////////////////
        //$content_beyond_mail = json_decode($json_beyond_mail, true);
        ///////////////////:
        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
            $this->denormalize($data, 'Mail', 'json')
           // 'content_beyond_mail' => $content_beyond_mail,
        ]);
    }
}
