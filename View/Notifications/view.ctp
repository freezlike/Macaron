<?php $this->set('title_for_layout', __("Notification : ") . $this->request->data['Notification']['name']); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <?php echo __('Notifications '); ?>
            <small>
                <?php echo __('Notification - ') . $this->request->data['Notification']['name']; ?>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>">
                    <?php echo __('Notifications'); ?>
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php echo __('Voir'); ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <h4 class="block"><?php echo __('Notification sur : ') . $this->request->data['Notification']['name']; ?></h4>
            <p><?php echo $this->request->data['Notification']['content']; ?></p>
            <?php echo $this->Form->create('Notification',array(
                'url'=>array('controller'=>'notifications','action'=>'valider',$this->request->data['Notification']['id'])
            )); ?>
            
            <button type="submit" class="btn btn-info pull-right"><?php echo __("Valider"); ?></button>
            <?php echo $this->Form->end(); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>