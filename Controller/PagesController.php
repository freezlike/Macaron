<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $uses = array('Ffacture', 'Product', 'Stock', 'Famille');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function home() {
        $this->set('title_for_layout', 'Accueil');
        $this->Ffacture->recursive = 0;
        $firstBill = $this->Ffacture->find('first', array(
            'fields' => array('Ffacture.date'),
            'order' => array('Ffacture.date ASC')
        ));
        $firstBill = $firstBill['Ffacture']['date'];
        $lastBill = $this->Ffacture->find('first', array(
            'fields' => array('Ffacture.date'),
            'order' => array('Ffacture.date DESC')
        ));
        $lastBill = $lastBill['Ffacture']['date'];
        $dateFirst = new DateTime($firstBill);
        $dateLast = new DateTime($lastBill);
        $diff = $dateLast->diff($dateFirst)->m;
        for ($index = 0; $index < $diff; $index++) {
            
        }
        debug($diff);
        debug($firstBill);
        debug($lastBill);
        die();
        $this->Famille->recursive = 2;
        $familles = $this->Famille->find('all');
        foreach ($familles as $k => $famille) {
            if (empty($famille['Stock'])) {
                unset($familles[$k]);
            }
        }$this->set(compact('familles'));
    }

    public function stats_familles() {
        $this->response->header('Access-Control-Allow-Origin: *');
        $familles = $this->Famille->find('all');
        $stats = array();
        foreach ($familles as $famille):
            if (!empty($famille['Stock'])) {
                array_push($stats, $famille);
            }
        endforeach;
        $statsFinal = array();
        foreach ($stats as $k => $stat):
            $qte = 0;
            $statsFinal[$k]['Famille']['name'] = $stat['Famille']['name'];
            if (count($stat['Stock']) === 1) {
                $statsFinal[$k]['Famille']['qte'] = $stat['Stock'][0]['qte'];
            } else {
                foreach ($stat['Stock'] as $q):
                    $qte += $q['qte'];
                endforeach;
                $statsFinal[$k]['Famille']['qte'] = $qte;
            }
        endforeach;
        header("Access-Control-Allow-Origin: *");
        $this->set('familles', $statsFinal);
    }

}
