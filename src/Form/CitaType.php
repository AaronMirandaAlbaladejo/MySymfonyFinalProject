<?php

namespace App\Form;

use App\Entity\Cita;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use App\Validator\Constraints\TelefonoMovil;
use App\Validator\Constraints\DniEsp;
use App\Validator\Constraints\NombreConstraint;
use App\Validator\Constraints\EmailConstraint;
use App\Validator\Constraints\CodigoPostalConstraint;



class CitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especialidad')
            ->add('Dni', TextType::class, ['constraints' => [new DniEsp()] ])
            ->add('nombre', TextType::class)
            ->add('direccion', TextType::class, ['required' => false] )
            ->add('telefono', TextType::class, ['constraints' => [new TelefonoMovil()] ])
            ->add('email', EmailType::class)
            ->add('descripcion', TextAreaType::class)

        ;

        $builder->add('Enviar', SubmitType::class, ['attr' => ['class' => 'btn btn-primary'], 'label' => 'Enviar' ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cita::class,
        ]);
    }
}
