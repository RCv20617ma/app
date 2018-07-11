<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 03/07/2018
 * Time: 23:37
 */

namespace CarBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Form\OutgoType;
use CarBundle\Entity\Car;
use CoreBundle\Form\FileType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class AbsractChargeType  extends AbstractType
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
                'placeholder' => 'Date',
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

}
