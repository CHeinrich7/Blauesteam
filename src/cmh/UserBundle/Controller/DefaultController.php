<?php

namespace cmh\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use cmh\UserBundle\Entity\User;

class DefaultController extends Controller
{

    public function loginAction(Request $request)
    {
        /* @var $helper AuthenticationUtils */
        $helper = $this->get('security.authentication_utils');

        $user = $this->getUser(); /* @var $user User */

        $username = false;

        if($user instanceof User) {
            $username = $user->getUsername();
            $this->logout($request);
        }

        return $this->render('UserBundle:Default:Login.html.php', array(
            // last username entered by the user
            'last_username' => $helper->getLastUsername(),
            'error'         => $helper->getLastAuthenticationError(),
            'username'          => $username,
        ));
    }

    public function logout(Request $request)
    {
        $this->container->get('security.context')->setToken(null);

        $session = $request->getSession();
        $session->invalidate(0);
        $session->clear();
    }

    public function getUser()
    {
        if (!$this->container->has('security.context')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->container->get('security.context')->getToken()) {
            return false;
        }

        if (!is_object($user = $token->getUser())) {
            return false;
        }

        return $user;
    }

}