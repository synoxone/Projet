<?php
namespace model\client;
use PDO;

class CdeartManager {
    
    /////*** Create ***/////
    public function createCdeart(Cdeart $cdeart) {
        $cnx = $this->connexion();
        $sql = 'INSERT INTO cdeart (cdeID, nom, taille, qt) VALUES (:cdeID, :nom, :taille, :qt)';
        $req = $cnx->prepare($sql);
        $req->bindValue(':cdeID', $cdeart->getCdeId(), PDO::PARAM_INT);
        $req->bindValue(':nom', $cdeart->getNom(), PDO::PARAM_STR);
        $req->bindValue(':taille', $cdeart->getTaille(), PDO::PARAM_STR);
        $req->bindValue(':qt', $cdeart->getQt(), PDO::PARAM_INT);
        
        $req->execute();
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
        return $cnx;
    }
    
}
