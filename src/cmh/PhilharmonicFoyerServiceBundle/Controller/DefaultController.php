<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render( 'PhilharmonicFoyerServiceBundle:Default:index.html.php', array('name' => $name));
    }
}
