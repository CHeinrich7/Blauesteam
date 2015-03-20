<?php

namespace cmh\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        echo 'u R in';
    }

    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                Security::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(Security::AUTHENTICATION_ERROR);
            $session->remove(Security::AUTHENTICATION_ERROR);
        }

        return $this->render('UserBundle:Default:Login.html.php', array(
            // last username entered by the user
            'last_username' => $session->get(Security::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    public function logoutAction(Request $request)
    {
        $session = $session = $request->getSession();
        $session->invalidate(0);
        return $this->redirect($this->generateUrl('user_login'));
    }

}
