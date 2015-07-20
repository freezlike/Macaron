<?php

App::uses('AppModel', 'Model');

/**
 * Facture Model
 *
 * @property User $User
 * @property Payment $Payment
 * @property Devise $Devise
 * @property Detail $Detail
 */
class Ffacture extends AppModel {

    public $actsAs = array('Containable');

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';



    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Payment' => array(
            'className' => 'Payment',
            'foreignKey' => 'payment_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Devise' => array(
            'className' => 'Devise',
            'foreignKey' => 'devise_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => array(
                'code_client',
                'display_name',
                'email',
                'aboutme',
                'mf'
            ),
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array('Product');

//    public $hasAndBelongsToMany = array(
//        'Product' =>
//        array(
//            'className' => 'Product',
//            'joinTable' => 'ffactures_products',
//            'foreignKey' => 'ffacture_id',
//            'associationForeignKey' => 'product_id',
//            'unique' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'finderQuery' => '',
//            'with' => ''
//        )
    // );
    

}
