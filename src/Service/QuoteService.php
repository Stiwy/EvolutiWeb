<?php
namespace App\Service;

use \App\Models\Quote;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\Date;

class QuoteService
{

    public function calcul(Quote $quote): string
    {
        $priceType = $this->type($quote->getType());
        $priceAdminPanel = $this->adminPanel($quote->getAdminPanel());
        $priceStartProjectDate = $this->startProjectDate($quote->getStartProjectDate());

        $companySize = $this->companySize($quote->getCompanySize());

        $price = ($priceType + $priceAdminPanel + $priceStartProjectDate) * $companySize;

        return number_format($price, 0, ',', ' ') . ' €';
    }

    private function type(string $type): int
    {
        return match ($type) {
            'Site e-commerce' => 3500,
            'Site vitrine' => 900,
            'Site marketplace' => 5000,
            'Réseau social' => 2400,
            'Blog' => 1200,
            'Intranets', 'Administration' => 1800,
            'ERP', 'CRM' => 2500,
            'Autre' => 2200,
            default => throw new NotFoundHttpException('Le devis est invalide', null, 404),
        };
    }

    private function adminPanel(bool $adminPanel): int
    {
        return $adminPanel ? 900 : 0;
    }

    private function startProjectDate(?\DateTime $startProjectDate): int {
        $today = new \DateTime();
        $todayPlus30Day = $today->add(new \DateInterval('P30D'));

        return $startProjectDate < $todayPlus30Day ? 600 : 0;
    }

    private function companySize(string $size): float
    {
        return match ($size) {
            'Unipersonnel','Particulier' => 1,
            'De 2 à 5 salariés' => 1.20,
            'De 6 à 15 salariés' => 2,
            'De 16 à 30 salariés' => 2.60,
            'De 31 à 60 salariés' => 3,
            'De 61 à 100 salariés' => 4,
            'Plus de 100 salariés' => 6,
            default => throw new NotFoundHttpException('Le devis est invalide', null, 404),
        };
    }
}