<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\Agency;

class RegistrationFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName',Null,array('label' => 'user.firstName'))
                ->add('lastName',Null,array('label' => 'user.lastName'))
                ->add('agency', EntityType::class, array(
                 'class' => 'CoreBundle:Agency',
                 'label' => 'user.agency',
                 'choice_label' => 'name'));
    }

   public function getParent()
   {
       return 'FOS\UserBundle\Form\Type\RegistrationFormType';
   }
 
   public function getBlockPrefix()
   {
       return 'app_user_registration';
   }
 
   public function getName()
   {
       return $this->getBlockPrefix();
   }
}
