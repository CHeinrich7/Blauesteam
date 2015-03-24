<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Controller;

use cmh\PhilharmonicFoyerServiceBundle\Form\GroupType;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\GroupRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilder;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Group;
use Symfony\Component\HttpFoundation\JsonResponse;

class GroupController extends Controller
{
    const INDEX_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Groups:index.html.php';
    const EDIT_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Groups:edit.html.php';

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
    }

    public function indexAction($name)
    {
        return $this->render( self::INDEX_TEMPLATE, array('name' => $name));
    }

    public function newAction()
    {

    }

    /**
     * @param Request $request
     *
     * @return Response|JsonResponse
     */
    public function editAction(Request $request)
    {
        $this->em = $this->get('doctrine.orm.default_entity_manager');
        $this->groupRepo = $this->em->getRepository('PhilharmonicFoyerServiceBundle:Group');
        $this->formBuilder = $this->createFormBuilder();

        $group = new Group();

        $form = $this->createForm(new GroupType(), $group, array(
            'method' => 'POST',
            'action' => $this->generateUrl('philharmonic_edit_group')
        ));

        $form->handleRequest($request);

        $submitted = $form->isSubmitted();

        $errors = $form->getErrors();

        $message = $errors->current()
            ? $errors->current()->getMessage()
            : null;

        if($submitted) {
            if($form->isValid()) {
                $this->em->persist($group);
                $this->em->flush();
            }
        }

        $data = array(
            'groupForm' => $form,
            'error'     => $message
        );

        return $this->returnResponse($request, self::EDIT_TEMPLATE, $data);
    }

    public function deleteAction(Request $request)
    {
        $id =$request->get('id');

        if($id <= 0) throw new \Exception('ID <= 0 not allowed');

        $group = $this->groupRepo->find($id); /* @var $group Group */

        if(!$group) throw new EntityNotFoundException('No Entity with ID "' . $id . '" found!');
        $group
            ->setIsActive(false)
            ->setIsDeleted(true);

        $this->em->flush();

        return new JsonResponse( array('success' => true) );
    }

    /**
     * @param Request $request
     * @param string  $template
     * @param array   $data
     *
     * @return JsonResponse|Response
     */
    private function returnResponse(Request $request, $template, $data = array())
    {
        $response = $this->render($template, $data);

        if($request->isXmlHttpRequest()) {
            return new JsonResponse(
                array(
                    'success'   => true,
                    'data'      => $response
                )
            );
        }

        return $response;
    }
}
