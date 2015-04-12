<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use cmh\UserBundle\Entity\Role;
/* @var $view           Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $error          AuthenticationServiceException */
/* @var $username       string */
/* @var $authChecker    AuthorizationChecker */

$slotsHelper = $view['slots'];   /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */

?>

<?php $view->extend('::base.html.php') ?>

<?php $slotsHelper->start('header') ?>
    <h2 class="header-headline"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;<?php $slotsHelper->output('headerTitle', ''); ?></h2>
    <ul class="nav navbar-nav navbar-right pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <h4><span class="glyphicon glyphicon-chevron-down"></span></h4>
                <img alt="64x64" class="user-img" src="/bundles/backend/images/profile.jpg" data-holder-rendered="true">
            </a>
            <ul class="dropdown-menu" role="menu">
                <?php $slotsHelper->output('headerMenu', ''); ?>
                <li class="divider"></li>
                <li><a href="#"><span class="pull-left">Eigene Daten</span><span class="glyphicon glyphicon-user pull-right"></span></a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $routerHelper->generate('user_login'); ?>"><span class="pull-left">Logout</span><span class="glyphicon glyphicon-off pull-right"></span></a></li>
            </ul>
        </li>
    </ul>
<?php $slotsHelper->stop('header') ?>