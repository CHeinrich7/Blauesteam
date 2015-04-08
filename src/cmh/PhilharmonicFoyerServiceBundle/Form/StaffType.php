<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StaffType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group', 'checkbox', array('label' => 'aktiv'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'philharmonic_foyer_stafftype';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'cmh\PhilharmonicFoyerServiceBundle\Entity\Staff',
            )
        );
    }
} 