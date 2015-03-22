<?php
/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper */
/* @var $form       Symfony\Component\Form\FormView */

/* @var $compound   boolean */
/* @var $id         integer */
/* @var $name       string */

$formHelper = $view['form'];

$label_attr['class'] = " control-label col-sm-3 ";

if(isset($attr['labelClass'])) {
    $label_attr['class'] = $attr['labelClass'];
}

if ($required) {
    $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '').' required');
}

if(!$compound) {
    $label_attr['for'] = $id;
}

if (!$label) {
    $label = $name;
}

?>
<?php if (false !== $label): ?>
<label <?php echo $formHelper->block($form, 'widget_attributes') ?>>
    <?php echo $label ?>
</label>
<?php endif ?>

