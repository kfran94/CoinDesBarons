<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, [
                'choices' => [
                    'Sélectionner le jour du tournoi' => null,
                    'Mercredi' => 'mercredi',
                    'Samedi' => 'samedi',
                ],
                'label' => 'Jour', // Modifiez le label ici
            ])
            ->add('nom')
            ->add('prenom')
            ->add('cossy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
