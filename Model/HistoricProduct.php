<?php

App::uses('AppModel', 'Model');

class HistoricProduct extends AppModel {

    //public $recursive = -1;
    public $useTable = 'historics_products';
    public $belongsTo = array(
        'Historic'
    );

}
