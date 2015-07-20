<?php

App::uses('AppController', 'Controller');

class FamillesController extends AppController {

    public $uses = array('Famille');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function edit($id = null) {
        if ($id !== null) {
            $this->Famille->id = $id;
            if (!$this->Famille->exists()) {
                throw new Exception("Famille Invalid.");
            }
        }
        if ($this->request->is(array('put', 'post'))) {
            if ($this->Famille->save($this->request->data)) {
                $this->Session->setFlash(__('Famille Ajouté avec Succès'), 'notif');
                $this->redirect(array('controller' => 'familles', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Famille Non Ajouté'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Famille->read();
        }
    }

    public function index() {
        $this->set('familles', $this->Famille->find('all'));
    }

    public function delete($id = null) {
        
    }

}