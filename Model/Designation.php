<?php
App::uses('AppModel', 'Model');
/**
 * Designation Model
 *
 * @property Facture $Facture
 */
class Designation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Facture' => array(
			'className' => 'Facture',
			'joinTable' => 'factures_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'facture_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
