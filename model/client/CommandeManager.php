<?php
namespace model\client;
use PDO;

class CommandeManager {
    
    /////*** Create ***/////
    public function createCommande(Commande $commande) {
        $cnx = $this->connexion();
        $sql = 'INSERT INTO commande (date, ht, adresseID) VALUES (:date, :ht, :adresseID)';
        $req = $cnx->prepare($sql);
        $req->bindValue(':date', $commande->getDate(), PDO::PARAM_STR);
        $req->bindValue(':ht', $commande->getHt(), PDO::PARAM_STR);
        $req->bindValue(':adresseID', $commande->getAdresseId(), PDO::PARAM_INT);
        
        $req->execute();
    }
    
    /////*** Read ***/////
    public function readCommande($adresseID, $date) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM commande WHERE adresseID = :adresseID AND date = :date';
        $req = $cnx->prepare($sql);
        $req->bindValue(':adresseID', $adresseID, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        $commande = new Commande ();
        $commande->setCdeId($donnees['cdeID']);
        $commande->setDate($donnees['date']);
        $commande->setHt($donnees['ht']);
        $commande->setAdresseId($donnees['adresseID']);
        
        return $commande;
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
        return $cnx;
    }
    
}
