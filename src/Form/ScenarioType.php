<?php

namespace App\Form;

use App\Entity\Scenario;
use App\Entity\Thematique;
use App\Entity\Indice;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
=======
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
            ->add('name',TextType::class, array(
                'label' => 'name',
                'help' => 'Quel est le nom du scénario',
            ))
            ->add('description', TextareaType::class, array(
                'help' => 'Mettez votre description',
            ))
            
=======
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
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
