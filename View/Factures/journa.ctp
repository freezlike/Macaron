<?php $this->set('title_for_layout', __("Facture Journalière")); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Factures <small>Facture Journalière</small>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'index')); ?>">
                    Factures
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    Facture Journalière
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>
            <?php echo __("Génération de la Facture Journalière du ")."<label class='label label-success'>$now</label>"; ?>&nbsp;:
        </p>
        <p>Nombre de Facture pour le <?php echo "<label class='label label-success'>$now</label>"; ?> : <i class="label label-info"><?php echo count($factures); ?></i></p>
        <?php
        echo $this->Form->create('Facture', array(
            'inputDefaults' => array('label' => false, 'div' => false)
        ));
        ?>
        <?php echo $this->Form->input('code_facture', array('placeholder'=>'CF-','class'=>'form-control')); ?>
        <?php echo $this->Form->date('date', array('class'=>'form-control')); ?>
        <?php echo $this->Form->submit(__('Générer la Facture'),array('class'=>'btn btn-success','div'=>false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>