<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
$routerHelper = $view['router']; /* @var $routerHelper RouterHelper */

/* @var $error AuthenticationServiceException */
?>

<?php $view->extend('::base.html.php') ?>

<?php $slotsHelper->start('title') ?>Login<?php $slotsHelper->stop('title') ?>

<?php $slotsHelper->start('header') ?>
            <h1 class="text-center">Das blaue Team - Login</h1>
<?php $slotsHelper->stop('header') ?>


<?php $slotsHelper->start('content') ?>
    <div class="container">
        <?php if($error): ?>
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="alert alert-danger">
                    <?php echo $error->getMessage(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <form class="form-horizontal" action="<?php echo $routerHelper->generate('user_check'); ?>" method="post">
            <div class="form-group">
                <label for="username" class="col-sm-offset-3 col-sm-2 control-label">Username</label>
                <div class="col-sm-3">
                    <input id="username" type="text" class="form-control" name="_username" autocomplete="off" placeholder="Username" />
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-offset-3 col-sm-2 control-label">Passwort</label>
                <div class="col-sm-3">
                    <input id="password" type="password" class="form-control" name="_password" autocomplete="off" placeholder="Passwort" />
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