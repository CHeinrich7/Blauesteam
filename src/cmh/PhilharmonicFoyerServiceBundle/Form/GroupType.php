<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Form\cmh;

class GroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('id')
            ->add('isActive', new cmh\Checkbox(), array('label' => 'aktiv'))
            ->add('name', 'text', array('label' => 'Name'))
            ->add('save', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'philharmonic_foyer_grouptype';
    }
} 