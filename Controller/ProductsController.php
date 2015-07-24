<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {

    public $uses = array('Product', 'Ffacture', 'FfactureProduct');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function top_ventes() {
        if ($this->checkAdmin() == false) {
            $this->destroy();
        }
        //ini_set("memory_limit","2048M");
        ini_set('memory_limit', '-1');
        $products = $this->Product->find('all', array(
            'fields' => array('Product.id', 'Product.name', 'Product.price')
        ));
        $topVentes = array();
        foreach ($products as $product):
            $count = $this->FfactureProduct->find('count', array(
                'conditions' => array('FfactureProduct.product_id' => $product['Product']['id'])
            ));
            if ($count > 0) {
                array_push($topVentes, array('count' => $count, 'name' => $product['Product']['name'], 'price' => number_format(($product['Product']['price'] * $count), 3, '.', '.')));
            }
        endforeach;
        //Sort Top Ventes
        sort($topVentes, SORT_FLAG_CASE);
        //Reverse for ORDER DESC
        $topVentes = array_reverse($topVentes);
        foreach ($topVentes as $k => $tp):
            if ($k > 99) {
                unset($topVentes[$k]);
            }
        endforeach;
        $this->set(compact('topVentes'));
    }

    public function stats_ventes($first_date = null, $last_date = null, $limit = 5) {
        if ($this->checkAdmin() == false) {
            $this->destroy();
        }
        $products = $this->Product->find('all', array(
            'fields' => array('Product.id', 'Product.name')
        ));
        $topVentes = array();
        foreach ($products as $product):
            $count = $this->FfactureProduct->find('count', array(
                'conditions' => array('FfactureProduct.product_id' => $product['Product']['id'])
            ));
            if ($count > 0) {
                array_push($topVentes, array('value' => $count, 'name' => $product['Product']['name']));
            }
        endforeach;
        //Sort Top Ventes
        sort($topVentes, SORT_FLAG_CASE);
        //Reverse for ORDER DESC
        $topVentes = array_reverse($topVentes);

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
