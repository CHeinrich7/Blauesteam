<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;

/* @var $error AuthenticationServiceException */
/* @var $username string */
/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */

/* @var $userForm      Symfony\Component\Form\Form */
/* @var $userFormView  Symfony\Component\Form\FormView */

/* @var $profileForm      Symfony\Component\Form\Form */
/* @var $profileFormView  Symfony\Component\Form\FormView */

$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */
$formHelper = $view['form']; /* @var $formHelper FormHelper */

$userFormView = $userForm->createView();
$profileFormView = $profileForm->createView();

$view->extend('::base.html.php');
$formHelper->setTheme($userFormView, ':Form/cmh');

?>

<?php
    $formHelper->setTheme($userFormView, ':Form/cmh');
?>