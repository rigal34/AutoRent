<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// je rajoute des champs a mon formulaire de contact

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
        'label' => 'Votre adresse e-mail',
        'attr' => ['placeholder' => 'nom@exemple.com']

])
        ->add('subject', TextType::class, [
            'label' => 'Sujet de votre message',
            'attr' => ['placeholder' => 'Demande d\'information']
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Votre message',
            'attr' => ['rows' => 5]
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Envoyer le message',
            'attr' => ['class' => 'btn btn-primary mt-3']






    ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
