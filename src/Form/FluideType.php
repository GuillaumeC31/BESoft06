<?php

namespace App\Form;

use App\Entity\Fluide;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fluide')
            ->add('slug')
            ->add('gwp')
            ->add('type')
            ->add('classe')
            ->add('statut')
            ->add('date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fluide::class,
        ]);
    }
}
