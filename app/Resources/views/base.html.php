<?php
    use Symfony\Component\Templating\Helper\SlotsHelper;
    $slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?php $slotsHelper->output('title') ?> - Blauesteam</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <?php $slotsHelper->output('styles', ''); ?>

        <script type="text/javascript"></script>
    </head>
    <body>
    <div class="container">
        <div class="page-header">
            <?php $slotsHelper->output('header', ''); ?>
        </div>
    </div>

    <?php $slotsHelper->output('content', ''); ?>

    <?php $slotsHelper->output('footer', ''); ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            <?php $slotsHelper->output('jQuery', ''); ?>
        });
    </script>
    </body>
</html>