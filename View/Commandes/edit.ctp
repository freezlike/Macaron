<?php echo $this->Html->css('select2/select2'); ?>
<?php echo $this->Html->css('select2/select2-metronic'); ?>
<?php echo $this->Html->css('select2/select2-bootstrap'); ?>
<?php echo $this->Html->css('custom'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <l class="noprint"><?php echo __('Commandes'); ?> </l>
            <small>
                <?php echo __("Bon De Commande : "); ?>
            </small>
        </h3>
        <ul class="page-breadcrumb breadcrumb noprint">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">
                    Dashboard
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'commandes', 'action' => 'index')); ?>">
                    Commandes
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                    <?php echo __("Génération de Bon de commande : "); ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <?php if (empty($this->request->data)): ?>
                <h3><?php echo __('Générer un Bon de commande'); ?></h3>
            <?php else: ?>
                <h3><?php echo __('Editer le bon de commande du : ') . $this->request->data['Bcs']['date']; ?></h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
echo $this->Form->create('Commande', array(
    'inputDefaults' => array('label' => false, 'div' => false)
));
?>
<div class="row">
    <div class="col-md-6">
        <h4><?php echo __('Veuillez choisir les produits de votre Commande : '); ?></h4>   
        <div class="form-group">
            <label><?php echo __('Produits'); ?></label>
            <?php echo $this->Form->input('products', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <label><?php echo __('Quantité'); ?></label>
            <?php echo $this->Form->input('qte', array('class' => 'form-control', 'placeholder' => __("Quantité"))); ?>
            <br clear="both"/>
            <button class="btn btn-success form-control bg-blue " id="addProduct"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="form-group">
            <?php if (empty($this->request->data)): ?>
                <?php echo $this->Form->submit(__('Ajouter'),array('class'=>'form-control btn btn-info')); ?>
            <?php else: ?>
                <?php echo $this->Form->submit(__('Modifier'),array('class'=>'form-control btn btn-success')); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bordered">
            <ul class="chats" id="CommandeListe">
                <li class="in" id="in">
                    <?php echo $this->Html->image('bc.svg', array('class' => 'avatar img-responsive')) ?>
                    <div class="message" id="messageInit">
                        <span class="arrow">
                        </span>
                        <a href="#" class="name" id="nameInit">
                            Liste des Produits
                        </a>
                        <span class="body" id="iniTbody">
                            <?php echo __('Veuillez Saisir la Commande'); ?>
                        </span>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>
<div style="visibility: hidden;height: 0px;position: absolute;" id="maskInput"></div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Html->script('select2/select2.min', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
    var i = 0;
    $("div").on('click', '#removeItem', function() {
        var inputID = $(this).attr('data-id');
        $("#inputMaskid" + inputID).remove();
        $(this).parent().remove();
    });
    $('#name').on('click', function(e) {
        e.preventDefault();
    });
    $("#CommandeProducts").select2();
    $('#addProduct').on('click', function(e) {
        e.preventDefault();
        console.log($("#message").length);
        if ($("#CommandeQte").val() === '') {
            alert('Veuillez mettre la quantité pour le produit :' + $("#CommandeProducts :selected").text());
        } else {

            $('#in').append('<div class="message" id="message"><i class="label label-warning pull-right" data-id="'+$('#CommandeQte').val()+'" id="removeItem">x</i><a href="#" class="name" id="name" >' + $("#CommandeProducts :selected").text() + ' x ' + $("#CommandeQte").val() + '</a></div>');
            $('#maskInput').append('<input type="text" id="inputMaskid'+$('#CommandeQte').val()+'" value="' + $('#CommandeQte').val() + '" name="data[Product][' + $('#CommandeProducts :selected').val() + ']">');
        }
    });
});
<?php echo $this->Html->scriptEnd(); ?>