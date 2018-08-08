<?php

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\AbstractCustomer;
use AppBundle\Entity\Car;
use AppBundle\Entity\MoralCustomer;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class ContractType extends AbstractType
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * EntitySetAgencyListener constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->tokenStorage->getToken()->getUser();
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('car',EntityType::class, [
                  'choices_as_values' => true,               
                  'class' => Car::class,
                  'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('c')
                          ->where('c.agency = :agency')
                          ->setParameter('agency', $this->getUser()->getAgency());
                    },
                 'attr' => ['data-select' => 'true'],
                ])


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
                
                ->add('customer',EntityType::class, [
                  'choices_as_values' => true,               
                  'class' => AbstractCustomer::class,
                   'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('c')
                          ->where('c.agency = :agency')
                          ->setParameter('agency', $this->getUser()->getAgency());
                    },
                  'attr' => ['data-select' => 'true'],
                ])
                
                ->add('drivers',EntityType::class, [
                 'choices_as_values' => true,  
                 'class' => MoralCustomer::class,
                  'query_builder' => function (EntityRepository $er) {
                  return $er->createQueryBuilder('d')
                          ->where('d.agency = :agency')
                          ->setParameter('agency', $this->getUser()->getAgency());
                    },
                 'attr' => ['data-select-multiple' => 'true'],
                ])
                ->add('numberDays')
                ->add('avance')
                ->add('originalPriceDay')
                ;

              /* champs calculé
                ->add('originalPriceDay')
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
