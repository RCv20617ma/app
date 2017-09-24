<?php

namespace CustomerBundle\Form;

use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\ReferenceGender;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhysicalCustomerType extends AbstractType
{
    const INPUT_TEXT_CLASS = 'form-control';
    const LABEL_CLASS = 'control-label col-md-4 col-sm-4 col-xs-12';
    const LABEL_CLASS_CONTACT = 'control-label col-md-2 col-sm-2 col-xs-12';
    const FORM_CLASS = 'form-horizontal form-label-left';
    const RADIO_CLASS = 'flat';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', EntityType::class, [
                'class' => ReferenceGender::class,
                'label' => 'customer.civility',
                'expanded' => true,
                'attr' => [
                    'class' => self::RADIO_CLASS,
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
            ->add('nationality', CountryType::class, [
                'label' => 'customer.nationality',
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS,
                ],
                'preferred_choices' => ['FR', 'MA', 'IT', 'ES', 'CA', 'US'],
                'empty_data' => 'votre nationalité',
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
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => self::LABEL_CLASS_CONTACT,
                ],
            ])->add('emails', CollectionType::class, [
                'label' => 'customer.email',
                'entry_type' => CustomerEmailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => self::LABEL_CLASS_CONTACT,
                ],
            ])
           /* ->add('documents', CollectionType::class, [
                'label' => 'customer.email',
                'entry_type' => CustomerDocumentType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => self::LABEL_CLASS_CONTACT,
                ],
            ])
           */
            ->add('address', TextareaType::class, [
                'label' => 'customer.address',
                'required' => false,
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                    'style' => 'resize : vertical',
                ],
                'label_attr' => [
                    'class' => self::LABEL_CLASS_CONTACT,
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
        return 'customer';
    }


}
