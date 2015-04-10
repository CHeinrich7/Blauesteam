<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;
use Symfony\Component\Form\FormBuilder;

/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper     FormHelper  */
/* @var $concertForm      Symfony\Component\Form\Form */
/* @var $concertFormView  Symfony\Component\Form\FormView */


$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */
$formHelper = $view['form'];

$concertFormView = $concertForm->createView();

$view->extend('::base.html.php');
$formHelper->setTheme($concertFormView, ':Form/cmh');

$inputAttr = array(
    'class-label'   => 'col-md-offset-2 col-md-3 col-sm-offset-1 col-sm-4',
    'class'         => 'col-md-3 col-sm-4'
);

//$groupAttr = array(
//    'class' => 'col-xs-6 no-padding-left'
//);
//
//$groupAttr['class-label'] = $groupAttr['class'] . ' text-center-important';
//$groupAttr['style'] = 'margin-bottom: 10px';

?>

<?php $slotsHelper->start('content') ?>
    <div class="container">
        <?php
        echo $formHelper->start( $concertFormView );

        echo $formHelper->row( $concertFormView->children['isActive'] );
        echo $formHelper->row( $concertFormView->children['date'] );
        echo $formHelper->row( $concertFormView->children['groups'] );
//        echo $formHelper->row( $concertFormView->children['groups'] );
?>
<!--        <div class="form-group">-->
<!--            --><?php //echo $formHelper->label($concertFormView, 'Gruppen', array('attr' => $inputAttr)) ?>
<!--            <div class="--><?php //echo $inputAttr['class']; ?><!--">-->
<!---->
<!--                --><?php
//                    var_dump($concertFormView->children['groups']->vars['choices']);
//                ?>
<!---->
<!--                --><?php //foreach($concertFormView->children['groups']->vars['choices'] as $child /* @var $child Symfony\Component\Form\FormView */ ): ?>
<!--                <div class="col-xs-6">-->
<!--                        --><?php //echo $formHelper->label( $child, $child->vars['label'], array('attr' => $groupAttr) ); ?>
<!--                    <div class="pull-left">-->
<!--                        --><?php //echo $formHelper->widget( $child ); ?>
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->
<!--        </div>-->
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