<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomDuClient', null, [
                'label' => 'Votre nom'

            ])
            ->add('nombre_convives', IntegerType::class, [
                'label' => 'Nombre d\'invités (Seulement 20 couverts sont disponible dans notre restaurant',
                'attr' => [
                    'min' => 0,
                    'max' => 19,
                    'class' => 'form-control',
                ]
            ])
            ->add('allergies', null, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('datetime', DateTimeType::class, [
                'label' => 'Date et heure de réservation',
                'attr' => [
                    'class' => 'form-control datetime-picker',
                ],
                'widget' => 'single_text',
                'input' => 'datetime', // Utiliser le type de champ 'datetime'
                'input_format' => 'Y-m-d H:i:s', // Format d'entrée des données
                'model_timezone' => 'Europe/Paris', // Fuseau horaire du modèle
                'view_timezone' => 'Europe/Paris', // Fuseau horaire de l'affichage
                'hours' => range(12, 22), // Limiter les heures sélectionnables de 12 à 22
                'minutes' => ['00', '15', '30', '45'], // Limiter les minutes sélectionnables
                'constraints' => [
                    new NotBlank(),
                    new Callback([
                        'callback' => function ($dateTime, ExecutionContextInterface $context) {
                            if ($dateTime <= new \DateTime()) {
                                $context->buildViolation('La date et l\'heure de réservation doivent être futures.')
                                    ->addViolation();
                            }
                        },
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
