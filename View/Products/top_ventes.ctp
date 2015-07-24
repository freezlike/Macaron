<?php $this->set('title_for_layout', __("Produits | Top Ventes")); ?>
<?php echo $this->Html->css('DT_bootstrap',array('inline'=>false)); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Vente Produits <small>Top Ventes</small>
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
                    Produits
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    Top Ventes
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i><?php echo __('Liste des Produits'); ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="ProductsListe">
                    <thead>
                        <tr>
                            <th>
                                <?php echo __("Nom Produit"); ?>
                            </th>
                            <th>
                                <?php echo __("Nombre"); ?>
                            </th>
                            <th>
                                <?php echo __('Somme'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($topVentes as $product): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['count'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('data-tables/jquery.dataTables.min', array('inline' => false)); ?>
<?php echo $this->Html->script('data-tables/DT_bootstrap', array('inline' => false)); ?>
<?php echo $this->Html->script('scripts/custom/table-managed', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
    $('#ProductsListe').dataTable( {
        "aaSorting": [[ 1, "desc" ]]
    });
});
<?php echo $this->Html->scriptEnd(); ?>
