<?php

namespace App\Form;

use App\Entity\Stars;
use App\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Título'
            ])
            ->add('director', TextType::class, [
                'label' => 'Director'
            ])
            ->add('genres', TextType::class, [
                'label' => 'Géneros',
                'attr' => [
                    'placeholder' => 'Action, Crime'
                ]
            ])
            ->add('year', IntegerType::class, [
                'label' => 'Año'
            ])
            ->add('poster', TextType::class, [
                'label' => 'Póster (URL)'
            ])
            ->add('mainActors', TextType::class, [
                'label' => 'Actores protagonistas'
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Sinopsis'
            ])
            ->add('stars', EntityType::class, [
                'class' => Stars::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Estrellas'
            ])
            ->add('Enviar', SubmitType::class)
            ->add('Resetear', ResetType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
