<?php
namespace model\client;

class Cdeart {
    
    private $cdeartID;
    private $cdeID;
    private $nom;
    private $taille;
    private $qt;
    
    /////*** Setter ***/////
    public function setCdeartId($cdeartID) {
        if ($cdeartID > 0) {
            $this->cdeartID = $cdeartID;
        }
    }
    public function setCdeId($cdeID) {
        if ($cdeID > 0) {
            $this->cdeID = $cdeID;
        }
    }
    public function setNom($nom) {
        if (is_string($nom)) {
            $this->nom = $nom;
        }
    }
    public function setTaille($taille) {
        if (is_string($taille)) {
            $this->taille = $taille;
        }
    }
    public function setQt($qt) {
        if ($qt > 0) {
            $this->qt = $qt;
        }
    }
    
    /////*** Getter ***/////
    public function getCdeartId() {
        return $this->cdeartID;
    }
    public function getCdeId() {
        return $this->cdeID;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getTaille() {
        return $this->taille;
    }
    public function getQt() {
        return $this->qt;
    }
}
