<?php
namespace model\client;

class Commande {
    
    private $cdeID;
    private $date;
    private $ht;
    /*private $tva;
    private $ttc;*/
    private $adresseID;
    
    /////*** Setter ***/////
    public function setCdeId($cdeID) {
        if ($cdeID > 0) {
            $this->cdeID = $cdeID;
        }
    }
    public function setDate($date) {
        if (is_string($date)) {
            $this->date = $date;
        }
    }
    public function setHt($ht) {
        if ($ht > 0) {
            $this->ht = $ht;
        }
    }
    /*public function setTva($tva) {
        if ($tva > 0) {
            $this->tva = $tva;
        }
    }
    public function setTtc($ttc) {
        if ($ttc > 0) {
            $this->ttc = $ttc;
        }
    }*/
    public function setAdresseId($adresseID) {
        if ($adresseID > 0) {
            $this->adresseID = $adresseID;
        }
    }
    
    /////*** Getter ***/////
    public function getCdeId() {
        return $this->cdeID;
    }
    public function getDate() {
        return $this->date;
    }
    public function getHt() {
        return $this->ht;
    }
    /*public function getTva() {
        return $this->tva;
    }
    public function getTtc() {
        return $this->ttc;
    }*/
    public function getAdresseId() {
        return $this->adresseID;
    }
}
