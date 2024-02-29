<?php

namespace App\Form\Type;

use App\Model\BowlingGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BowlingGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('frames', CollectionType::class, [
                'entry_type' => BowlingFrameType::class,
            ])
            ->add('finalFrame', BowlingFinalFrameType::class)
        ;
        $builder->add('calculate', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BowlingGame::class,
        ]);
    }
}
