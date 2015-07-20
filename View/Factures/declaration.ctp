<?php echo $this->Html->css('http://www.datatables.net/release-datatables/media/css/jquery.dataTables.css',array('inline'=>false)); ?>
<?php echo $this->Html->css('http://www.datatables.net/release-datatables/extensions/TableTools/css/dataTables.tableTools.css',array('inline'=>false)); ?>
<style>
	table.dataTable tbody td {
		padding: 8px 10px;
		text-align: right;
	}
	.thright {
		text-align: right;
	}
</style>
<?php $this->set('title_for_layout', __("Déclaration "). $this->params['pass'][0]); ?>
<?php //debug($factures); ?>
<div class="row noprint">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Factures <small><?php echo __('Déclaration du ') . $this->params['pass'][0]; ?></small>
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
                    Factures
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php echo __('Déclaration du ') . $this->params['pass'][0]; ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive" id="declaration">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Facture</th>
                    <th>HTVA</th>
                    <th>TVA</th>
                    <th>TIMBRE</th>
                    <th>TTC</th>
                    <th>TYPE</th>
                </tr>
            </thead>
            <tbody>
                <?php $TotalHTVA = 0; ?>
                <?php $TotalTTC = 0; ?>
                <?php $TotalTVA = 0; ?>
                <?php foreach ($factures as $facture): ?>
                    <?php $htva = 0; ?>
                    <?php $tva = 0; ?>
                    <?php $ttc = 0; ?>
                    <tr>
                        <!-- Date -->
                        <td><?php echo $this->Time->format('Y-m-d', $facture['Ffacture']['date']); ?></td>
                        <!-- Code Facture -->
                        <td><?php $num = explode('-',$facture['Ffacture']['code_facture']); echo $num[1]; ?></td>
                        <!-- HTVA -->
                        <td>

                            <?php if ($facture['Ffacture']['code_facture'] === 'CF-17'): ?>
                                <?php $htva += 3750.04; ?>
                            <?php else: ?>
                                <?php foreach ($facture['Product'] as $product): ?>
									<?php if($product['FfacturesProduct']['remise'] > 0): ?>
										<?php $htva += (($product['FfacturesProduct']['last_unit_price'] * $product['FfacturesProduct']['qte']) - (($product['FfacturesProduct']['last_unit_price'] * $product['FfacturesProduct']['qte'] * $product['FfacturesProduct']['remise']) / 100)); ?>
									<?php else: ?>
										<?php $htva += ($product['FfacturesProduct']['last_unit_price'] * $product['FfacturesProduct']['qte']); ?>
									<?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php
                            echo number_format($htva, 3, '.', '') . "<br>";
                            $TotalHTVA += number_format($htva, 3, '.', '');
                            //echo $TotalHTVA;
                            ?>
                        </td>
                        <td><?php $tva = number_format((($htva * 18) / 100), 3, '.', '');
						$TotalTVA += $tva;
                        echo $tva;
                            ?></td>
                        <td>0.500</td>
                        <td><?php $TotalTTC += ($htva + $tva + 0.5);
                        echo number_format(($htva + $tva + 0.5), 3, '.', '');
                        ?></td>
                        <td><?php echo ($facture['Ffacture']['is_client'] === '0') ? '<label class="label label-info">Journalière</label>' : '<label class="label label-success">Client</label>'; ?></td>
                    </tr>
<?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>TOTAUX</th>
                    <th></th>
                    <th class="thright"><?php echo number_format($TotalHTVA, 3, '.', '') ?></th>
                    <th class="thright"><?php echo number_format($TotalTVA,3,'.',''); ?></th>
                    <th class="thright"><?php echo number_format((0.5 * count($factures)), 3, '.', ''); ?></th>
                    <th class="thright"><?php echo number_format($TotalTTC, 3, '.', ''); ?></th>
                    <th><label class="label label-success">Clients(<?php echo $clients; ?>)</label>&nbsp;&nbsp;&nbsp;<label class="label label-info">Journaux(<?php echo $journaux; ?>)</label></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="cb noprint"></div><br>
    <div class="noprint">
        <button class="btn btn-warning noprint" onclick="window.print();" value="Print">Print&nbsp;<i class="glyphicon glyphicon-print"></i></button>
        <button class="btn btn-warning noprint" onclick="exportPdf();" value="Print">PDF&nbsp;<i class="glyphicon glyphicon-pdf"></i></button>
    </div>
</div>
<?php echo $this->Html->script('http://www.datatables.net/release-datatables/media/js/jquery.dataTables.js',array('inline'=>false)); ?>
<?php echo $this->Html->script('http://www.datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js',array('inline'=>false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready( function () {
    $(document).ready(function() {
	$('#declaration').DataTable( {
		dom: 'T<"clear">lfrtip',
        tableTools: {
			"aButtons": [
                "copy",
                "csv",
                "xls",
                {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Le Macaron | Adresse : 45, avenue du Japon Monplaisir Tunis Boutique A02 | Mail: contact@lemacaron.tn | Tél : (+216) 71 903 803"
                },
                "print"
            ],
			"sSwfPath": "../../swf/copy_csv_xls_pdf.swf"
		},
		"iDisplayLength": 50,
		"aaSorting": [[ 1, "asc" ]]
	} );
} );
} );
<?php echo $this->Html->scriptEnd(); ?>