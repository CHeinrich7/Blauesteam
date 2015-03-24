<?php
/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper */
/* @var $form       Symfony\Component\Form\FormView */
/* @var $id         string */

$formHelper = $view['form'];
?>

<style type="text/css">
    .cmh-checkbox + label > span {
        color: #ddd;
        font-size: 20px;
    }
    .cmh-checkbox:checked + label > span {
        color: green;
    }
    .cmh-checkbox:hover + label > span {
        color: #5cb85c;
    }
</style>

<input <?php echo $formHelper->block($form, 'widget_attributes') ?> type="checkbox" class="hidden cmh-checkbox" autocomplete="off" />
<label for="<?php echo $id; ?>">
    <span class="glyphicon glyphicon-ok"></span>
</label>