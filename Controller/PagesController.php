<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $uses = array('Ffacture', 'FfactureProduct', 'Product', 'Stock', 'Famille');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function best_product() {
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
                array_push($topVentes, array('id'=>$product['Product']['id'],'count' => $count, 'name' => $product['Product']['name'], 'price' => number_format(($product['Product']['price'] * $count), 3, '.', '.')));
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
        return $topVentes[0];
    }

    public function home() {
        $this->set('title_for_layout', 'Accueil');
        $this->Ffacture->recursive = 0;
//        debug($this->best_product());
//        die();
        $x = $this->FfactureProduct->find('first', array(
            'fields' => array('MAX(FfactureProduct.product_id) as product_id')
        ));
        debug($x);
        die();
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
        $dates = array();
        $dateDepart = $dateFirst;
        array_push($dates, $dateFirst->format('Y-m-d'));
        for ($index = 1; $index <= $diff; $index++) {
            echo $dateFirst->format('m');
            echo $dateFirst->format('Y-m-d') . "<br>";
            $dateFirst = $dateFirst->add(new DateInterval('P1M'));
            array_push($dates, $dateFirst->format('Y-m-d'));
        }
        debug($diff);
        debug($dates);
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
