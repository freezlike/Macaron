<?php

App::uses('AppController', 'Controller');

class CommandesController extends AppController {

    public $uses = array('Commande', 'BcsCommande', 'Bc');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('bc');
    }

    public function genBc($id = null) {
        $this->Bc->recursive = 2;
        $bc = $this->Bc->find('first', array(
            'conditions' => array('Bc.id' => $id)
        ));
        $this->set(compact('id', 'bc'));
    }

    public function bc($id = null) {
        $this->Bc->recursive = 2;
        $bc = $this->Bc->find('first', array(
            'conditions' => array('Bc.id' => $id)
        ));
        $this->set(compact('bc'));
    }

    public function edit($id = null) {
        $listeID = array();
        $data = array();
        if ($this->request->is(array('post', 'put'))) {
            unset($this->request->data['Commande']);
            $data = $this->request->data;
            foreach ($data['Product'] as $k => $product):
                debug($k);
                debug($product);
                $this->Commande->save(array('id' => null, 'product_id' => $k, 'qte' => $product));
                $lastID = $this->Commande->getLastInsertID();
                array_push($listeID, $lastID);
            endforeach;

            $this->Bc->save(array('id' => null, 'date' => utf8_encode(strftime("%Y-%m-%d"))));
            $idBC = $this->Bc->getLastInsertID();
            foreach ($listeID as $lid):
                $this->BcsCommande->save(array('id' => null, 'bc_id' => $idBC, 'commande_id' => $lid));
            endforeach;
            $this->Session->setFlash(__("Bon de de commande générer pour la date du : ") . utf8_encode(strftime("%Y-%m-%d")), 'notif');
            $this->redirect(array('controller' => 'commandes', 'action' => 'edit'));
        }
        $products = $this->Commande->Product->find('list');
        $this->set(compact('products'));
    }

    public function index() {
        $this->set('bcs', $this->BcsCommande->find('all'));
    }

    public function bl($id = null) {
        
    }

}