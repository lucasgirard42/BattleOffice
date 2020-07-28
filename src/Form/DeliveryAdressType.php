<?php

namespace App\Form;

use App\Entity\DeliveryAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('adress')
            ->add('additionnalAdress')
            ->add('city')
            ->add('postal')
            ->add('phone')
            ->add('client')
            ->add('country')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DeliveryAdress::class,
        ]);
    }
}
