<?php

namespace CustomerBundle\Form;

use CoreBundle\Entity\ReferencePhoneType;
use CustomerBundle\Entity\CustomerEmail;
use CustomerBundle\Entity\CustomerPhone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

class CustomerEmailType extends AbstractType
{
    const INPUT_TEXT_CLASS = 'form-control';
    const INPUT_CHECKBOX_CLASS = 'customer-email-main';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'required' => false,
            ])
            ->add('main',CheckboxType::class,[
                'label' => 'customer.main_email',
                'required' => false,
                'attr' => [
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
            'data_class' => CustomerEmail::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'customer_email';
    }


}
