<?php
namespace model\site;

class Prix {
    protected $prixID;
    protected $catID;
    protected $gammeID;
    protected $prix;
    
    /////*** Setter ***/////
    public function setPrixID($prixID) {
        if ($prixID > 0) {
            $this->prixID = $prixID;
        }
    }
    public function setCatID($catID) {
        if ($catID > 0) {
            $this->catID = $catID;
        }
    }
    public function setGammeID($gammeID) {
        if ($gammeID > 0) {
            $this->gammeID = $gammeID;
        }
    }
    public function setPrix($prix) {
        if ($prix > 0) {
            $this->prix = $prix;
        }
    }
    /////*** Getter ***/////
    public function getPrixID() {
        return $this->prixID;
    }
    public function getCatID() {
        return $this->catID;
    }
    public function getGammeID() {
        return $this->gammeID;
    }
    public function getPrix() {
        return $this->prix;
    }
}
