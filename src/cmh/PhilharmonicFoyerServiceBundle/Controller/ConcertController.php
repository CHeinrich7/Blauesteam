<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Controller;

use cmh\PhilharmonicFoyerServiceBundle\Form\ConcertType;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\ConcertRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilder;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Concert;
use Symfony\Component\HttpFoundation\JsonResponse;

class ConcertController extends Controller
{
    const INDEX_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Concert:index.html.php';
    const EDIT_TEMPLATE = 'PhilharmonicFoyerServiceBundle:Concert:edit.html.php';

    /**
     * @var ConcertRepository
     */
    private $concertRepo;

    /**
     * @var EntityManager
     */
    private $em;

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
        $this->concertRepo = $this->em->getRepository('PhilharmonicFoyerServiceBundle:Concert');

        $concert = new Concert();

        $concert->setDate(new \DateTime());

        $form = $this->createForm(new ConcertType(), $concert, array(
            'method' => 'POST',
            'action' => $this->generateUrl('philharmonic_edit_concert')
        ));

        $form->handleRequest($request);

        $submitted = $form->isSubmitted();

        $errors = $form->getErrors();

        $message = $errors->current()
            ? $errors->current()->getMessage()
            : null;

        if($submitted) {
            if($form->isValid()) {
                $this->em->persist($concert);
                $this->em->flush();
            }
        }

        $data = array(
            'concertForm' => $form,
            'error'     => $message
        );

        return $this->returnResponse($request, self::EDIT_TEMPLATE, $data);
    }

    public function deleteAction(Request $request)
    {
        $id =$request->get('id');

        if($id <= 0) throw new \Exception('ID <= 0 not allowed');

        $concert = $this->concertRepo->find($id); /* @var $concert Concert */

        if(!$concert) throw new EntityNotFoundException('No Entity with ID "' . $id . '" found!');
        $concert
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
