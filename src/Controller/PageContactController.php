<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\FormulaireContactType;
use App\Repository\ContactFormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageContactController extends AbstractController
{
    #[Route('/contact', name: 'app_page_contact')]
    public function index(Request $request, ContactFormRepository $contactFormRepository ): Response
    {   
        $contact = new ContactForm;
        $form = $this->createForm(FormulaireContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormRepository->add($contact);

            $this->addFlash('success', 'Message envoyé');
            

            return $this->redirectToRoute('app_page_acceuil');
        }

        return $this->render('page_contact/index.html.twig', [
            'formContact' => $form-> createView() ,
        ]);
    }
}
