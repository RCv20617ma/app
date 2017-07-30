<?php

namespace CustomerBundle\Form;

use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\ReferenceGender;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhysicalCustomerType extends AbstractType
{
    const INPUT_TEXT_CLASS = 'form-control col-md-7 col-xs-12';
    const LABEL_CLASS = 'control-label col-md-4 col-sm-4 col-xs-12';
    const FORM_CLASS = 'form-horizontal form-label-left';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', EntityType::class, [
                'class' => ReferenceGender::class,
                'label' => 'customer.gender',
                'expanded' => true,
                'attr' => [
//                    'class' => self::INPUT_TEXT_CLASS,
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS,
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'customer.first_name',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS,
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'customer.last_name',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS,
                ],
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'customer.birth_date',
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS,
                ],
            ])
            ->add('phones', CollectionType::class, [
                'label' => 'customer.phone',
                'entry_type' => CustomerPhoneType::class,
                'allow_add' => true,
                'prototype' => true,
                'by_reference' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CustomerBundle\Entity\PhysicalCustomer',
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
        return 'physical_customer';
    }


}
