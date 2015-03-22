<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Controller;

use cmh\PhilharmonicFoyerServiceBundle\Form\GroupType;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\GroupRepository;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\FormBuilder;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Group;

class GroupController extends Controller
{

    /**
     * @var GroupRepository
     */
    private $groupRepo;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var FormBuilder
     */
    private $formBuilder;

    function __construct ()
    {
        $this->em = $this->get('doctrine.orm.default_entity_manager');
        $this->groupRepo = $this->em->getRepository('PhilharmonicFoyerServiceBundle:Group');
        $this->formBuilder = $this->createFormBuilder();
    }

    public function indexAction($name)
    {
        return $this->render( 'PhilharmonicFoyerServiceBundle:Default:index.html.php', array('name' => $name));
    }

    public function newAction()
    {

    }

    /**
     * @param Request $request
     * @param integer $id
     */
    public function editAction(Request $request)
    {
        $id = $this->get('request')->get('id');

        if($id) {
            $group = $this->groupRepo->find($id);
        } else {
            $group = new Group();
        }

        $form = $this->formBuilder->getForm();

        $form->handleRequest($request);

        $submitted = $form->isSubmitted();

        if($submitted) {
            if($form->isValid()) {
                $entity = $this->createForm(new GroupType(), $group);

                $this->em->persist($entity);
                $this->em->flush();
            }
        }
    }

    public function deleteAction()
    {
        $id = $this->get('request')->get('id');

        if($id <= 0) throw new \Exception('ID <= 0 not allowed');

        $group = $this->groupRepo->find($id); /* @var $group Group */

        if(!$group) throw new EntityNotFoundException('No Entity with ID "' . $id . '" found!');
        $group
            ->setIsActive(false)
            ->setIsDeleted(true);

        $this->em->flush();
    }
}
