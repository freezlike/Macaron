<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * @property Famille $Famille
 * @property Product $Product
 * @property Fournisseur $Fournisseur
 */
class Stock extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Famille' => array(
			'className' => 'Famille',
			'foreignKey' => 'famille_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fournisseur' => array(
			'className' => 'Fournisseur',
			'foreignKey' => 'fournisseur_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
