<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageAcceuilController extends AbstractController
{
    #[Route('/', name: 'app_page_acceuil')]
    public function index(AnnonceRepository $annonceRepository, ImageRepository $imageRepository): Response
    {
        $annonces = $annonceRepository->findBy(criteria: [], orderBy: [
            'DateDeMiseAjour' => 'DESC',
        ], limit: 5);

        return $this->render('page_acceuil/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
}
