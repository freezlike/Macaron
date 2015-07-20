<?php

App::uses('AppController', 'Controller');

class FournisseursController extends AppController {

    public $uses = array('Fournisseur');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function edit($id = null) {
        if($this->checkFifis() == false){
            $this->destroy();
        }
        if ($id !== null) {
            $this->Fournisseur->id = $id;
            if (!$this->Fournisseur->exists()) {
                throw new Exception("Fournisseur Invalid.");
            } else {
                $this->request->data = $this->Fournisseur->read();
            }
        }
        if ($this->request->is(array('put', 'post'))) {
            if ($this->Fournisseur->save($this->request->data)) {
                $this->Session->setFlash(__('Fournisseur Ajouté avec Succès'), 'notif');
                $this->redirect(array('controller' => 'fournisseurs', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Fournisseur Non Ajouté'), 'notif', array('type' => 'error'));
            }
        }
    }

    public function index() {
        if($this->checkFifis() == false){
            $this->destroy();
        }
        $this->set('fournisseurs', $this->Fournisseur->find('all'));
    }

    public function delete($id = null) {
        if($this->checkFifis() == false){
            $this->destroy();
        }
        
    }

}