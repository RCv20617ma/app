<?php

namespace CustomerBundle\Form;

use CoreBundle\Util\HTMLClass;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerDocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number')
                ->add('startDate', DateType::class, [
                    'label' => 'customer.birth_date',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'required' => false,
                    'attr' => [
                        'class' => HTMLClass::INPUT_TEXT_CLASS,
                    ],
                    'label_attr' => [
                        'class' => HTMLClass::LABEL_CLASS,
                    ],
                ])
                ->add('endDate', DateType::class, [
                    'label' => 'customer.birth_date',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'required' => false,
                    'attr' => [
                        'class' => HTMLClass::INPUT_TEXT_CLASS,
                    ],
                    'label_attr' => [
                        'class' => HTMLClass::LABEL_CLASS,
                    ],
                ])
                ->add('documentType')
                ->add('files');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CustomerBundle\Entity\CustomerDocument'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'customerbundle_customerdocument';
    }


}
