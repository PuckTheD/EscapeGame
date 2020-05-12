<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('users', EntityType::class, array(
                'class'        => User::class,
                'choice_label' => 'nickname',
                'multiple'    => true,
                'expanded'    => true,
                'help' => 'Quels seront les membres de la team ?',
            ))
            ->add('leader')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
