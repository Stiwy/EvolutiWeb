<?php

namespace App\Controller;

use App\Classes\Quote;
use App\Form\QuoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    public function index(): Response
    {
        $quote = new Quote();
        $quoteForm = $this->createForm(QuoteType::class, $quote);

        return $this->renderForm('quote/_form.html.twig', compact('quoteForm'));
    }
}
