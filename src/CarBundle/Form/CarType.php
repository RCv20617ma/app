<?php

namespace CarBundle\Form;

use CarBundle\Entity\CarModel;
use CarBundle\Entity\ReferenceCarOption;
use CarBundle\Entity\ReferenceFuelType;
use CarBundle\Entity\ReferenceGearBox;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CarType extends AbstractType
{
    const INPUT_TEXT_CLASS = 'form-control';
    const SELECT_CLASS = 'form-control';
    const INPUT_DATE_CLASS = 'date-input form-control';
    const FORM_CLASS = 'form-horizontal form-label-left';
    const RADIO_CLASS = 'flat';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carNumber', TextType::class, [
                'label' => 'car.car_number',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
            ])
            ->add('carNumberWW', TextType::class, [
                'label' => 'car.car_number_ww',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
            ])
            ->add('currentKm', TextType::class, [
                'label' => 'car.current_km',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
            ])
            ->add('purchaseDate', DateType::class, [
                'label' => 'car.purchase_date',
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => [
                    'class' => self::INPUT_DATE_CLASS,
                ],
            ])
            ->add('saleDate', DateType::class, [
                'label' => 'car.sale_date',
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => [
                    'class' => self::INPUT_DATE_CLASS,
                ],
            ])
            ->add('horsePower', TextType::class, [
                'label' => 'car.horse_power',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
            ])
            ->add('priceDay', TextType::class, [
                'label' => 'car.price_day',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
            ])
            ->add('model', EntityType::class, [
                'class' => CarModel::class,
                'label' => 'car.model',
                'attr' => [
                    'class' => self::SELECT_CLASS,
                ],
            ])
            ->add('options', EntityType::class, [
                'class' => ReferenceCarOption::class,
                'label' => 'car.options',
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'attr' => [
                    'class' => self::RADIO_CLASS,
                ],
            ])
            ->add('fuelType', EntityType::class, [
                'class' => ReferenceFuelType::class,
                'label' => 'car.fuel_type',
                'attr' => [
                   'class' => self::SELECT_CLASS,
                ],
            ])
            ->add('gearBox', EntityType::class, [
                'class' => ReferenceGearBox::class,
                'label' => 'car.gear_box',
                'attr' => [
                     'class' => self::SELECT_CLASS,
                ],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\Car',
            'attr' => [
                'class' => self::FORM_CLASS
            ]
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'carbundle_car';
    }


}
