<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('recherche', TextType::class, [
            'label' => 'Rechercher un véhicule',
            'required' => false,
            'attr' => ['placeholder' => 'Tapez votre recherche...']
        ])
            
            ->add('prixMin', NumberType::class, [
                'label' => 'Prix minimum (€/jour)',
                'required' => false,
                'attr' => [
                    'placeholder' => '30'
                ]
            ])

            ->add('marque', ChoiceType::class, [
            'choices' => [
                'Toutes les marques' => '',
                'BMW' => 'bmw',
                'Mercedes' => 'mercedes',
                'Renault' => 'renault',
            ],
            'required' => false
        ])
            ->add('prixMax', NumberType::class, [
                'label' => 'Prix maximum (€/jour)',
                'required' => false,
                'attr' => [
                    'placeholder' => '50'
                ]
            ])
            ->add('chercher', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => ['class' => 'btn btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}

