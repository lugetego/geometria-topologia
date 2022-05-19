<?php

namespace App\Form;

use App\Entity\Registro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class EvaluacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'aceptado',
                ChoiceType::class,
                [
                    'choices' => [
                        'Si' => true,
                        'No' => false,
                    ],
                    'expanded' => true,
                    'label'=>'Aceptado',
                ]
            )
            ->add('comentarios', TextareaType::class,array(
                'required' => false,
                'label'=>'Comentarios'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,
        ]);
    }
}