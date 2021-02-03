<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('poster')
            ->add('genre', ChoiceType::class, [
                'choices' => [
                    'Drame' => 'Drame',
                    'Science-Fiction' => 'Science-Fiction',
                    'Aventure' => 'Aventure',
                    'Comédie' => 'Comédie',
                    'Western' => 'Western',
                    'Horreur' => 'Horreur',
                    'Policier' => 'Policier',
                    'Catastrophe' => 'Catastrophe',
                    'Action' => 'Action',
                    'Comédie Romantique' => 'Comédie Romantique',
                ]
            ])
            ->add('synopsis')
            ->add('country')
            ->add('support', ChoiceType::class, [
                'choices' => [
                    'DVD' => 'DVD',
                    'Blu-Ray' => 'Blu-Ray',
                    'Blu-Ray 4K' => 'Blu-Ray 4K',
                    'Blu-Ray 3D' => 'Blu-Ray 3D',
                    'Divx' => 'Divx',
                ]
            ])
            ->add('releaseDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('duration')
            ->add('trailer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
