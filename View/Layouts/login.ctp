<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex" />
        <?php echo $this->Html->charset('UTF-8'); ?>
        <title><?php echo $this->fetch('title') ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <?php echo $this->Html->css('font-awesome.min'); ?>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('uniform.default.min'); ?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <?php echo $this->Html->css('style-metronic'); ?>
        <?php echo $this->Html->css('style'); ?>
        <?php echo $this->Html->css('style-responsive'); ?>
        <?php echo $this->Html->css('plugins'); ?>
        <?php echo $this->Html->css('default'); ?>
        <?php echo $this->Html->css('custom'); ?>
        <!-- END THEME STYLES -->
        <!-- Styles addons -->
        <?php echo $this->fetch('css'); ?>
        <!-- End Styles -->
        <?php echo $this->Html->meta('icon'); ?>
    </head>
    <!-- BEGIN BODY -->
    <body class="<?php echo ($this->params['controller'] === 'users' && $this->params['action'] === 'login') ? 'login' : 'page-header-fixed'; ?>">
        <div class="container">
            <?php echo $this->Session->flash(); ?>
        </div>
        <?php echo $this->fetch('content'); ?>
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2014 &copy; Macaron. by Largestinfo.
        </div>
        <!-- END COPYRIGHT -->
        <?php echo $this->element('js'); ?>
    </body>
    <!-- END BODY -->
</html>