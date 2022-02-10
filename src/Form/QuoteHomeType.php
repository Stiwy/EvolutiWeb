<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class QuoteHomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'required' => true,
                'label' => 'Que souhaitez-vous créer ?',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'choices' => [
                    'Site e-commerce' => 'Site_e-commerce',
                    'Site vitrine' => 'Site_vitrine',
                    'Site marketplace' => 'Site_marketplace',
                    'Réseau social' => 'Réseau_social',
                    'Blog' => 'Blog',
                    'Intranets' => 'Intranets',
                    'Administration' => 'Administration',
                    'ERP' => 'ERP',
                    'CRM' => 'CRM',
                    'Autre' => 'Autre',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[a-zé'-_]+$/"),
                    new Choice(
                        [
                            'choices' => [
                                'Site e-commerce' => 'Site_e-commerce',
                                'Site vitrine' => 'Site_vitrine',
                                'Site marketplace' => 'Site_marketplace',
                                'Réseau social' => 'Réseau_social',
                                'Blog' => 'Blog',
                                'Intranets' => 'Intranets',
                                'Administration' => 'Administration',
                                'ERP' => 'ERP',
                                'CRM' => 'CRM',
                                'Autre' => 'Autre'
                            ],
                            'message' => 'Seul les options de la liste sont valide'
                        ])
                ],
            ])
            ->add('budget', NumberType::class, [
                'required' => false,
                'label' => 'Budget pour le projet',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'constraints' => [
                    new Type('float'),
                    new Positive()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Demander un devis'
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
