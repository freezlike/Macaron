<?php if (empty($this->request->data)): ?>
    <?php $this->set('title_for_layout', __("Ajouter Un Client")); ?>
<?php else: ?>
    <?php $this->set('title_for_layout', __("Editer Un Client")); ?>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Clients 
            <small>
                <?php if (empty($this->request->data)): ?>
                    <?php echo __("Ajouter Un Client"); ?>
                <?php else: ?>
                    <?php echo __("Editer Un Client"); ?>
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
                    Clients
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php if (empty($this->request->data)): ?>
                        <?php echo __("Ajouter Un Client"); ?>
                    <?php else: ?>
                        <?php echo __("Editer Un Client"); ?>
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
                        <i class="fa fa-reorder"></i> <?php echo __("Ajouter Un Client"); ?>
                    <?php else: ?>
                        <i class="fa fa-reorder"></i> <?php echo __("Editer Un Client"); ?>
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
                    <?php echo $this->Form->input('role_id', array('type'=>'hidden','value'=>2)); ?>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Raison Social ou Nom"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('display_name', array('placeholder' => __("Raison Social ou Nom"), 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Email"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('email', array('placeholder' => __("Email"), 'class' => 'form-control')); ?>
                        </div>
                        <div class="col-md-4"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Matricule Fiscale"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('mf', array('class' => 'form-control','placeholder'=>'Matricule Fiscale')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Infomations supplémentaires"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('aboutme', array('class' => 'form-control','placeholder'=>'Infomations supplémentaires (adresse ou autre)')); ?>
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