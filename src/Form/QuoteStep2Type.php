<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class QuoteStep2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('company_size', ChoiceType::class, [
                'required' => true,
                'label' => 'Taille de votre société ?',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'choices' => [
                    'Particulier' => 'Particulier',
                    'Unipersonnel' => 'Unipersonnel',
                    'De 2 à 5 salariés' => 'De 2 à 5 salariés',
                    'De 6 à 15 salariés' => 'De 6 à 15 salariés',
                    'De 16 à 30 salariés' => 'De 16 à 30 salariés',
                    'De 31 à 60 salariés' => 'De 31 à 60 salariés',
                    'De 61 à 100 salariés' => 'De 61 à 100 salariés',
                    'Plus de 100 salariés' => 'Plus de 100 salariés',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Choice(
                        [
                            'choices' => [
                                'Particulier' => 'Particulier',
                                'Unipersonnel' => 'Unipersonnel',
                                'De 2 à 5 salariés' => 'De 2 à 5 salariés',
                                'De 6 à 15 salariés' => 'De 6 à 15 salariés',
                                'De 16 à 30 salariés' => 'De 16 à 30 salariés',
                                'De 31 à 60 salariés' => 'De 31 à 60 salariés',
                                'De 61 à 100 salariés' => 'De 61 à 100 salariés',
                                'Plus de 100 salariés' => 'Plus de 100 salariés',
                            ],
                            'message' => 'Seul les options de la liste sont valide'
                        ])
                ]
            ])
            ->add('company_name', TextType::class, [
                'required' => false,
                'label' => 'Nom de la société',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Suivant'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
