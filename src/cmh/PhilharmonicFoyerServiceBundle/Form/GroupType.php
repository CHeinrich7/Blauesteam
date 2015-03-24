<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isActive', 'checkbox', array('label' => 'aktiv'))
            ->add('name', 'text', array('label' => 'Name'))
            ->add('save', 'submit', array('label' => 'bla'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'philharmonic_foyer_grouptype';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'cmh\PhilharmonicFoyerServiceBundle\Entity\Group',
            )
        );
    }
} 