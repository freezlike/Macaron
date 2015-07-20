<?php 
App::import('Vendor','phpToPDF');
require_once APP . 'Vendor\phpToPDF.php';

    ?>
<div class="page-header noprint">
    <h4><b>
            <?php echo ($facture['Ffacture']['is_client'] === '1') ? 'Facture Client' : 'Facture Journalière du ' . $this->Time->format('Y/m/d', $facture['Ffacture']['date']); ?>
        </b>
    </h4>
</div>
<div class="row">
    <div style="/*width: 70%;height: auto;*/border: solid #000 1px;" class="span9 offset1">
        <div class="" style="margin-left: 10px;">
            <address>
                CENTRE LE 45 AVENUE DU JAPON<br>
                1073 - MONTPLAISIR-TUNIS<br>
                Tél Fixe : 71 90 38 03<br>
                MF : 1359806/B/A/M/000<br>
            </address>
            <?php echo $this->Html->image('logo.png', array('class' => 'pull-right', 'style' => 'max-width:250px;margin-top:-80px;margin-right:10px;')); ?>
            <?php if ($facture['User']['code_client'] !== null): ?>
                <blockquote class="pull-left" style="font-size: 12px;">
                    <h3><b>Client</b><?php echo $facture['User']['code_client']; ?></h3>
                    <?php echo $facture['User']['display_name']; ?><br>
                    <?php echo (!empty($facture['User']['email'])) ? $facture['User']['email'] . "<br>" : ''; ?>
                    <?php echo (!empty($facture['User']['aboutme'])) ? $facture['User']['aboutme'] . "<br>" : ''; ?>
                    <?php echo $facture['User']['mf']; ?><br>
                </blockquote>
            <?php endif; ?>
            <blockquote class="pull-right">
                <h3><b>Facture</b></h3>
                <b style="font-size: 12px;">Code Facture : </b><i style="font-size: 12px;"><?php echo $facture['Ffacture']['code_facture']; ?></i><br>
                <b style="font-size: 12px;">Date de facturation : </b><i style="font-size: 12px;"><?php echo $this->Time->format('Y/m/d', $facture['Ffacture']['date']); ?></i><br>
            </blockquote>
            <table class="table table-bordered table-hover">
                <thead>
                <th>Désignation</th>
                <th>Prix Unitaire</th>
                <?php echo ($facture['Ffacture']['is_client'] === '0') ? '' : '<th>Remise</th>'; ?>
                <th>Montant</th>
                </thead>
                <tbody>
                    <?php $priceht = 0; ?>
                    <?php foreach ($facture['Product'] as $d): ?>
                        <tr>
                            <td><?php echo $d['name']; ?> 
                                <?php if (isset($d['Famille']['name'])): ?>
                                    <label class="label label-info"><?php echo $d['Famille']['name'] ?></label>
                                <?php endif; ?> 
                                x <?php echo $d['FfacturesProduct']['qte']; ?></td>
                            <td><?php echo number_format($d['price'], 3, '.', ''); ?></td>
                            <?php if ($facture['Ffacture']['is_client'] === '1'): ?>
                                <td><?php echo ($d['FfacturesProduct']['remise'] === '0') ? '0 %' : $d['FfacturesProduct']['remise'] . " %"; ?></td>
                            <?php endif; ?>
                            <?php if (isset($d['total']) && $d['total'] !== null): ?>
                                <td style="text-align: right;">
                                    <?php
                                    $pttc = $d['total'];
                                    echo number_format($pttc, 3, '.', '');
                                    ?>
                                </td>
                                <?php else: ?>
                                <td style="text-align: right;">
                                    <?php
                                    if ($d['FfacturesProduct']['remise'] > 0) {
                                        $pttc = ($d['price'] * $d['FfacturesProduct']['qte']) - (($d['price'] * $d['FfacturesProduct']['qte'] * $d['FfacturesProduct']['remise']) / 100);
                                    } else {
                                        $pttc = $d['price'] * $d['FfacturesProduct']['qte'];
                                    }
                                    echo number_format($pttc, 3, '.', '');
                                    ?>
                                </td>
                        <?php endif; ?>
                        </tr>
                        <?php $priceht += $pttc; ?>
                        <?php endforeach; ?>
                    <tr>
                        <?php if ($facture['Ffacture']['is_client'] === '1'): ?>
                            <td style="border-bottom: solid #DDD 1px"></td>
<?php endif; ?>
                        <td style="border-bottom: solid #fff 1px"></td>
                        <td>Total HT</td>
                        <td style="text-align: right"><?php echo number_format($priceht, 3, '.', ''); ?></td>
                    </tr>
                    <tr>
                        <?php if ($facture['Ffacture']['is_client'] === '1'): ?>
                            <td style="border-bottom: solid #DDD 1px"></td>
<?php endif; ?>
                        <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                        <td>TVA 18%</td>
                        <td style="text-align: right">
                            <?php
                            $tva = ($priceht * 18) / 100;
                            echo number_format($tva, 3, '.', '');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <?php if ($facture['Ffacture']['is_client'] === '1'): ?>
                            <td style="border-bottom: solid #DDD 1px"></td>
<?php endif; ?>
                        <td style="border-bottom: solid #fff 1px;border-top: solid #fff 1px"></td>
                        <td>Timbre Fiscal</td>
                        <td style="text-align: right">0.500</td>
                    </tr>
                    <tr>
                        <?php if ($facture['Ffacture']['is_client'] === '1'): ?>
                            <td style="border-bottom: solid #DDD 1px"></td>
<?php endif; ?>
                        <td style="border-bottom: solid #DDD 1px;border-top: solid #fff 1px"></td>
                        <td>Total TTC</td>
                        <td style="text-align: right">
                            <?php
                            $pricettc = $priceht + $tva + 0.5;
                            //$initPricettc = number_format($pricettc, 3, '.', '');
                            echo number_format($pricettc, 3, '.', '');
                            ?>
                            <?php
                            App::import('Component', 'Pear.Pear');
                            $pear = new PearComponent(new ComponentCollection);
                            $pear->import('Numbers/Words');
                            $factureWord = new Numbers_Words();
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="" style="width: 30%;border: solid #DDDDDD 1px;border-radius: 5px; ">
                <p style="margin-left: 3px;margin-top: 2px;">
                    Accompte : <?php echo ($facture["Ffacture"]["accompte"] == 0) ? 'Sans accompte' : $facture["Ffacture"]["accompte"]; ?>  <br>
                    Type de Payement : <?php echo $facture['Payment']['name']; ?><br>
                    Devise : <?php echo $facture['Devise']['name']; ?><br>
                </p>
            </div>
            <p style="text-align: right;font-size: 15px;margin-right: 40px;">
                <?php $pricettc = number_format($pricettc, 3, '.', ''); ?>
                <?php $sommeFinal = explode('.', $pricettc); ?>
<?php echo ucfirst($factureWord->toWords($sommeFinal[0], 'fr')) . __(" Dinars"); ?>  et <?php echo ucfirst($factureWord->toWords($sommeFinal[1], 'fr')) . __(" Millimes"); ?>
                <br><b><?php echo __('Reçu Conforme'); ?></b>
            </p>
            <div class="cb noprint"></div><br>
        </div> 
    </div>
    <div class="cb noprint"></div><br>
    <button class="alignCenter btn btn-warning noprint" onclick="window.print();" value="Print">Print&nbsp;<i class="glyphicon glyphicon-print"></i></button>
</div> 
<?php phptopdf($pdf_options); ?>