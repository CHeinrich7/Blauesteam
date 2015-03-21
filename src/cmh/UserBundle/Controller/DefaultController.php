<?php

namespace cmh\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{

    public function loginAction()
    {
        /* @var $helper AuthenticationUtils */
        $helper = $this->get('security.authentication_utils');

        return $this->render('UserBundle:Default:Login.html.php', array(
            // last username entered by the user
            'last_username' => $helper->getLastUsername(),
            'error'         => $helper->getLastAuthenticationError(),
        ));
    }

    public function logoutAction(Request $request)
    {
        $session = $session = $request->getSession();
        $session->invalidate(0);
        return $this->redirect($this->generateUrl('user_login'));
    }

}
