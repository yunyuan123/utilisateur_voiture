<?php

namespace App\Form;

use App\Entity\Composition;
use App\Entity\Composant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CompositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('marque', EntityType::class, [
            //modifier le form en rajoutant l'entityType a l'attribut composant sera lié a composant
            'class' => Composant::class,
            "choice_label" => function (Composant $composant): string{
                return $composant->getLabel();
            },
            'label' => "marque de cette voiture"
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Composition::class,
        ]);
    }
}
