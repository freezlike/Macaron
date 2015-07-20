<?php
App::uses('AppModel', 'Model');
/**
 * Devise Model
 *
 */
class Devise extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        public $hasMany = array(
        'Facture' => array(
            'className' => 'Facture',
            'foreignKey' => 'payment_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
