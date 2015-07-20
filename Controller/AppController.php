<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $uses = array('Notification');
    public $components = array(
        'Session',
        'Auth',
        'RequestHandler'
    );

    //var $uses = array('Pear.Pear');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('notifs', $this->Notification->find('all', array('conditions' => array('Notification.state' => 0))));
        $this->set('current_role', $this->Auth->user('Role.name'));
    }

    public function checkAdmin() {
        $userRole = $this->Auth->user('Role.name');
        if ($userRole === 'Administrateur') {
            return true;
        }
        return false;
    }

    public function checkMacaron() {
        $userRole = $this->Auth->user('Role.name');
        if ($userRole === 'Macaron' || $userRole === 'Administrateur') {
            return true;
        }
        return false;
    }

    public function checkFifis() {
        $userRole = $this->Auth->user('Role.name');
        if ($userRole === 'Fifis' || $userRole === 'Administrateur') {
            return true;
        }
        return false;
    }

    public function destroy() {
        $this->Auth->logout();
        $this->Session->setFlash(__("Opération Non autorisé."), 'notif', array('type' => 'error'));
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

}
