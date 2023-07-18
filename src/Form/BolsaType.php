<?php

namespace App\Form;

use App\Entity\Bolsa;
use App\Entity\Puestos;
use App\Repository\PuestosRepository;
use App\Repository\BolsaRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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



class BolsaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('puesto', EntityType::class, [
                'class' => Puestos::class,
                'query_builder' => function (PuestosRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.Puesto', 'ASC');
                },
                'choice_label' => 'Puesto',
                'placeholder' => 'Selecciona un puesto',
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('Dni', TextType::class, ['constraints' => [new DniEsp()] ])
            ->add('nombre', TextType::class)
            ->add('direccion', TextType::class, ['required' => false] )
            ->add('telefono', TextType::class, ['constraints' => [new TelefonoMovil()] ])
            ->add('email', EmailType::class )
        ;

        $builder->add('Enviar', SubmitType::class, ['attr' => ['class' => 'btn btn-primary'], 'label' => 'Enviar' ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bolsa::class,
        ]);
    }
}
