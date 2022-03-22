<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_page_connexion')]
    public function index(): Response
    {
        return $this->render('page_connexion/index.html.twig', [
            'controller_name' => 'PageConnexionController',
        ]);
    }
}
