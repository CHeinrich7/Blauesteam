<?php
    $parameters = array();
    $parameters['attr']['class'] = 'form-control no-padding text-center';
?>
<div class="form-group">
    <div class="col-xs-4">
        <?php echo $view['form']->widget($form['day'],$parameters) ?>
    </div>
    <div class="col-xs-4 no-padding-left">
        <?php echo $view['form']->widget($form['month'],$parameters) ?>
    </div>
    <div class="col-xs-4 no-padding-left">
        <?php echo $view['form']->widget($form['year'],$parameters) ?>
    </div>
</div>
