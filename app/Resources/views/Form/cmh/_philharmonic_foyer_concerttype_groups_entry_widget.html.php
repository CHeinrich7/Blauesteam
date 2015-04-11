<?php
/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $formHelper Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper */
/* @var $form       Symfony\Component\Form\FormView */
/* @var $id         string */

$formHelper = $view['form'];
?>

<?php
$widgetAttr = $formHelper->block($form, 'widget_attributes');
$arrWidgetAttr = explode('"', $widgetAttr);
for($i = 0; $i < count($arrWidgetAttr); $i++)
{
    $val = trim($arrWidgetAttr[$i]);

    if($val == 'name=') {
        $inputName = $arrWidgetAttr[$i+1];
        $inputName = substr($inputName, 0, strlen($inputName)-1);
        $inputName = $inputName . $name . ']';

        $arrWidgetAttr[$i+1] = $inputName;
    }
    else if(in_array($val, array('class=', 'class-label='))) {
        unset($arrWidgetAttr[$i]);
        unset($arrWidgetAttr[$i+1]);
        $i++;
    }
}

$widgetAttr = implode('"', $arrWidgetAttr);
?>

<input <?php echo $widgetAttr; ?> type="checkbox" class="hidden cmh-checkbox" autocomplete="off" />
<label for="<?php echo $id; ?>">
    <span class="glyphicon glyphicon-ok"></span>
</label>