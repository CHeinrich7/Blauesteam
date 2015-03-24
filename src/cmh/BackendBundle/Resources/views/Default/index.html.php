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

<?php $slotsHelper->start('title') ?>UserArea<?php $slotsHelper->stop('title') ?>

<?php $slotsHelper->start('header') ?>
            <h2 class="pull-left" style="margin-bottom:0;color:#666"><span class="glyphicon glyphicon-chevron-right" style="font-size:26px;"></span>&nbsp;UserArea</h2>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background:none;color:#666">
                        <h4 class="pull-left" style="margin:0;"><span class="glyphicon glyphicon-chevron-down"></span></h4>
                        <img alt="64x64" data-src="holder.js/64x64" class="media-object pull-right" style="width: 74px; height: 74px;margin: -28px 0 -28px 10px;border-radius:100%;border:5px solid #dddddd;" src="/bundles/backend/images/profile.jpg" data-holder-rendered="true">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" style="display: inline-block;width:100%">Dienste</a></li>
                        <li><a href="#" style="display: inline-block;width:100%">Infos</a></li>
                        <li><a href="#" style="display: inline-block;width:100%">Forum</a></li>
                        <li><a href="#" style="display: inline-block;width:100%">Hile</a></li>
                        <?php if($authChecker->isGranted(Role::ROLE_CHARGER)): ?>
                            <li class="divider"></li>
                            <li><a href="#" style="display: inline-block;width:100%">Gruppen</a></li>
                            <li><a href="#" style="display: inline-block;width:100%">Veranstalgungen</a></li>
                            <li><a href="#" style="display: inline-block;width:100%">User</a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="#" style="display: inline-block;width:100%"><span class="pull-left">Eigene Daten</span><span class="glyphicon glyphicon-user pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $routerHelper->generate('user_login'); ?>" style="display: inline-block;width:100%"><span class="pull-left">Logout</span><span class="glyphicon glyphicon-off pull-right"></span></a></li>
                    </ul>
                </li>
            </ul>
<?php $slotsHelper->stop('header') ?>