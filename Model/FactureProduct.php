<?php

App::uses('AppModel', 'Model');

class FactureProduct extends AppModel {

    //public $recursive = -1;
    public $useTable = 'factures_products';
    public $belongsTo = array(
        'Facture'
    );

}
