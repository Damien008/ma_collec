<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre"
            ])
            ->add('posterFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ])
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
            ->add('synopsis', TextareaType::class)
            ->add('country', TextType::class, [
                'label' => "Pays"
            ])
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
                'label' => 'Date de sortie'
            ])
            ->add('duration', TextType::class, [
                'label' => "Durée (en minutes)"
            ])
            ->add('trailer', TextType::class, [
                'label' => 'Trailer (lien Youtube uniquement)'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
