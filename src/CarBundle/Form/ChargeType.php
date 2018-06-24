<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:20
 */

namespace CarBundle\Form;

use AppBundle\Entity\User;
use CoreBundle\Form\FileType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use AppBundle\Form\OutgoType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;



class ChargeType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comment')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'placeholder' => 'Date d\'entretien',
                'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
            ])
            ->add('amount', MoneyType::class, [
                'currency' => 'MAD',
                'attr' => [
                    'placeholder' => 'Montant'
                ]
            ])

            ->add('file', FileType::class)
            ->add('outgo', CollectionType::class, [
                'label' => 'Outgo',
                'entry_type' => OutgoType::class,
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
            'data_class' => 'CarBundle\Entity\Charge'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'charge';
    }

}