<?php

namespace App\Controller;

use App\Entity\Fluide;
use App\Repository\FluideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(FluideRepository $fluide): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'fluide' => $fluide->findAll(),
        ]);
    }
}
