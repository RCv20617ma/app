<?php

namespace CarBundle\Form;

use CarBundle\Entity\CarBrand;
use CarBundle\Entity\ReferenceCarOption;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $formModifier = function (FormInterface $form, CarBrand $brand = null) {
            $models = null === $brand ? array() : $brand->getModels();

            $form->add('model', EntityType::class, array(
                'class' => 'CarBundle:CarModel',
                'placeholder' => '',
                'choices' => $models,
            ));
        };

        $builder
            ->add('brand')
            ->add('carNumber', null, [
                'attr' => [
                    'placeholder' => '12345 H 1'
                ]
            ])
            ->add('carNumberWW', null, [
                'attr' => [
                    'placeholder' => '12345678'
                ]
            ])
            ->add('fuelType')
            ->add('gearbox')
            ->add('currentKm')
            ->add('purchaseDate', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
            ])
            ->add('saleDatePlanned', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
            ])
            ->add('horsePower')
            ->add('priceDay', MoneyType::class, [
                'currency' => 'MAD',
                'attr' => [
                    'placeholder' => '500.00'
                ]
            ])
            ->add('options', EntityType::class, [
                'class' => ReferenceCarOption::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) use ($formModifier) {
                    /** @var SlCar $data */
                    $data = $event->getData();

                    $formModifier($event->getForm(), $data->getBrand());
                }
            );
        $builder->get('brand')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $sport = $event->getForm()->getData();

                $formModifier($event->getForm()->getParent(), $sport);
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'car';
    }


}
