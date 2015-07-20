<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!--[if lt IE 9]>
<?php echo $this->Html->script('respond.min')."\r\n"; ?>
<?php echo $this->Html->script('excanvas.min')."\r\n"; ?>
<![endif]-->
<?php echo $this->Html->script('jquery-1.10.2.min')."\r\n"; ?>
<?php echo $this->Html->script('jquery-migrate-1.2.1.min')."\r\n"; ?>
<?php echo $this->fetch('script')."\r\n"; ?>
<?php echo $this->Html->script('bootstrap/js/bootstrap.min')."\r\n"; ?>
<?php echo $this->Html->script('bootstrap-hover-dropdown/bootstrap-hover-dropdown.min')."\r\n"; ?>
<?php echo $this->Html->script('jquery-slimscroll/jquery.slimscroll.min')."\r\n"; ?>
<?php echo $this->Html->script('jquery.blockui.min')."\r\n"; ?>
<?php echo $this->Html->script('jquery.cokie.min')."\r\n"; ?>
<?php echo $this->Html->script('uniform/jquery.uniform.min')."\r\n"; ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->script('scripts/core/app')."\r\n"; ?>
<?php echo $this->Html->script('scripts/custom/index')."\r\n"; ?>
<?php echo $this->Html->script('scripts/custom/tasks')."\r\n"; ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
    });
</script>

<!-- END JAVASCRIPTS -->