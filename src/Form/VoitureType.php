<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Entity\Marque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model')
            ->add('prix')
            ->add('marque', EntityType::class, [

                'class' => Marque::class,
                "choice_label" => function (Marque $marque): string{
                    return $marque->getLabel();
                },
                'label' => "marque de cette voiture"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
