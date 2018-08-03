<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Agency;

class RegistrationFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')
                ->add('lastName')
                ->add('agency');
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
