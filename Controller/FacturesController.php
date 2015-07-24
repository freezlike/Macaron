<?php

App::uses('AppController', 'Controller');

class FacturesController extends AppController {

    public $uses = array('Notification', 'Famille', 'User', 'Stock', 'Product', 'Facture', 'FactureProduct', 'Historic', 'HistoricProduct', 'Ffacture', 'FfactureProduct');
    public $Qtepass = false;

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function declaration($first_date = null, $last_date = null) {
        //if ($this->request->is('post')):
        $this->Ffacture->recursive = 1;
        $factures = $this->Ffacture->find('all', array(
            //'conditions' => array("Ffacture.date BETWEEN '$first_date' AND DATE_ADD('$first_date', INTERVAL 30 DAY)"),
            'conditions' => array("Ffacture.date BETWEEN '$first_date' AND '$last_date'"),
            'order' => array('Ffacture.date ASC')
        ));

        $clients = $this->Ffacture->find('count', array(
            //'conditions' => array("Ffacture.date BETWEEN '$first_date' AND DATE_ADD('$first_date', INTERVAL 30 DAY)",'Ffacture.is_client'=>1),
            'conditions' => array("Ffacture.date BETWEEN '$first_date' AND '$last_date'", 'Ffacture.is_client' => 1),
            'order' => array('Ffacture.date ASC')
        ));
        $journaux = $this->Ffacture->find('count', array(
            //'conditions' => array("Ffacture.date BETWEEN '$first_date' AND DATE_ADD('$first_date', INTERVAL 30 DAY)",'Ffacture.is_client'=>0),
            'conditions' => array("Ffacture.date BETWEEN '$first_date' AND '$last_date'", 'Ffacture.is_client' => 0),
            'order' => array('Ffacture.date ASC')
        ));

        $this->set(compact('factures', 'clients', 'journaux'));
    }

    public function add() {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        $last_id = null;
        if ($this->request->is('post')) {
            $this->Stock->recursive = 0;
            //debug($this->request->data);
            $productQte = $this->request->data['Product'];
            if ($productQte == null) {
                $this->Session->setFlash(__("Veuillez Choisir les produits de la facture, merci"), 'notif', array('type' => 'error'));
                $this->redirect($this->referer());
            }
            //debug($productQte);
            //$qtepass = array();
            /* foreach ($productQte as $k => $pqte) {
              foreach ($pqte as $k => $qte) {
              $stock = $this->Stock->find('first', array(
              'conditions' => array('Stock.product_id' => $k)
              ));
              echo ($stock['Stock']['qte'] > $qte) ? $this->Qtepass = true : $this->Qtepass = false;
              if ($this->Qtepass == false) {
              //$this->Session->setFlash(__("La Quantité du produit (" . $stock['Product']['name'] . ") ne répond à la quantité demandé via la facture..."), 'notif', array('type' => 'error'));
              $data = array(
              'id' => null,
              'name' => 'Commande : ' . $stock['Product']['name'],
              'content' => __("Stock manquant pour le produit ") . $stock['Product']['name'] . __(" avant facture avec une quantité demandée de ") . $qte,
              'type' => 'commande'
              );
              //debug($data);
              $this->Notification->save($data);
              }
              array_push($qtepass, $this->Qtepass);
              }
              } */
            //if (in_array(false, $qtepass)) {
            if (1 < 0) {
                $this->Session->setFlash(__("Valider votre stock avant de passer cette facture"), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index'));
            } else {
                if ($this->request->data['Facture']['is_client'] == 1) {
                    $products = $this->request->data['Product'];
                    unset($this->request->data['Product']);
                    unset($this->request->data['Facture']['product_id']);
                    unset($this->request->data['Facture']['count']);
                    unset($this->request->data['Facture']['remise']);
                    //$count = $this->Ffacture->find('count');
                    //$this->request->data['Facture']['code_facture'] = "CF-" . ($count + 1);
                    $this->request->data['Facture']['avoir'] = 0;
                    //$this->request->data['Facture']['date'] = date("Y-m-d H:i:s");
                    $this->request->data['Facture']['limit_date'] = $this->request->data['Facture']['date'];
                    $datas['Products'] = array();
                    foreach ($products as $k => $p) {
                        $row = array();
                        $pid = "";
                        $qte = "";
                        $remise = "";
                        $remise['remise'] = $k;
                        $row['remise'] = $k;
                        foreach ($p as $kp => $vp) {
                            $row['product_id'] = $kp;
                            $row['qte'] = $vp;
                            array_push($datas['Products'], $row);
                        }
                    }
                    if ($this->Ffacture->save(current($this->request->data))) {
                        $last_id = $this->Ffacture->getLastInsertID();
                        foreach ($datas as $product) {
                            foreach ($product as $value) {
                                $this->Product->id = $value['product_id'];
                                $prd = $this->Product->field('price');
                                //$last_unit_price = ($prd / 1.18);
                                $data = array('id' => NULL, 'ffacture_id' => $last_id, 'product_id' => $value['product_id'], 'last_unit_price' => $prd, 'qte' => $value['qte'], 'remise' => $value['remise']);
                                $this->FfactureProduct->save($data);
                            }
                        }
                        //$this->Session->setFlash(__('Facture prête à être générée.'), 'notif');
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('La facture n\'a pas pu être générée. S\'il vous plaît, essayez à nouveau.'), 'notif', array('type' => 'error'));
                    }
                }
                if ($this->request->data['Facture']['is_client'] == 0) {
                    $products = $this->request->data['Product'];
                    unset($this->request->data['Product']);
                    unset($this->request->data['Facture']['product_id']);
                    unset($this->request->data['Facture']['count']);
                    unset($this->request->data['Facture']['remise']);
                    $count = $this->Facture->find('count');
                    $this->request->data['Facture']['code_facture'] = "CF-" . ($count + 1);
                    $datas['Products'] = array();
                    foreach ($products as $k => $p) {
                        $row = array();
                        $pid = "";
                        $qte = "";
                        $remise = "";
                        $remise['remise'] = $k;
                        $row['remise'] = $k;
                        foreach ($p as $kp => $vp) {
                            $row['product_id'] = $kp;
                            $row['qte'] = $vp;
                            array_push($datas['Products'], $row);
                        }
                    }
                    $this->request->data['Facture']['user_id'] = 0;
                    if ($this->Facture->save($this->request->data)) {
                        $last_id = $this->Facture->getLastInsertID();

                        foreach ($datas as $product) {
                            //debug($product);
                            foreach ($product as $value) {
                                //debug($value);
                                //$currentStock = $this->Stock->find('first', array(
                                //    'conditions' => array('Stock.product_id' => $value['product_id'])
                                //));
                                $this->Product->id = $value['product_id'];
                                //$lastQte = $this->Stock->read('qte', $currentStock['Stock']['id']);
                                //$newQte = $lastQte['Stock']['qte'] - $value['qte'];
                                //$this->Stock->id = $currentStock['Stock']['id'];
                                //$this->Stock->saveField('qte', $newQte);
                                $data = array('id' => NULL, 'facture_id' => $last_id, 'product_id' => $value['product_id'], 'qte' => $value['qte'], 'remise' => $value['remise']);
                                $this->FactureProduct->save($data);
                            }
                        }
                        $this->Session->setFlash(__('Facture Ajoutée avec succès, dans la facture Journalière.'), 'notif');
                    } else {
                        $this->Session->setFlash(__('La facture n\'a pas pu être générée. S\'il vous plaît, essayez à nouveau.'), 'notif', array('type' => 'error'));
                    }
                }
            }
        }
        $users = $this->User->find('list', array(
            'conditions' => array('User.role_id' => 2)
        ));
        $payments = $this->Facture->Payment->find('list');
        $devises = $this->Facture->Devise->find('list');
        $products = $this->Facture->Product->find('list');
        $this->set(compact('payments', 'devises', 'products', 'users'));
    }

    public function next($last_fc = null) {
        $this->Facture->id = $last_fc;
        $facture = $this->Facture->read();
        debug($factures);
        die();
        //$facture['Facture']['date'] = $facture['Facture']['created'];
        //$finalF = $this->Ffacture->find('count');
        //$facture['Facture']['code_facture'] = "CF-" . ($finalF + 1);
        $facture['Facture']['avoir'] = '0';
        //unset($facture['Facture']['id']);
        unset($facture['Facture']['created']);

        if ($this->Ffacture->save($facture['Facture'])) {
            $last_id = $this->Ffacture->getLastInsertID();
            //debug($last_id);
            foreach ($facture['Product'] as $v) {
                $data = array('id' => NULL, 'ffacture_id' => $last_id, 'product_id' => $v['id'], 'last_unit_price' => $v['price'], 'qte' => $v['FacturesProduct']['qte'], 'remise' => $v['FacturesProduct']['remise']);
                $this->FfactureProduct->save($data);
            }
            $this->Session->setFlash(__('Facture achevée avec succès'), 'notif');
            $this->redirect(array('controller' => 'factures', 'action' => 'index'));
        }
    }

    public function journa($date = null) {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        $now = $date;
        $journal = $this->Ffacture->find('all', array(
            'conditions' => array('Ffacture.date LIKE' => '%' . $now . '%', 'Ffacture.is_client' => false)
        ));
//        debug($journal); die();
        if (!empty($journal)) {
            $this->Session->setFlash(__("Facture Journalière du $date a été déjà générer sous le code : ") . $journal['Ffacture']['code_facture'], "notif", array("type" => "error"));
            $this->redirect(array('controller' => 'factures', 'action' => 'index'));
        } else {
            $factures = $this->Facture->find('all', array(
                'conditions' => array('Facture.created LIKE' => '%' . $now . '%', 'Facture.is_client' => false)
            ));
            $fac_journa = array();
            $this->set(compact('factures', 'now'));
            $i = 0;
            if ($this->request->is('post')) {
                foreach ($factures as $kf => $fj) {
                    foreach ($fj['Product'] as $k => $value) {
                        unset($value['id']);
                        array_push($fac_journa, $value['FacturesProduct']);
                        $fac_journa[$i]['price'] = $value['price'];
                        $i++;
                    }
                }
                $lastF = array();
                $j = 0;
                foreach ($fac_journa as $fvc) {
                    $lastF[$j]['ffacture_id'] = null;
                    $lastF[$j]['product_id'] = $fvc['product_id'];
                    $lastF[$j]['qte'] = $fvc['qte'];
                    $lastF[$j]['remise'] = $fvc['remise'];
                    $lastF[$j]['price'] = $fvc['price'];
                    $j++;
                }
                //$cf = $this->Ffacture->find('count');
                //debug($cf + 1);
                $data = array(
                    'code_facture' => $this->request->data['Facture']['code_facture'],
                    'limit_date' => $this->request->data['Facture']['date'],
                    'date' => $this->request->data['Facture']['date'],
                    'accompte' => 0,
                    'user_id' => 0,
                    'is_client' => 0,
                    'payment_id' => 2,
                    'devise_id' => 1
                );
                //debug($fac_journa);
                $this->Ffacture->save($data);
                $lid = $this->Ffacture->getLastInsertID();
                //debug($lid);
                foreach ($lastF as $value) {
                    $data = array('id' => NULL, 'ffacture_id' => $lid, 'product_id' => $value['product_id'], 'last_unit_price' => $value['price'], 'qte' => $value['qte'], 'remise' => $value['remise']);
                    $this->FfactureProduct->save($data);
                }
                $this->Facture->query("TRUNCATE factures");
                $this->Facture->query("TRUNCATE factures_products");
                $this->Session->setFlash(__("Facture Journalière du $now a été générée avec succès."), "notif");
                $this->redirect(array('controller' => 'factures', 'action' => 'index'));
            }
        }
    }

    public function index() {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        $this->set('factures', $this->Ffacture->find('all'));
    }

    public function exportPdf($id = null) {
        $this->Ffacture->recursive = 2;
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        if ($id !== null) {
            $this->Ffacture->id = $id;
            if ($this->Ffacture->exists()) {
                $this->pdfConfig = array(
                    'filename' => 'facture(' . $facture['Ffacture']['code_facture'] . ')',
                    'download' => (bool) $this->request->query('download')
                );
                $facture = $this->Ffacture->find('first', array(
                    'conditions' => array('Ffacture.id' => $id)
                ));
                $this->set('facture', $facture);
            } else {
                $this->Session->setFlash(__('Cette Facture n\'existe pas...'), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index'));
            }
        }
    }

    public function view($id = null) {
//        App::import('Vendor','phpqrcode/phpqrcode');
//        $QRcode = new QRcode();
//        $qr = $QRcode->png($id,IMAGES . "filename$id.png");
//        debug($qr);die();
        $this->Ffacture->recursive = 2;
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        if ($id !== null) {
            $this->Ffacture->id = $id;
            if ($this->Ffacture->exists()) {
                $facture = $this->Ffacture->find('first', array(
                    'conditions' => array('Ffacture.id' => $id)
                ));
                $this->set('facture', $facture);
            } else {
                $this->Session->setFlash(__('Cette Facture n\'existe pas...'), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index'));
            }
        }
    }

    public function aze($id = null) {
        
    }

    public function pdf($id = null) {
        $this->Ffacture->recursive = 2;
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
        if ($id !== null) {
            $this->Ffacture->id = $id;
            if ($this->Ffacture->exists()) {
                $facture = $this->Ffacture->find('first', array(
                    'conditions' => array('Ffacture.id' => $id)
                ));
                $this->set('facture', $facture);
            } else {
                $this->Session->setFlash(__('Cette Facture n\'existe pas...'), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index'));
            }
        }
    }

    public function avoir($id = null) {
        if ($this->checkMacaron() == false) {
            $this->destroy();
        }
    }

}
