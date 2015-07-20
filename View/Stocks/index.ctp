<?php $this->set('title_for_layout', __("Liste Stocks")); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion Stocks <small>Liste des Stocks</small>
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
                <a href="javascript:return false;">
                    Stocks
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    Liste des Stocks
                </a>
            </li>
        </ul>
        <button type="button" class="btn blue" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'stocks', 'action' => 'edit')); ?>';">
            Ajouter un Stock Produit <i class="fa fa-plus-circle"></i>
        </button>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i><?php echo __('Stock Actuel'); ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="ProductsListe">
                    <thead>
                        <tr>
                            <th>
                                <?php echo __("#"); ?>
                            </th>
							<th>
                                <?php echo __("Nom Produit"); ?>
                            </th>
                            <th>
                                <?php echo __("Famille"); ?>
                            </th>
                            <th>
                                <?php echo __("Fournisseur"); ?>
                            </th>
                            <th>
                                <?php echo __("Quantité"); ?>
                            </th>
                            <th>
                                <?php echo __('Prix Achat'); ?>
                            </th>
                            <th>
                                <?php echo __('Actions'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stocks as $stock): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $stock['Stock']['id'] ?></td>
                                <td><?php echo $stock['Product']['name'] ?></td>
                                <td><?php echo $stock['Famille']['name'] ?></td>
                                <td><?php echo $stock['Fournisseur']['name'] ?></td>
                                <td><?php echo $stock['Stock']['qte'] ?></td>
                                <td><?php echo $stock['Stock']['prix_achat'] ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'stocks', 'action' => 'edit',$stock['Stock']['id'])); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger"  data-toggle="modal" href="#responsive" onclick="$('#delete').attr('onclick','document.location.href=\'<?php echo $this->Html->url(array('controller' => 'stocks', 'action' => 'delete',$stock['Stock']['id']),true); ?>\'');"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo __('Demande de Suppression'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:50px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo __('Voulez Vous Suppprimer Ce Produit ?'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default"><?php echo __('Annuler'); ?></button>
                <button type="button" class="btn green" id="delete"><?php echo __('Supprimer'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('data-tables/jquery.dataTables.min', array('inline' => false)); ?>
<?php echo $this->Html->css('DT_bootstrap'); ?>
<?php echo $this->Html->script('data-tables/DT_bootstrap', array('inline' => false)); ?>
<?php echo $this->Html->script('scripts/custom/table-managed', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
    $('#ProductsListe').dataTable( {
        "aaSorting": [[ 0, "asc" ]]
    });
});
<?php echo $this->Html->scriptEnd(); ?>
