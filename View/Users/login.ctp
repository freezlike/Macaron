<?php $this->set('title_for_layout', __("Login")); ?>
<?php echo $this->Html->css('select2/select2', array('inline' => false)); ?>
<?php echo $this->Html->css('select2/select2-metronic', array('inline' => false)); ?>
<?php echo $this->Html->css('pages/login', array('inline' => false)); ?>
<!-- BEGIN LOGO -->
<div class="logo" style="font-size: 20px;">
    <?php echo $this->Html->image('logo.png', array()); ?>
    <!--<b style="color: #fff">MACA</b><b style="color: #E63F3F">RON</b>-->
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <?php echo $this->fetch('content'); ?>
    <?php
    echo $this->Form->create('User', array(
        'inputDefaults' => array('label' => false, 'div' => false)
    ));
    ?>
    <h3 class="form-title text-center">Identification</h3>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <?php echo $this->Form->input('username', array('autofocus','placeholder' => 'Nom d\'utilisateur', 'class' => 'form-control placeholder-no-fix')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe', 'class' => 'form-control placeholder-no-fix')); ?>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn green pull-right">
            Login <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<!-- END LOGIN -->
