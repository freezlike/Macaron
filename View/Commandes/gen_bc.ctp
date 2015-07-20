<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <l class="noprint"><?php echo __('Commandes'); ?> </l>
            <small>
                <?php echo __("Bon De Commande : ") . " " . $bc['Bc']['date']; $commandes = $bc['Commande'] ?>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
                    Commandes
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;" class="active">
                        <?php echo __("Commande du : ") . " " . $bc['Bc']['date']; ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
            <th><?php echo __('Produit'); ?></th>
            <th><?php echo __('Quantité'); ?></th>
            </thead>
            <tbody>
                <?php foreach($commandes as $commande): ?>
                <tr>
                    <td><?php echo $commande['Product']['name']; ?></td>
                    <td><?php echo $commande['qte']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <?php
//debug($commandes);
//require_once APP . 'Vendor' . DS . 'phpqrcode/phpqrcode.php';
require_once APP . 'Vendor' . DS . 'phpqrcode/qrlib.php';
ob_start();
QRCode::png($id, null);
$imageString = base64_encode(ob_get_contents());
ob_end_clean();
echo "<img class='QrCode' src='data:image/png;base64,$imageString'>";
?>
    </div>
</div>

