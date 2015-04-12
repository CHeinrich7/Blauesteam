<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Concert;
use cmh\UserBundle\Entity\Role;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper;

/* @var $view               Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper         FormHelper  */
/* @var $concertForm        Symfony\Component\Form\Form */
/* @var $concertFormView    Symfony\Component\Form\FormView */
/* @var $concerts            */
/* @var $authChecker    AuthorizationChecker */
/* @var $actionsHelper  ActionsHelper */
/* @var $slotsHelper    SlotsHelper */
/* @var $routerHelper   RouterHelper */

$slotsHelper    = $view['slots'];
$routerHelper   = $view['router'];
$actionsHelper  = $view['actions'];
$authChecker    = $view['security'];

$view->extend('BackendBundle:Default:base.html.php');
?>

<?php $slotsHelper->start('title') ?>Veranstaltungen<?php $slotsHelper->stop('title') ?>

<?php $slotsHelper->start('headerTitle') ?>Veranstalung<?php $slotsHelper->stop('headerTitle') ?>

<?php $slotsHelper->start('headerMenu') ?>
    <li><a href="#">Dienste</a></li>
    <li><a href="#">Infos</a></li>
    <li><a href="#">Forum</a></li>
    <li><a href="#">Hile</a></li>
<?php if($authChecker->isGranted(Role::ROLE_CHARGER)): ?>
    <li class="divider"></li>
    <li><a href="#">Gruppen</a></li>
    <li><a href="#">Veranstalgungen</a></li>
    <li><a href="#">User</a></li>
<?php endif; ?>
<?php $slotsHelper->stop('header') ?>


<?php $slotsHelper->start('content') ?>
    <div class="container">
        <?php foreach($concerts as $concert): /* @var $concert Concert */ ?>
            <?php
                $date           = $concert->getDate();
                $serviceStart   = $concert->getServiceStart();
                $concertStart   = $concert->getConcertStart();
                $teams          = $concert->getGroups();

            ?>
            <div class="row no-margin">
                <div class="col-xs-3">
                    <?php
                        var_dump($date);
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php $slotsHelper->stop('content') ?>