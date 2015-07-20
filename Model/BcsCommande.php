<?php
App::uses('AppModel', 'Model');
/**
 * BcsCommande Model
 *
 * @property Bc $Bc
 * @property Commande $Commande
 */
class BcsCommande extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'bc_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'commande_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Bc' => array(
			'className' => 'Bc',
			'foreignKey' => 'bc_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Commande' => array(
			'className' => 'Commande',
			'foreignKey' => 'commande_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
