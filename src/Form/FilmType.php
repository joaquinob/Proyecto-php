<?php

namespace App\Form;

use App\Entity\Stars;
use App\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PisoType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextareaType::class, [
                'label' => 'Titulo'
            ])
            ->add('director',TextareaType::class, [
                'label' => 'Director'
            ])
            ->add('genres',TextareaType::class, [
                'label' => 'Géneros',
                'attr' => [
                    'placeholder' => 'Action', 'Crime'
                ]
            ])
            ->add('year',TextareaType::class, [
                'label' => 'Año'
            ])
            ->add('poster',TextareaType::class, [
                'label' =>'Poster(url)'
            ])
            ->add('mainActors',TextareaType::class, [
                'label' =>'Actores protagonistas'
            ])
            ->add('synopsis',TextareaType::class, [
                'label' =>'Sinopsis'
            ])
            ->add('stars', EntityType::class, [
                'class' => Stars::class,
                'choice_label' => 'stars',
                'multiple' => true,
                
            ])
            ->add('Enviar', SubmitType::class)
            ->add('Resetear', ResetType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
