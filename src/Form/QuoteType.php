<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [

            ])
            ->add('company_size', TextType::class, [

            ])
            ->add('admin_panel', CheckboxType::class, [

            ])
            ->add('start_project_date', DateType::class, [

            ])
            ->add('duration', TextType::class, [

            ])
            ->add('budget', NumberType::class, [

            ])
            ->add('details', TextareaType::class, [

            ])
            ->add('name', TextType::class, [

            ])
            ->add('phone', IntegerType::class, [
                'required' => false
            ])
            ->add('email', EmailType::class, [

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
