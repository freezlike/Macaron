<?php echo $this->Html->css('wijmo.min', array('inline' => false)); ?>
<?php echo $this->Html->css('app', array('inline' => false)); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Dashboard
            <small>
                <?php echo __('Statistics'); ?>
            </small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="javascript:return false;">
                    Dashboard
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:return false;">
                    Accueil
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> <?php echo __("Famille Produits"); ?>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- this is the FlexPie directive -->
                <wj-flex-pie
                    items-source="itemsSource"
                    binding="value"
                    binding-name="name"
                    header="Pourcentage Famille / Qte">
                </wj-flex-pie>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> <?php echo __("Stats Qte par famille"); ?>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- this is the FlexPie directive -->
                <wj-flex-pie
                    items-source="itemsSource"
                    binding="value"
                    binding-name="name">
                </wj-flex-pie>
            </div>
        </div>
    </div>
</div>
<?php //echo $this->Html->script('jquery-2.0.0.min', array('inline' => false)); ?>
<?php echo $this->Html->script('angular.min', array('inline' => false)); ?>
<?php echo $this->Html->script('wijmo.min', array('inline' => false)); ?>
<?php echo $this->Html->script('wijmo.input.min', array('inline' => false)); ?>
<?php echo $this->Html->script('wijmo.grid.min', array('inline' => false)); ?>
<?php echo $this->Html->script('wijmo.chart.min', array('inline' => false)); ?>
<?php echo $this->Html->script('wijmo.angular.min', array('inline' => false)); ?>
<?php //echo $this->Html->script('app', array('inline' => false)); ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
 var names = [],
        datas = [],
        somme = 0;
        
// declare app module
var app = angular.module('app', ['wj']);

// controller provides data
app.controller('simpleCtrl', function appCtrl($scope) {
   
        $.getJSON("http://localhost/macaron/pages/stats_familles.json", function(data) {
        $.each(data, function(key, value) {
            //console.log(value.Famille.name);
            //console.log(value.Famille.qte);
            names.push(value.Famille.name);
            datas.push(parseInt(value.Famille.qte));
            somme += parseInt(value.Famille.qte);
            
        });
          sessionStorage.setItem('namesF',JSON.stringify(names));
        sessionStorage.setItem('datasF',JSON.stringify(datas));
        sessionStorage.setItem('sommeF',JSON.stringify(somme));
    });
    //console.log(names);
    var n =  sessionStorage.getItem('namesF');
    var d = sessionStorage.getItem('datasF');
    var s = sessionStorage.getItem('sommeF');
    var data = [];
    // populate itemsSource
    //for (var i = 0; i < n.length; i++) {
    $.each(JSON.parse(n),function(key,value){
        data.push({
            name: value,
            value: Math.round((JSON.parse(d)[key] * 100)/s)
        });
       //console.log(data);
    
    });
    //}
  //  console.log(data);
    $scope.itemsSource = data;
});
$(document).ready(function(){
    $("#wj-wm").attr('style','display:none;');
});
<?php echo $this->Html->scriptEnd(); ?>
