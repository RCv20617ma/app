<?php

namespace CarBundle\Form;

use CarBundle\Entity\CarBrand;
use CarBundle\Entity\CarModel;
use CarBundle\Entity\SlCar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SlCarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder->add('carNumber')
            ->add('originalPriceDay')
            ->add('ownerAgency')
            ->add('options')
            ->add('fuelType')
            ->add('gearBox')
            ->add('agency');

        $builder->add('brand');

        $formModifier = function (FormInterface $form, CarBrand $brand = null) {
            $models = null === $brand ? array() : $brand->getModels();

            $form->add('model', EntityType::class, array(
                'class' => 'CarBundle:CarModel',
                'placeholder' => '',
                'choices' => $models,
            ));
        };

        $builder->addEventListener(
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
            'data_class' => 'CarBundle\Entity\SlCar',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'slcar';
    }


}
