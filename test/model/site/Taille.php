<?php
namespace model\site;

class Taille {
    private $tailleID;
    private $taille;
    
    /////*** Setter ***/////
    public function setTailleID($tailleID) {
        if ($tailleID > 0) {
            $this->tailleID = $tailleID;
        }
    }
    public function setTaille($taille) {
        if (is_string($taille)) {
            $this->taille = $taille;
        }
    }
    /////*** Getter ***/////
    public function getTailleID() {
        return $this->tailleID;
    }
    public function getTaille() {
        return $this->taille;
    }
}
