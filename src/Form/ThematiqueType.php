<?php

namespace App\Form;

use App\Entity\Thematique;
use App\Entity\Scenario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ThematiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
            ->add('name')
=======
            ->add('titre')
            ->add('theme')
            ->add('scenarios', EntityType::class, array(
                'class'        => Scenario::class,
                'choice_label' => 'id',
                'multiple'    => true,
                'expanded'    => true,
            ))
>>>>>>> d07e6edf50b7db4492a3570f3bdc3b8aa951fd91
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thematique::class,
        ]);
    }
}