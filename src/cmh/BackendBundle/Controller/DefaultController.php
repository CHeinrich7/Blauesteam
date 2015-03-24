<?php

namespace cmh\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @Security("has_role('ROLE_STAFF')")
     */
    public function indexAction()
    {
        $request = $this->get('request');

        $authChecker = $this->get('security.authorization_checker');

        return $this->render('BackendBundle:Default:index.html.php',array(
            'request'       => $request,
            'authChecker'   => $authChecker
        ));
    }
}
