<?php

namespace App\Form;

use App\Entity\CurrentGame;
use App\Entity\Scenario;
use App\Entity\Inventaire;
use App\Entity\Progression;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CurrentGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('teams', EntityType::class, array(
            'class'        => Team::class,
            'choice_label' => 'name',
            /*'multiple'    => true,*/
            'expanded'    => true,
            ))
        ->add('scenarios', EntityType::class, array(
                'class'        => Scenario::class,
                'choice_label' => 'id',
                'multiple'    => true,
                'expanded'    => true,
            ))
        ->add('inventaires', EntityType::class, array(
                'class'        => Inventaire::class,
                'choice_label' => 'id',
                'multiple'    => true,
                'expanded'    => true,
            ))
        ->add('progressions', EntityType::class, array(
                'class'        => Progression::class,
                'choice_label' => 'progress',
                'multiple'    => true,
                'expanded'    => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CurrentGame::class,
        ]);
    }
}
