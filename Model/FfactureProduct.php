<?php

App::uses('AppModel', 'Model');

class FfactureProduct extends AppModel {

    //public $recursive = -1;
    public $useTable = 'ffactures_products';
    public $belongsTo = array(
        'Ffacture'
    );

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $lp = $this->data['FfactureProduct']['last_unit_price'];
        $last_price = $lp / 1.18;
        $this->data['FfactureProduct']['last_unit_price'] = $last_price;
        return $this->data;
    }

}
