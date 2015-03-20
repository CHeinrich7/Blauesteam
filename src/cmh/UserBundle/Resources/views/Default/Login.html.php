<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */
?>

<?php $view->extend('::base.html.php') ?>

<?php $slotsHelper->start('title') ?>Login<?php $slotsHelper->stop('title') ?>

<?php $slotsHelper->start('header') ?>
            <h1 class="text-center">Das blaue Team - Login</h1>
<?php $slotsHelper->stop('header') ?>


<?php $slotsHelper->start('content') ?>
    <div class="container">
        <form class="form-horizontal" action="<?php echo $routerHelper->generate('user_check'); ?>">
            <div class="form-group">
                <label for="username" class="col-sm-offset-3 col-sm-2 control-label">Username</label>
                <div class="col-sm-3">
                    <input id="username" type="text" class="form-control" name="username" autocomplete="off" />
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-offset-3 col-sm-2 control-label">Passwort</label>
                <div class="col-sm-3">
                    <input id="password" type="password" class="form-control" name="password" autocomplete="off" />
                </div>
            </div>

            <div class="form-group">
                <div class=" col-sm-offset-5 col-sm-3">
                    <button class="btn btn-primary pull-right" type="submit">Einloggen</button>
                </div>
            </div>
        </form>
    </div>
<?php $slotsHelper->stop('content') ?>