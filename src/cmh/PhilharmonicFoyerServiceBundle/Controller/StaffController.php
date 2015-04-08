<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\StaffRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Staff;
use cmh\PhilharmonicFoyerServiceBundle\Form\StaffType;

class StaffController extends Controller
{
    const INDEX_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Staff:index.html.php';
    const EDIT_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Staff:edit.html.php';

    /**
     * @var StaffRepository
     */
    private $staffRepo;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var FormBuilder
     */
    private $formBuilder;

    public function indexAction($name)
    {
        return $this->render( self::INDEX_TEMPLATE, array('name' => $name));
    }

    /**
     * @param Request $request
     *
     * @return Response|JsonResponse
     */
    public function editAction(Request $request)
    {
        $this->em = $this->get('doctrine.orm.default_entity_manager');
        $this->staffRepo = $this->em->getRepository('PhilharmonicFoyerServiceBundle:Staff');
        $this->formBuilder = $this->createFormBuilder();

        $staff = new Staff();

        $form = $this->createForm(new StaffType(), $staff, array(
            'method' => 'POST',
            'action' => $this->generateUrl('philharmonic_edit_staff')
        ));

        $form->handleRequest($request);

        $submitted = $form->isSubmitted();

        $errors = $form->getErrors();

        $message = $errors->current()
            ? $errors->current()->getMessage()
            : null;

        if($submitted) {
            if($form->isValid()) {
                $this->em->persist($staff);
                $this->em->flush();
            }
        }

        $data = array(
            'staffForm' => $form,
            'error'     => $message
        );

        return $this->returnResponse($request, self::EDIT_TEMPLATE, $data);
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
