<?php

namespace App\Form;

use App\Entity\Product1;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Product1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'choise_label'=>'name',
                'expanded'=>false,
                'multiple'=>false


            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product1::class,
        ]);
    }
}
