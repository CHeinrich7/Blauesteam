<?php
use cmh\PhilharmonicFoyerServiceBundle\Entity\Concert;

/* @var $view       Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
/* @var $concerts   array */
?>

<?php
    array(
        'title',
        'date',
        'groups',
        'deine veranstaltung'
    );
//var_dump($concerts);
?>

<?php foreach($concerts as $concert): /* @var $concert Concert */ ?>
    <div class="col-xs-3">
        <?php
        var_dump($concert->getDate());
        ?>
    </div>
<?php endforeach; ?>