<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageAcceuilController extends AbstractController
{
    #[Route('/', name: 'app_page_acceuil')]
    public function index(string $name = null): Response
    {
        return $this->render('page_acceuil/index.html.twig', [
            'controller_name' => 'PageAcceuilController',
        ]);
    }
}
