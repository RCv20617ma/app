<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class CarMaintenanceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numberPayment', null, [
                        'attr' => [
                            'placeholder' => '12345678'
                        ]
                    ])
                ->add('comment')
                ->add('dateMaintenance', DateType::class, [
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'required' => false,
                    'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
                ])
                ->add('amount', MoneyType::class, [
                        'currency' => 'MAD',
                        'attr' => [
                            'placeholder' => '500.00'
                        ]
                    ])
                ->add('typeMaintenance')
                ->add('car');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\CarMaintenance'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'carbundle_carmaintenance';
    }


}
