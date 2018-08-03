<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContractType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('car',EntityType::class, array(
                 'attr'=>array('class'=>"country",),                  
                  'choices_as_values' => true, //               
                 'class' => 'AppBundle\Entity\Car',
                 'attr' => ['data-select' => 'true'],
             ))


            ->add('fuelLevel',IntegerType::class)
            ->add('startKms',IntegerType::class)
         ->add('priceDay', MoneyType::class, [
                'currency' => 'MAD',
                'attr' => [
                    'placeholder' => '500.00'
                ]
                ])
                ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
                ])
                ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
                 ])                
                
                ->add('customer',EntityType::class, array(
                 'attr'=>array('class'=>"country",),                 
                  'choices_as_values' => true, //               
                 'class' => 'AppBundle\Entity\AbstractCustomer',
                 'attr' => ['data-select' => 'true'],
                ))
                
                ->add('drivers',EntityType::class, array(
                 'attr'=>array('class'=>"country",),                 
                 'choices_as_values' => true,  
                 'class' => 'AppBundle\Entity\MoralCustomer',
                 'attr' => ['data-select-multiple' => 'true'],
                ))
                ->add('numberDays')

                ->add('avance')
                ->add('originalPriceDay')
                ;

                // champs calculé
               /* ->add('originalPriceDay')
                ->add('total')
                

                ->add('createdAt')
                ->add('updatedAt')
                ->add('createdBy')
                ->add('updatedBy');*/
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contract'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'contract';
    }


}
