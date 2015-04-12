<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;

/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper     FormHelper  */
/* @var $concertForm      Symfony\Component\Form\Form */
/* @var $concertFormView  Symfony\Component\Form\FormView */


$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */
$formHelper = $view['form'];

$concertFormView = $concertForm->createView();

$view->extend('BackendBundle:Default:index.html.php');
$formHelper->setTheme($concertFormView, ':Form/cmh');

$inputAttr = array(
    'class'         => 'col-md-3 col-sm-4'
);

$groupAttr = array(
    'class' => 'col-xs-6 no-padding-horizontal'
);

$groupAttr['class-label'] = $groupAttr['class'] . ' text-center-important';

?>

<?php $slotsHelper->start('content') ?>
    <div class="container">
        <?php
        echo $formHelper->start( $concertFormView );

        echo $formHelper->row( $concertFormView->children['isActive'] );
        echo $formHelper->row( $concertFormView->children['date'] );
        echo $formHelper->row( $concertFormView->children['concertStart'] );
        echo $formHelper->row( $concertFormView->children['serviceStart'] );
//        echo $formHelper->row( $concertFormView->children['groups'] );
        ?>
        <div class="form-group">
            <?php echo $formHelper->label( $concertFormView->children['groups'] ); ?>
            <div class="col-sm-4 col-md-3">
                <div class="alert alert-info">
                    <p>Halten sie die <b>STRG</b>-Taste gedrückt um mehrere Gruppen auswählen zu können</p>
                </div>
                <?php echo $formHelper->widget( $concertFormView->children['groups'] ); ?>
            </div>
        </div>

        <?php
        echo $formHelper->row( $concertFormView->children['info1'] );
        echo $formHelper->row( $concertFormView->children['info2'] );
        echo $formHelper->row( $concertFormView->children['info3'] );

        echo $formHelper->row( $concertFormView->children['save'] );

        echo $formHelper->rest( $concertFormView );

        echo $formHelper->end( $concertFormView );
        ?>
    </div>
<?php $slotsHelper->stop('content') ?>