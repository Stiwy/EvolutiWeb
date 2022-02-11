<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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

class QuoteStep1Type extends AbstractType
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
            ->add('budget', TextType::class, [
                'required' => false,
                'label' => 'Budget pour le projet',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'constraints' => [
                    new Regex('/^[0-9\s]*[0-9€]+$/')
                ]
            ])
            ->add('admin_panel', CheckboxType::class, [
                'required' => false,
                'label' => 'Souhaitez-vous un espace d\'adminsitation pour votre site ?',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-checkbox'
                ]
            ])
            ->add('start_project_date', DateType::class, [
                'required' => false,
                'label' => 'Date de début de projet souhaitez',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-input'
                ]
            ])
            ->add('details', TextareaType::class, [
                'required' => false,
                'label' => 'Pour faciliter le devis détaillez ajouté des détails ici',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-textarea'
                ]
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
