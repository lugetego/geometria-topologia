<?php

namespace App\Form;

use App\Entity\Registro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre',null, array(
                'label'=>'Nombre(s)',
            ))
            ->add('apaterno', null, array(
                'label'=>'Apellido paterno',
            ))
            ->add('amaterno', null, array(
                'label'=>'Apellido materno',
            ))
         /*   ->add(
                'sexo',
                ChoiceType::class,
                [
                    'choices' => [
                        'Mujer' => 'Mujer',
                        'Hombre' => 'Hombre',
                    ],
                    'expanded' => true
                ]
            )*/
            ->add('nacimiento',BirthdayType::class, array(
                'required' => true,
                'label'=>'Fecha de nacimiento',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                ],
            ))
            ->add('correo', null, array(
                'label'=>'Correo electrónico',
            ))
            ->add('universidad')
            ->add('carrera')
            ->add('semestre')
            ->add('profesor')
            ->add('univProf', null, array(
                'label'=>'Institución del profesor',
            ))
            ->add('correoProf', null, array(
                'label'=>'Correo del profesor',
            ))
            ->add(
                'asistencia',
                ChoiceType::class,
                [
                    'choices' => [
                        'Presencial' => 'Presencial',
                        'Virtual' => 'Virtual',
                    ],
                    'expanded' => true,
                    'label'=>'Forma de asistencia',
                ]
            )
            ->add('historialFile', VichFileType::class, [
                'required' => true,
                'label'=>'Historial académico o cárdex'
            ])
            ->add('beca', ChoiceType::class, [
                'choices'  => [
                    'Solamente alimentación' => 'Solamente alimentación',
                    'Solamente hospedaje' => 'Solamente hospedaje',
                    'Hospedaje y alimentación' => 'Hospedaje y alimentación',
                    'Ninguno'=>'Ninguno'

                ],
                'placeholder' => 'Seleccionar',

            ])
            ->add('vegetariano', TextareaType::class,array(
                    'label'=>'Restricciones de alimentación'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,
        ]);
    }
}