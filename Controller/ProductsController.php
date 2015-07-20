<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {

    public $uses = array('Product', 'Ffacture');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function stats_ventes($first_date = null, $last_date = null, $limit = 5) {
        if ($this->checkAdmin() == false) {
            $this->destroy();
        }
        $this->Ffacture->recursive = 1;
        $produits = $this->Ffacture->find('all', array(
            'conditions' => array("Ffacture.date BETWEEN '$first_date' AND '$last_date'"),
            'limit' => $limit,
            'order' => array('Ffacture.id DESC'),
                //'group'=>'Ffacture.facture_id'
        ));
        debug($produits);
        die();
    }

    public function edit($id = null) {
        if ($this->checkFifis() == false) {
            $this->destroy();
        }
        if ($id !== null) {
            $this->Product->id = $id;
            if (!$this->Product->exists()) {
                throw new Exception("Produit Invalid.");
            }
        }
        if ($this->request->is(array('put', 'post'))) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Produit Ajouté avec Succès'), 'notif');
                $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Produit Non Ajouté'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Product->read();
            $familles = $this->Product->Famille->find('list');
            $this->set(compact('familles'));
        }
    }

    public function index() {
        if ($this->checkFifis() == false) {
            $this->destroy();
        }
        $this->set('products', $this->Product->find('all'));
    }

    public function delete($id = null) {
        
    }

}
