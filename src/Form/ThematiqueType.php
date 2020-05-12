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
            ->add('titre')
            ->add('theme')
            ->add('scenarios', EntityType::class, array(
                'class'        => Scenario::class,
                'choice_label' => 'id',
                'multiple'    => true,
                'expanded'    => true,
                ))    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thematique::class,
        ]);
    }
}
