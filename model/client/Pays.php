<?php
namespace model\client;

class Pays {
    protected $paysID;
    protected $pays;
    
    /////*** Setter ***/////  
    public function setPaysId($paysID) {
        if ($paysID >0) {
            $this->paysID = $paysID;
        }
    }
    public function setPays($pays) {
        if (is_string($pays)) {
            $this->pays = $pays;
        }
    }
    
    /////*** Getter ***/////  
    public function getPaysId() {
        return $this->paysID;
    }
    public function getPays() {
        return $this->pays;
    }
    
}
