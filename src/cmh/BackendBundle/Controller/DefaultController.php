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

        return $this->render('BackendBundle:Default:index.html.php', array('request' => $request));
    }
}
