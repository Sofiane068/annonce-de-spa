<?php

namespace App\Controller;

use App\Form\FormulaireInscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adoptant;
use App\Repository\AdoptantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PageInscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_page_inscription')]
    public function index(Request $request, AdoptantRepository $adoptantRepository): Response
    {
        $adoptant = new Adoptant;
        $form = $this->createForm(FormulaireInscriptionType::class, $adoptant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adoptantRepository->add($adoptant);

            return $this->redirectToRoute('app_page_acceuil');
        }

        return $this->render(
            'page_inscription/index.html.twig', 
            [
                'formInscription' => $form->createView(),
            
            ]
        );
    }
}

