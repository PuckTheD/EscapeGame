<?php

namespace App\Form;

use App\Entity\Scenario;
use App\Entity\Thematique;
use App\Entity\Indice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_jour')
            ->add('duree')
            ->add('thematiques', EntityType::class, array(
                'class'        => Thematique::class,
                'choice_label' => 'titre',
                'multiple'    => true,
                'expanded'    => true,
            ))
            ->add('indices', EntityType::class, array(
                'class'        => Indice::class,
                'choice_label' => 'titre',
                'multiple'    => true,
                'expanded'    => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
        ]);
    }
}
