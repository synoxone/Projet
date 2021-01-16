<?php
namespace model\site;

class Stock extends Taille {
    private $stockID;
    private $artID;
    private $tailleID;
    private $stock;
    
    /////*** Setter ***/////
    public function setStockID($stockID) {
        if ($stockID > 0) {
            $this->stockID = $stockID;
        }
    }
    public function setArtID($artID) {
        if ($artID > 0) {
            $this->artID = $artID;
        }
    }
    public function setTailleID($tailleID) {
        if ($tailleID > 0) {
            $this->tailleID = $tailleID;
        }
    }
    public function setStock($stock) {
        if ($stock > 0) {
            $this->stock = $stock;
        }
    }
    /////*** Getter ***/////
    public function getStockID() {
        return $this->stockID;
    }
    public function getArtID() {
        return $this->artID;
    }
    public function getTailleID() {
        return $this->tailleID;
    }
    public function getStock() {
        return $this->stock;
    }
}
