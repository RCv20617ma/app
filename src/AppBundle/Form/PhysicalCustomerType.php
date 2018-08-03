<?php

namespace AppBundle\Form;

use AppBundle\Entity\CustomerDocumentType;
use AppBundle\Entity\ReferenceGender;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhysicalCustomerType extends AbstractType
{

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
            ])
            ->add('firstName', TextType::class, [
                'label' => 'customer.first_name',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'customer.last_name',
            ])
            ->add('identityDocumentType', EntityType::class, [
                'class' => CustomerDocumentType::class,
                'expanded' => true,
            ])
            ->add('nationality', CountryType::class, [
                'preferred_choices' => ['MA', 'CA', 'DZ', 'US', 'FR', 'TN', 'ES']
            ])
            ->add('identityNumber')
            ->add('drivingLicenceNumber')
            ->add('birthDate', DateType::class, [
                'label' => 'customer.birth_date',
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => ['class' => 'datepicker']
            ])
            ->add('phones', CollectionType::class, [
                'label' => 'customer.phone',
                'entry_type' => CustomerPhoneType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ])->add('emails', CollectionType::class, [
                'label' => 'customer.email',
                'entry_type' => CustomerEmailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ])
            ->add('address', null, [
                'label' => 'customer.address'
            ])
            ->add('documents', CollectionType::class, [
                'entry_type' => CustomerDocumentFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PhysicalCustomer'
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
