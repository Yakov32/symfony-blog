<?php

namespace App\Controller;

use App\Service\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(MessageService $messageService): Response
    {
        return $this->render('default/index.html.twig');
    }

}
