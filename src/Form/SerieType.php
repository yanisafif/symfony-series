<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{

    // Cette fonction a été généré par le terminal
    // php bin/console make:form
    // Ensuite on choisit le nom qui finit par Type
    // puis le nom de la table
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Title'
            ])
            ->add('overview', null, [
                'required' => false
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Cancelled' => 'Cancelled',
                    'ended' => 'ended',
                    'returning' => 'returning'
                ],
                'multiple' => false
            ])
            ->add('vote')
            ->add('popularity')
            ->add('genres')
            ->add('firstAirDate', DateType::class, [
                'html5' => true,
                'widget' => 'single_text'
            ])
            ->add('lastAirDate')
            ->add('backdrop')
            ->add('poster')
            ->add('tmdbId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
