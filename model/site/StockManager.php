<?php
namespace model\site;
use PDO;

class StockManager {
    
    /////*** Read ***/////
    public function readTaille($artID) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM stock s JOIN taille t WHERE s.tailleID = t.tailleID AND s.artID = :artID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':artID', $artID, PDO::PARAM_INT);
        $req->execute();
        
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $taille = new Stock();
            $taille->setTaille($donnees['taille']);
            $tailles[] = $taille;
        }
        if(!empty($tailles)) {
            return $tailles;
        }
    }
    
    public function readStock($artID, $taille) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM stock s JOIN taille t WHERE s.tailleID = t.tailleID AND s.artID = :artID AND t.taille = :taille';
        $req = $cnx->prepare($sql);
        $req->bindValue(':artID', $artID, PDO::PARAM_INT);
        $req->bindValue(':taille', $taille, PDO::PARAM_STR);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        $stock = new Stock();
        $stock->setStockId($donnees['stockID']);
        $stock->setStock($donnees['stock']);
        
        return $stock;
    }
    
    /////*** Update ***/////
    public function nouveauStock(Stock $stock) {
        
        $cnx = $this->connexion();
        $sql = "UPDATE stock SET stock = :stock WHERE stockID = :stockID";
        $req = $cnx->prepare($sql);
        $req->bindValue(":stockID", $stock->getStockId(), PDO::PARAM_INT);
        $req->bindValue(":stock", $stock->getStock(), PDO::PARAM_INT);
        $req->execute();
        
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
        return $cnx;
    }
}
