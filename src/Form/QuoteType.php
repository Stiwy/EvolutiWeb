<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class QuoteType extends AbstractType
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
                    'Unipersonnel' => 'Unipersonnel',
                    'De 2 à 5 salariés' => 'De 2_à_5_salariés',
                    'De 6 à 15 salariés' => 'De 6_à_15_salariés',
                    'De 16 à 30 salariés' => 'De 16_à_30_salariés',
                    'De 31 à 60 salariés' => 'De 31_à_60_salariés',
                    'De 61 à 100 salariés' => 'De 61_à_100_salariés',
                    'Plus de 100 salariés' => 'Plus_de_100_salariés',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[a-z1-9àé'-_]+$/"),
                    new Choice(
                        [
                            'choices' => [
                                'Unipersonnel' => 'Unipersonnel',
                                'De 2 à 5 salariés' => 'De_2_à_5_salariés',
                                'De 6 à 15 salariés' => 'De_6_à_15_salariés',
                                'De 16 à 30 salariés' => 'De_16_à_30_salariés',
                                'De 31 à 60 salariés' => 'De_31_à_60_salariés',
                                'De 61 à 100 salariés' => 'De_61_à_100_salariés',
                                'Plus de 100 salariés' => 'Plus_de_100_salariés',
                            ],
                            'message' => 'Seul les options de la liste sont valide'
                        ])
                ]
            ])
            ->add('admin_panel', ChoiceType::class, [
                'label' => 'Souhaitez-vous un panneau d\'administration',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'choices' => [
                    'Non' => false,
                    'Oui' => true
                ],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[a-z]+$/"),
                    new Choice(
                        [
                            'choices' => [
                                'Non' => false,
                                'Oui' => true
                            ],
                            'message' => 'Seul les options de la liste sont valide'
                        ]),
                    new Type('boolean')
                ]
            ])
            ->add('start_project_date', DateType::class, [
                'required' => False,
                'label' => 'Date de début du projet souhaité',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'widget' => 'single_text',
                'constraints' => [
                    new GreaterThan('today')
                ]
            ])
            ->add('budget', NumberType::class, [
                'required' => False,
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
            ->add('details', TextareaType::class, [
                'required' => False,
                'label' => 'Ajouter des informations pour votre projet',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
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
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Votre nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
            ])
            ->add('phone', IntegerType::class, [
                'required' => false,
                'label' => 'Votre numéro de téléphone',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'Votre e-mail',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-input'
                ],
                'constraints' => [
                    new Email()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le devis'
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
