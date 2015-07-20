<?php echo $this->Html->docType('html5'); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex" />
        <?php echo $this->Html->charset('UTF-8') . "\r\n"; ?>
        <title><?php echo $this->fetch('title') ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
        <?php //echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') . "\r\n"; ?>
        <?php echo $this->Html->css('fonts') . "\r\n"; ?>
        <?php echo $this->Html->css('font-awesome.min') . "\r\n"; ?>
        <?php echo $this->Html->css('bootstrap.min') . "\r\n"; ?>
        <?php echo $this->Html->css('uniform.default.min') . "\r\n"; ?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <?php echo $this->Html->css('style-metronic') . "\r\n"; ?>
        <?php echo $this->Html->css('style') . "\r\n"; ?>
        <?php echo $this->Html->css('style-responsive') . "\r\n"; ?>
        <?php echo $this->Html->css('light') . "\r\n"; ?>
        <?php echo $this->Html->css('plugins') . "\r\n"; ?>
        <?php //echo $this->Html->css('default')."\r\n"; ?>
        <?php echo $this->Html->css('custom') . "\r\n"; ?>
        <!-- END THEME STYLES -->
        <!-- Styles addons -->
        <?php echo $this->fetch('css') . "\r\n"; ?>
        <!-- End Styles -->
        <?php echo $this->Html->meta('icon') . "\r\n"; ?>

        <style type="text/css">
            .noprint{}

            @media print
            {
                .noprint {display: none;}
            }
        </style>
    </head>
    <!-- BEGIN BODY -->
    <body <?php echo ($this->params['controller'] === 'pages' && $this->params['action'] === 'home' ) ? ' ng-app="app" ng-controller="simpleCtrl"' : ''; ?> class="<?php echo ($this->params['controller'] === 'users' && $this->params['action'] === 'login') ? 'login' : 'page-header-fixed'; ?>">
        <?php echo $this->element('header') . "\r\n"; ?>
        <!-- START CONTAINER -->
        <div class="page-container">
            <div style="
                 clear: both;
                 margin-top: 42px;
                 "></div>
                 <?php if ($current_role === 'Administrateur'): ?>
                     <?php echo $this->element('sidebar') . "\r\n"; ?>
                 <?php endif; ?>
                 <?php if ($current_role === 'Fifis'): ?>
                     <?php echo $this->element('sidebar_fifis') . "\r\n"; ?>
                 <?php endif; ?>
                 <?php if ($current_role === 'Macaron'): ?>
                     <?php echo $this->element('sidebar_macaron') . "\r\n"; ?>
                 <?php endif; ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?php echo $this->Session->flash() . "\r\n"; ?>
                    <?php echo $this->fetch('content') . "\r\n"; ?>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                <!-- BEGIN COPYRIGHT -->
                <div class="copyright">
                    2014 &copy; Macaron. by Largestinfo.
                </div>
                <!-- END COPYRIGHT -->
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->
        <?php echo $this->element('js') . "\r\n"; ?>
		<?php //echo $this->element('sql_dump'); ?>
    </body>
    <!-- END BODY -->
</html>