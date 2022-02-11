<?php

namespace App\Controller;

use App\Form\QuoteHomeType;
use App\Form\QuoteStep1Type;
use App\Form\QuoteStep2Type;
use App\Form\QuoteStep3Type;
use App\Models\Quote;
use App\Form\QuoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

#[Route('demande-de-devis')]
class QuoteController extends AbstractController
{
    #[Route('/etape-1', name: 'app_quote_step_1')]
    public function step1(Request $request, Session $session): Response
    {
        $quote = new Quote();

        if (isset($request->request->all()['quote_home'])) {
            $formHomeResponse = $request->request->all()['quote_home'];
            $quote->setType($formHomeResponse['type']);
            $quote->setBudget(number_format($formHomeResponse['budget'], 0, ',', ' ') . '€');
        }

        $quoteForm = $this->createForm(QuoteStep1Type::class, $quote);

        $quoteForm->handleRequest($request);

        if ($quoteForm->isSubmitted() && $quoteForm->isValid()) {
            $session->set('quote', $quote);

            return $this->redirectToRoute('app_quote_step_2');
        }

        return $this->renderForm('quote/step1.html.twig', compact('quoteForm'));
    }

    #[Route('/etape-2', name: 'app_quote_step_2')]
    public function step2(Request $request, Session $session): Response
    {
        $quote = $session->get('quote');

        $quoteForm = $this->createForm(QuoteStep2Type::class, $quote);

        $quoteForm->handleRequest($request);

        if ($quoteForm->isSubmitted() && $quoteForm->isValid()) {
            $session->set('quote', $quote);

            return $this->redirectToRoute('app_quote_step_3');
        }

        return $this->renderForm('quote/step2.html.twig', compact('quoteForm'));
    }

    #[Route('/etape-3', name: 'app_quote_step_3')]
    public function step3(Request $request, Session $session): Response
    {
        $quote = $session->get('quote');

        $quoteForm = $this->createForm(QuoteStep3Type::class, $quote);

        $quoteForm->handleRequest($request);

        if ($quoteForm->isSubmitted() && $quoteForm->isValid()) {
            $session->set('quote', $quote);

            return $this->redirectToRoute('app_quote_step_4');
        }

        return $this->renderForm('quote/step3.html.twig', compact('quoteForm'));
    }

    #[Route('/etape-4', name: 'app_quote_step_4')]
    public function step4(Request $request, Session $session): Response
    {
        $quote = $session->get('quote');

        return $this->render('quote/step4.html.twig');
    }
}
