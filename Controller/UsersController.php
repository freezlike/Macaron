<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array('User');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function editc($id = null, $type = null) {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        if ($this->request->is(array('put', 'post'))) {
		$codeClient = $this->User->find('count',array(
				'conditions'=>array('User.role_id' => 2)
			));
			$cc = $codeClient + 1;
			$this->request->data['User']['code_client'] = "CC-".$cc;
			$this->request->data['User']['role_id'] = 2;
            if ($this->User->save($this->request->data)) {
                if ($type !== null && $type === 'newUser') {
                    $this->Session->setFlash(__('Client Ajouté avec Succès'), 'notif');
                } elseif ($id == null) {
                    $this->Session->setFlash(__('Client Ajouté avec Succès'), 'notif');
                } else {
                    $this->Session->setFlash(__('Client Modifié avec Succès'), 'notif');
                }
                if ($type !== null && $type === 'newUser') {
                    $this->redirect(array('controller' => 'factures', 'action' => 'add'));
                } else {
                    $this->redirect(array('controller' => 'users', 'action' => 'indexc'));
                }
            } else {
                $this->Session->setFlash(__('Utilisateur Non Ajouté'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            if (isset($this->request->data['User']['password'])) {
                unset($this->request->data['User']['password']);
            }
        }
    }

    public function indexc() {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        $this->set('users', $this->User->find('all', array('conditions' => array('role_id' => 2))));
    }

    public function edit($id = null, $type = null) {
        if ($this->checkAdmin() == false) {
            $this->destroy();
        }
        if ($id !== null && $id !== 'null') {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new Exception("Utilisateur Invalid.");
            }
        }

        if ($this->request->is(array('put', 'post'))) {
			$codeClient = $this->User->find('count',array(
				'conditions'=>array('User.role_id' => 2)
			));
			$cc = $codeClient + 1;
			$this->request->data['User']['code_client'] = $cc;
			$this->request->data['User']['role_id'] = 2;
            if ($this->User->save($this->request->data)) {
                if ($id !== null && $id !== 'null') {
                    $this->Session->setFlash(__('Utilisateur Modifé avec Succès'), 'notif');
                } else {
                    $this->Session->setFlash(__('Utilisateur Ajouté avec Succès'), 'notif');
                }
                if ($type !== null && $type == 'newUser') {
                    $this->redirect(array('controller' => 'factures', 'action' => 'add'));
                } else {
                    $this->redirect(array('controller' => 'users', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Utilisateur Non Ajouté'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] !== null) {
                unset($this->request->data['User']['password']);
            }
        }
        $roles = $this->User->Role->find('list',array(
            'conditions'=>array('Role.id !='=>2)
        ));
        $this->set(compact('roles'));
    }

    public function index() {
        if($this->checkAdmin() == false){
            $this->destroy();
        }
        $this->set('users', $this->User->find('all', array('conditions' => array('User.username !=' => ''))));
    }

    public function delete($id = null) {
        if($this->checkAdmin() == false){
            $this->destroy();
        }
        if ($id !== null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash(__('Utilisateur ou Client Invalide'), 'notif', array('type' => 'error'));
            }
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Utilisateur Supprimé'), 'notif');
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__('Utilisateur Non Supprimé'), 'notif', array('type' => 'error'));
            $this->redirect($this->referer());
        }
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Identification réussie'), 'notif');
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__("Nom d'utilisateur ou mot de passe erroné"), 'notif', array('type' => 'error'));
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('Fermeture de session réussie'), 'notif');
        return $this->redirect($this->Auth->logout());
    }

}
