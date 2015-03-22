<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Form\cmh;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\EntityManager;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\GroupRepository;

class ContentType extends AbstractType
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param $container Container
     */
    public function __construct($container)
    {
        $this->container = $container;
        $this->em = $this->container->get('doctrine.orm.default_entity_manager');
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('id')
            ->add('isActive', new cmh\Checkbox(), array('label' => 'aktiv'))
            ->add('date', 'date', array('label' => 'Datum'))
            ->add('groups', 'entity', array(
                'class'     => 'PhilharmonicFoyerService:Group',
                'property'  => 'name',
                'choices'   => $this->groupEntityList()
            ))
            ->add('info1', 'text', array('label' => '1. Informationszeile'))
            ->add('info2', 'text', array('label' => '2. Informationszeile'))
            ->add('info3', 'text', array('label' => '3. Informationszeile'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'philharmonic_foyer_contenttype';
    }

    /**
     * @return array
     */
    private function groupEntityList()
    {
        /* @var $repo GroupRepository */
        $repo = $this->em->getRepository('PhilharmonicFoyerServiceBundle:Group');
        return $repo->findAll();
    }
} 