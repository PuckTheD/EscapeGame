<?php

namespace App\Form;

use App\Entity\Inventaire;
use App\Entity\CurrentGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InventaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('indice_id')
            ->add('team_id')
            ->add('currentGames', EntityType::class, array(
                'class'        => CurrentGame::class,
                'choice_label' => 'id',
                'multiple'    => true,
                'expanded'    => true,
            ))
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inventaire::class,
        ]);
    }
}
