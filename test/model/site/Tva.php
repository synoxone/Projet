<?php
namespace model\site;

class Tva {
    private $tvaID;
    private $tva;
    
    /////*** Setter ***/////
    public function setTvaId($tvaID) {
        if ($tvaID > 0) {
            $this->tvaID = $tvaID;
        }
    }
    public function setTva($tva) {
        if ($tva > 0) {
            $this->tva = $tva;
        }
    }
    
    /////*** Getter ***/////
    public function getTvaId() {
        return $this->tvaID;
    }
    public function getTva() {
        return $this->tva;
    }
}
