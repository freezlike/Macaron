<?php $this->set('title_for_layout', __("Liste des Clients")); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Clients <small>Liste des Clients</small>
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
                    Clients
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    Liste des Client
                </a>
            </li>
        </ul>
        <button type="button" class="btn blue" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editc')); ?>';">
            Ajouter un Client <i class="fa fa-plus-circle"></i>
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
                    <i class="fa fa-users"></i><?php echo __('Liste des Clients'); ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="UsersListe">
                    <thead>
                        <tr>
                            <th>
                                <?php echo __("Raison Sociale ou Nom"); ?>
                            </th>
                            <th>
                                <?php echo __('Ajouté Le'); ?>
                            </th>
                            <th>
                                <?php echo __('M.F'); ?>
                            </th>
                            <th>
                                <?php echo __('Actions'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $user['User']['display_name'] ?></td>
                                <td><?php echo $user['User']['created'] ?></td>
                                <td><?php echo $user['User']['mf'] ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editc',$user['User']['id'])); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger"  data-toggle="modal" href="#responsive" onclick="$('#delete').attr('onclick','<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete',$user['User']['id'])); ?>');"><i class="fa fa-times"></i></a>
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
                            <?php echo __('Voulez Vous Suppprimer Cet Client ?'); ?>
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
    $('#UsersListe').dataTable( {
        "aaSorting": [[ 4, "desc" ]]
    });
});
<?php echo $this->Html->scriptEnd(); ?>
