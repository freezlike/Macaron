<?php

App::uses('AppController', 'Controller');

class StocksController extends AppController {

    public $uses = array('Stock');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function edit($id = null) {
        if ($this->checkFifis() == false) {
            $this->destroy();
        }
        if ($id !== null) {
            $this->Stock->id = $id;
            if (!$this->Stock->exists()) {
                throw new Exception("Stock Invalid.");
            }
        }
        if ($this->request->is(array('put', 'post'))) {
            $famille_id = $this->Stock->Product->find('first', array(
                'conditions' => array('Product.id' => $this->request->data['Stock']['product_id'])
            ));
            $famille_id = $famille_id['Product']['famille_id'];
            $this->request->data['Stock']['famille_id'] = $famille_id;
            if ($this->Stock->save($this->request->data)) {
                $this->Session->setFlash(__('Stock Ajouté avec Succès'), 'notif');
                $this->redirect(array('controller' => 'stocks', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Stock Non Ajouté'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Stock->read();
            $products = $this->Stock->Product->find('list');
            $fournisseurs = $this->Stock->Fournisseur->find('list');
            $this->set(compact('familles', 'products', 'fournisseurs'));
        }
    }

    public function index() {
        if ($this->checkFifis() == false) {
            $this->destroy();
        }
        $this->set('stocks', $this->Stock->find('all',array('order' => array('Stock.id ASC'))));
    }

    public function delete($id = null) {
        $this->Stock->id = $id;
        if ($this->Stock->delete()) {
            $this->Session->setFlash(__("Stock Supprimé avec success."), 'notif');
            $this->redirect(array('controller' => 'stoks', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__("Stock Non Supprimé Problème de serveur."), 'notif',array('type'=>'error'));
        }
    }

}