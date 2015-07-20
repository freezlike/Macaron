<?php echo $this->Html->css('select2/select2'); ?>
<?php echo $this->Html->css('select2/select2-metronic'); ?>
<?php echo $this->Html->css('select2/select2-bootstrap'); ?>
<?php echo $this->Html->css('custom'); ?>
<?php $this->set('title_for_layout', __("Ajout de Facture")); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gestion des Factures <small>Ajout de Facture</small>
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
                    Ajout de Facture
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <?php
    echo $this->Form->create('Facture', array(
        'inputDefaults' => array(
            'div' => array('class' => 'form-group'),
            'class' => 'form-control'
        )
    ));
    ?>
    <div class="col-md-6">
        <div class="thumbnail">
            <?php echo $this->Form->input('devise_id', array('label' => 'Devise')); ?>
            <?php $options = array('0' => 'Journalière', '1' => 'Client'); ?>
            <label><?php echo __('Type'); ?></label>
            <select name="data[Facture][is_client]" class="form-control" id="FactureIsClient">
                <option value="0">Journalière</option>
                <option value="1">Client</option>
            </select>
            <?php
            echo $this->Form->input('code_facture', array('label' => 'Code Facture', 'type' => 'text','placeholder'=>'CF-','required'));
            echo $this->Form->date('date', array('label' => 'Date Facture','required','class'=>'form-control'));
            echo $this->Form->input('accompte', array('label' => 'Acompte', 'placeholder' => 'Accompte', 'title' => 'pas d\'Acompte ? mettez 0.', 'required'));
            echo $this->Form->input('payment_id', array('label' => 'Type Paiement'));
            ?>
            <div style="visibility: hidden;" id="postList"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="thumbnail">
            <div id="clients" style="display: none;">
                <label>
                    <?php echo __('Clients'); ?>
                    <a data-toggle="modal" href="#basic"
                       onclick="$('#delete').attr('onclick', '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editc')); ?>');"><i class="fa fa-plus btn btn-success btn-sm"></i></a>
                </label>
                <?php echo $this->Form->input('user_id', array('label' => FALSE)); ?>
            </div>
            <?php echo $this->Form->input('product_id', array('label' => 'Produit')); ?>
            <?php echo $this->Form->input('count', array('label' => 'Quantité', 'placeholder' => 'Quantité')); ?>
            <?php echo $this->Form->input('remise', array('label' => 'Remise', 'placeholder' => 'Remise en %', 'title' => 'pas de remise ? mettez 0', 'required')); ?>
            <button class="btn btn-info col-md-12" id="addItem"><i class="glyphicon glyphicon-plus"></i></button>
            <div class="clear"></div>
            <div id="listeAchat">
                <ul class="nav">
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Form->submit(__('Ajouter'), array('class' => 'btn btn-primary')); ?>

<?php echo $this->Form->end(); ?>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nouveau Client</h4>
            </div>
            <div class="modal-body">
                <?php
                echo $this->Form->create('User', array(
                    'inputDefaults' => array(
                        'div' => array('class' => 'form-group'),
                        'class' => 'form-control'
                    ),
                    'url' => array('controller' => 'users', 'action' => 'editc', 'null', 'newUser')
                ));
                ?>
                <?php echo $this->Form->input('display_name', array('label' => 'Raison Sociale ou Nom', 'placeholder' => 'Raison Sociale ou Nom')); ?>
                <?php echo $this->Form->input('email', array('label' => 'Email', 'placeholder' => 'Email')); ?>
                <?php echo $this->Form->input('mf', array('label' => 'Matricule Fiscale', 'placeholder' => 'Matricule Fiscale')); ?>
                <?php echo $this->Form->input('aboutme', array('label' => 'Infomations supplémentaires', 'placeholder' => 'Infomations supplémentaires (adresse ou autre)')); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn blue">Ajouter</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo $this->Html->script('select2/select2.min', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false));  ?>
$('#FactureIsClient').change(function() {
    if ($('#FactureIsClient option:selected').val() === '1') {
        $('#clients').removeAttr('style');
    } else {
        $('#clients').attr('style', 'display:none;');
    }
});
var i = 1;
$("#addItem").on('click', function(e) {
    e.preventDefault();
    if (($("#FactureCount").val() === "") || ($("#FactureRemise").val() === "")) {
        alert("Veuillez choisir une designation avec la quantité et la remise en 0 si y a pas de remise, merci.");
    } else {
        $("#postList").append('<input class="productR" id="label' + $('#FactureProductId option:selected').val() + '" type="text" name="data[Product][' + $("#FactureRemise").val() + '][' + $("#FactureProductId option:selected").val() + ']" value="' + $("#FactureCount").val() + '" >');
        $("#listeAchat ul").append("<li  style='margin-top: 12px;'><label class='label label-info'>" + $("#FactureProductId option:selected").text() + "[Qte = " + $("#FactureCount").val() + " | Remise à " + $("#FactureRemise").val() + " ]</label>&nbsp;<i style='cursor: pointer;margin-top: -6px;' id='removeItem' class='btn btn-danger btn-xs glyphicon glyphicon-remove' data-value='label" + $("#FactureProductId option:selected").val() + "'></i></li>");
    }
});
$(document).ready(function() {
$("#FactureUserId").select2();
$("#FactureProductId").select2();
    $(".nav").on('click', '#removeItem', function() {
        $(this).parent('li').remove();
//alert($(this).attr('data-value'));
        var id = $(this).attr('data-value');
        $("#" + id).remove();

    });
});
<?php echo $this->Html->scriptEnd(); ?>