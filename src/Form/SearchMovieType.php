<?php

namespace App\Form;

use App\Entity\Movie;
use App\Service\SearchMovie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre', ChoiceType::class, [
                'required' => false,
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
            ->add('country')
            ->add('support', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'DVD' => 'DVD',
                    'Blu-Ray' => 'Blu-Ray',
                    'Blu-Ray 4K' => 'Blu-Ray 4K',
                    'Blu-Ray 3D' => 'Blu-Ray 3D',
                    'Divx' => 'Divx',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchMovie::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
}
