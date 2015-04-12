<?php
$widgetClass = 'form-control chosen-select';
$widgetClass .= isset($attr['class-widget']) ? $attr['class-widget'] : '' ;

$allowedParams = array('max_selected_options');
?>

<select class="form-control <?php echo $widgetClass; ?>"
    <?php echo $view['form']->block($form, 'widget_attributes', array(
        'required' => $required && (null !== $empty_value || $empty_value_in_choices)
    )) ?>
    <?php if ($multiple): ?> multiple="multiple" size="<?php echo count($choices); ?>"<?php endif ?>
>
    <?php if (null !== $empty_value): ?><option value=""<?php if ($required and empty($value) && "0" !== $value): ?> selected="selected"<?php endif?>><?php echo $view->escape($view['translator']->trans($empty_value, array(), $translation_domain)) ?></option><?php endif; ?>
    <?php if (count($preferred_choices) > 0): ?>
        <?php echo $view['form']->block($form, 'choice_widget_options', array('choices' => $preferred_choices)) ?>
        <?php if (count($choices) > 0 && null !== $separator): ?>
            <option disabled="disabled"><?php echo $separator ?></option>
        <?php endif ?>
    <?php endif ?>

    <?php echo $view['form']->block($form, 'choice_widget_options', array('choices' => $choices)) ?>
</select>