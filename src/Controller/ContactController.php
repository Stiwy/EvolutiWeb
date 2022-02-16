<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Models\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, Session $session): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $to      = 'caritey@protonmail.com';
            $subject = 'Contact client';
            $message = 'Bonjour !';
            $headers = 'From: ' . $contact->getEmail() . "\r\n" .
                'Content-type: text/html;';

            mail($to, $subject, $message, $headers);


            $session->start();
            $session->getFlashBag()->add('success', 'Votre e-mail a bien été envoyé !');
        }

        return $this->renderForm('contact/index.html.twig', compact('form'));
    }
}
