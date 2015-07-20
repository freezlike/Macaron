<?php if (empty($this->request->data)): ?>
    <?php $this->set('title_for_layout', __("Ajouter Un Utilisateur")); ?>
<?php else: ?>
    <?php $this->set('title_for_layout', __("Editer Un Utilisateur")); ?>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Utilisateurs 
            <small>
                <?php if (empty($this->request->data)): ?>
                    <?php echo __("Ajouter Un Utilisateur"); ?>
                <?php else: ?>
                    <?php echo __("Editer Un Utilisateur"); ?>
                <?php endif; ?>
            </small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">
                    Dashboard
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>">
                    Utilisateurs
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php if (empty($this->request->data)): ?>
                        <?php echo __("Ajouter Un Utilisateur"); ?>
                    <?php else: ?>
                        <?php echo __("Editer Un Utilisateur"); ?>
                    <?php endif; ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box <?php echo (empty($this->request->data)) ? 'blue' : 'green'; ?>">
            <div class="portlet-title">
                <div class="caption">
                    <?php if (empty($this->request->data)): ?>
                        <i class="fa fa-reorder"></i> <?php echo __("Ajouter Un Utilisateur"); ?>
                    <?php else: ?>
                        <i class="fa fa-reorder"></i> <?php echo __("Editer Un Utilisateur"); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="portlet-body form">
                <?php
                echo $this->Form->create('User', array(
                    'inputDefaults' => array('label' => false, 'div' => false),
                    'class' => 'form-horizontal'
                ));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Nom d'utilisateur"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('username', array('placeholder' => __("Nom d'utilisateur"), 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Mot de passe"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('password', array('placeholder' => __("Mot de passe"), 'class' => 'form-control')); ?>
                        </div>
                        <div class="col-md-4"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Rôle"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('role_id', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <?php if (empty($this->request->data)): ?>
                            <button type="submit" class="btn blue"><?php echo __('Ajouter'); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn green"><?php echo __('Modifier'); ?></button>
                        <?php endif; ?>
                        <button type="reset" class="btn default"><?php echo __('Annuler'); ?></button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>