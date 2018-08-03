<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:20
 */

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Entity\CarMaintenance;
use AppBundle\Form\FileType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use AppBundle\Form\OutgoType;
use AppBundle\Form\CarMaintenanceType;
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
        $builder
            ->add('typeCharge');
    }

    public function getParent()
    {
        return AbsractChargeType::class;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Charge'
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