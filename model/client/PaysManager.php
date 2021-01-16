<?php
namespace model\client;
use PDO;

class PaysManager {
    
   /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
        return $cnx;
    }
    
    /////*** Vérification du pays ***/////
    public function verifPays($pays) {
        $cnx = $this->connexion();
        $sql = 'SELECT paysID FROM pays WHERE pays = :pays';
        $req = $cnx->prepare($sql);
        $req->bindValue(':pays', $pays, PDO::PARAM_STR);
        $req->execute();
        
        $verif = $req->rowCount();
        if($verif > 0) {
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
            $pays = new Pays ();
            $pays->setPaysId($donnees['paysID']);
        
            return $pays;
        } else {
            return false;
        }
    }
    
}
