<?php

namespace AppBundle\Form;

use AppBundle\Entity\PhysicalCustomer;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
        $builder->add('car', EntityType::class, [
            'choices_as_values' => true,
            'class' => Car::class,
            'placeholder' => 'Sélectionner une voiture.',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('c')
                    ->where('c.agency = :agency')
                    ->setParameter('agency', $this->getUser()->getAgency());
            },
            'attr' => ['class' => 'select2'],
        ])
            ->add('fuelLevel', IntegerType::class,[
                'attr' => ['class' => 'hidden']
            ])
            ->add('startKms', IntegerType::class)
            ->add('priceDay', MoneyType::class, [
                'currency' => 'MAD',
                'attr' => [
                    'placeholder' => '500.00'
                ]
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => "dd/MM/yyyy HH:mm",
                'required' => false,
                'attr' => ['class' => '', 'autocomplete' => 'off']
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => "dd/MM/yyyy HH:mm",
                'required' => false,
                'attr' => ['class' => '', 'autocomplete' => 'off']
            ])
            ->add('customer', EntityType::class, [
                'choices_as_values' => true,
                'class' => AbstractCustomer::class,
                'placeholder' => 'Sélectionner un client.',
                'attr' => ['class' => 'select2'],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->where('c.agency = :agency')
                        ->setParameter('agency', $this->getUser()->getAgency());
                },
            ])
            ->add('drivers', EntityType::class, [
                'class' => PhysicalCustomer::class,
                'placeholder' => 'Selectionner un conducteur....',
                'multiple'  => true,
                'attr' => ['class' => 'select2'],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->where('d.agency = :agency')
                        ->setParameter('agency', $this->getUser()->getAgency());
                },
            ])
            ->add('numberDays');
    }

    /**
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
