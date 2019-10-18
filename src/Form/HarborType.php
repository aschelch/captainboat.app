<?php

namespace App\Form;

use App\Entity\Harbor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HarborType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address_street')
            ->add('address_city')
            ->add('address_zipcode')
            ->add('depth')
            ->add('phone_number')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Harbor::class,
        ]);
    }
}
