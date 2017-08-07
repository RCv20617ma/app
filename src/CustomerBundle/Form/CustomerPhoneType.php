<?php

namespace CustomerBundle\Form;

use CoreBundle\Entity\ReferencePhoneType;
use CustomerBundle\Entity\CustomerPhone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

class CustomerPhoneType extends AbstractType
{
    const INPUT_TEXT_CLASS = 'form-control';
    const INPUT_CHECKBOX_CLASS = 'js-switch';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('type',EntityType::class,[
                'class' => ReferencePhoneType::class,
                'attr' => [
                    'class' => self::INPUT_TEXT_CLASS,
                ]
            ])*/
            ->add('phone', PhoneNumberType::class,[
                'label' => 'customer.phone_number',
                'widget' => PhoneNumberType::WIDGET_SINGLE_TEXT,
                'preferred_country_choices' => array('MA')
            ])
            ->add('main',CheckboxType::class,[
                'label' => 'customer.main_phone','attr' => [
                    'class' => self::INPUT_CHECKBOX_CLASS,
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CustomerPhone::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'customerbundle_customerphone';
    }


}
