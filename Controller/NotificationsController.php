<?php

App::uses('AppController', 'Controller');

class NotificationsController extends AppController {

    public $uses = array('Notification');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function view($id = null) {
        if ($id !== null) {
            $this->Notification->id = $id;
            if (!$this->Notification->exists()) {
                throw new Exception("Notification Invalid.");
            }
        }
        if ($this->request->is(array('put', 'post'))) {
            if ($this->Notification->save($this->request->data)) {
                $this->Session->setFlash(__('Notification Validée avec Succès'), 'notif');
                $this->redirect(array('controller' => 'notifications', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Notification Non Validée'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->Notification->read();
        }
    }

    public function index() {
        $this->set('notifications', $this->Notification->find('all'));
    }

    public function delete($id = null) {
        if ($id !== null) {
            $this->Notification->id = $id;
            if (!$this->Notification->exists()) {
                throw new Exception("Notification Invalid.");
            }
        }
        if ($this->Notification->delete()) {
            $this->Session->setFlash(__('Notification Supprimée'), 'notif');
            $this->redirect(array('controller' => 'notifications', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Notification Non Supprimée'), 'notif', array('type' => 'error'));
        }
    }

    public function valider($id = null) {
        if ($id !== null) {
            $this->Notification->id = $id;
            if (!$this->Notification->exists()) {
                throw new Exception("Notification Invalid.");
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if($this->Notification->saveField('state',1)){
                $this->Session->setFlash(__("Vous avez valider la demande veuillez alimenter le stock de suite"),'notif');
                $this->redirect(array('controller'=>'pages','action'=>'home'));
            }
        }
    }

}