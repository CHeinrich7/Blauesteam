<?php
    $parameters = array();
    $parameters['attr']['class'] = 'form-control no-padding text-center';
?>
<div class="form-group">
    <div class="col-xs-offset-1 col-xs-4 no-padding-right">
        <?php echo $view['form']->widget($form['hour'],$parameters) ?>
    </div>
    <div class="col-xs-1">
        <p class="text-center">:</p>
    </div>
    <div class="col-xs-4 no-padding-left">
        <?php echo $view['form']->widget($form['minute'],$parameters) ?>
    </div>
</div>
