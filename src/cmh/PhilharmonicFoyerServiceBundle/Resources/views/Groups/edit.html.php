<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;

/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper     FormHelper  */
/* @var $groupForm      Symfony\Component\Form\Form */
/* @var $groupFormView  Symfony\Component\Form\FormView */


$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */
$formHelper = $view['form'];

$groupFormView = $groupForm->createView();

$view->extend('::base.html.php');
$formHelper->setTheme($groupFormView, ':Form/cmh');

?>

<?php $slotsHelper->start('content') ?>
<div class="container">
        <?php
        echo $formHelper->start( $groupFormView );

        echo $formHelper->row( $groupFormView->children['isActive'] );
        echo $formHelper->row( $groupFormView->children['name'] );

        echo $formHelper->row( $groupFormView->children['save'] );

        echo $formHelper->rest( $groupFormView );

        echo $formHelper->end( $groupFormView );
        ?>
</div>
<?php $slotsHelper->stop('content') ?>