<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Form\cmh;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcertType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $inputAttr = array(
            'class-label'   => 'col-md-offset-2 col-md-3 col-sm-offset-1 col-sm-4',
            'class'         => 'col-md-3 col-sm-4'
        );

        $buttonAttr = array(
            'class'         => 'col-sm-9 col-md-8'
        );

        $builder
            // ->add('id')
            ->add('isActive', 'checkbox', array('label' => 'aktiv', 'attr' => $inputAttr, 'required' => false))
            ->add('date', 'date', array('label' => 'Datum', 'attr' => $inputAttr))
            ->add('serviceStart', 'time', array('label' => 'Dienstbeginn', 'attr' => $inputAttr))
            ->add('concertStart', 'time', array('label' => 'Veranstaltungsbeginn', 'attr' => $inputAttr))
            ->add('groups', 'entity', array(
                'class'     => 'cmh\PhilharmonicFoyerServiceBundle\Entity\Group',
                'multiple'  => true,
//                'expanded'  => true,
                'attr'      => $inputAttr,
            ))

            ->add('info1', 'text', array('label' => '1. Informationszeile', 'attr' => $inputAttr))
            ->add('info2', 'text', array('label' => '2. Informationszeile', 'attr' => $inputAttr))
            ->add('info3', 'text', array('label' => '3. Informationszeile', 'attr' => $inputAttr))

            ->add('save', 'submit', array('label' => 'bla', 'attr' => $buttonAttr))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'philharmonic_foyer_concerttype';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'cmh\PhilharmonicFoyerServiceBundle\Entity\Concert',
            )
        );
    }
} 