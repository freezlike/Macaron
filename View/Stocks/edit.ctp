<?php echo $this->Html->css('select2/select2'); ?>
<?php echo $this->Html->css('select2/select2-metronic'); ?>
<?php echo $this->Html->css('select2/select2-bootstrap'); ?>
<?php echo $this->Html->css('custom'); ?>
<?php if (empty($this->request->data)): ?>
    <?php $this->set('title_for_layout', __("Ajouter Un Produit")); ?>
<?php else: ?>
    <?php $this->set('title_for_layout', __("Editer Un Produit")); ?>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Produits 
            <small>
                <?php if (empty($this->request->data)): ?>
                    <?php echo __("Ajouter Un Produit"); ?>
                <?php else: ?>
                    <?php echo __("Editer Un Produit"); ?>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
                    Produits
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php if (empty($this->request->data)): ?>
                        <?php echo __("Ajouter Un Produit"); ?>
                    <?php else: ?>
                        <?php echo __("Editer Un Produit"); ?>
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
                        <i class="fa fa-reorder"></i> <?php echo __("Ajouter Un Produit"); ?>
                    <?php else: ?>
                        <i class="fa fa-reorder"></i> <?php echo __("Editer Un Produit"); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="portlet-body form">
                <?php
                echo $this->Form->create('Stock', array(
                    'inputDefaults' => array('label' => false, 'div' => false),
                    'class' => 'form-horizontal'
                ));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Produit"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('product_id', array('placeholder' => __("Prix"), 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Fournisseur"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('fournisseur_id', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Quantité"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('qte', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 text-left"><?php echo __("Prix D'achat"); ?></label>
                        <div class="col-md-10">
                            <?php echo $this->Form->input('prix_achat', array('class' => 'form-control')); ?>
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
<?php echo $this->Html->script('select2/select2.min', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$("#StockProductId").select2();
$("#StockFournisseurId").select2();
<?php echo $this->Html->scriptEnd(); ?>