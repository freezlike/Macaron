<?php $this->set('title_for_layout', __("Liste des Familles")); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Fournisseurs <small>Liste des Fournisseurs</small>
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
                    Fournisseurs
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    Liste des Fournisseurs
                </a>
            </li>
        </ul>
        <button type="button" class="btn blue" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'familles', 'action' => 'edit')); ?>';">
            Ajouter un Fournisseur <i class="fa fa-plus-circle"></i>
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
                    <i class="fa fa-users"></i><?php echo __('Liste des Fournisseurs'); ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="ProductsListe">
                    <thead>
                        <tr>
                            <th>
                                <?php echo __("Nom Fournisseur"); ?>
                            </th>
                            <th>
                                <?php echo __('Actions'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fournisseurs as $fournisseur): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $fournisseur['Fournisseur']['name'] ?></td>
                                <td>
                                    <a class="btn btn-success"  data-toggle="modal" href="#view" onclick="$('#nameF').text('<?php echo $fournisseur['Fournisseur']['name']; ?>');$('#descF').text('<?php echo $fournisseur['Fournisseur']['desc']; ?>');"><i class="fa fa-eye"></i></a>                                    
                                    <a href="<?php echo $this->Html->url(array('controller' => 'fournisseurs', 'action' => 'edit',$fournisseur['Fournisseur']['id'])); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger"  data-toggle="modal" href="#responsive" onclick="$('#delete').attr('onclick','<?php echo $this->Html->url(array('controller' => 'fournisseurs', 'action' => 'delete',$fournisseur['Fournisseur']['id'])); ?>');"><i class="fa fa-times"></i></a>
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
                            <?php echo __('Voulez Vous Suppprimer Cette Famille ?'); ?>
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
<div id="view" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn btn-success" style="width:100%">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo __('Fiche Fournisseur'); ?> : <i id="nameF"></i></h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:50px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12">
                            <p id="descF"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-info"><?php echo __('Fermer'); ?></button>
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
        "aaSorting": [[ 4, "desc" ]]
    });
});
<?php echo $this->Html->scriptEnd(); ?>
