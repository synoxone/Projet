<?php
namespace model\client;
use PDO;

class AdresseManager {
    
    /////*** Create ***/////
    public function createAdresse(Adresse $adresse) {
        $cnx = $this->connexion();
        $sql = 'INSERT INTO adresse (titre, nom, prenom, adresse, suite, cp, ville, paysID, tel, clientID) VALUES (:titre, :nom, :prenom, :adresse, :suite, :cp, :ville, :paysID, :tel, :clientID)';
        $req = $cnx->prepare($sql);
        $req->bindValue(':titre', $adresse->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':nom', $adresse->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $adresse->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresse->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(':suite', $adresse->getSuite(), PDO::PARAM_STR);
        $req->bindValue(':cp', $adresse->getCp(), PDO::PARAM_STR);
        $req->bindValue(':ville', $adresse->getVille(), PDO::PARAM_STR);
        $req->bindValue(':paysID', $adresse->getPaysId(), PDO::PARAM_INT);
        $req->bindValue(':tel', $adresse->getTel(), PDO::PARAM_STR);
        $req->bindValue(':clientID', $adresse->getClientId(), PDO::PARAM_INT);
        
        $req->execute();
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
        return $cnx;
    }
    
    /////*** Delete ***/////
    public function deleteAdresse($adresseID) {
        $cnx = $this->connexion();
        $sql = 'DELETE FROM adresse WHERE adresseID = :adresseID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':adresseID', $adresseID, PDO::PARAM_INT);
        $req->execute();
    }
    
    /////*** Read ***/////
    public function readAdresse($adresseID) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM adresse a JOIN pays p WHERE a.paysID = p.paysID AND adresseID = :adresseID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':adresseID', $adresseID, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        $adresse = new Adresse ();
        $adresse->setAdresseId($donnees['adresseID']);
        $adresse->setTitre($donnees['titre']);
        $adresse->setNom($donnees['nom']);
        $adresse->setPrenom($donnees['prenom']);
        $adresse->setAdresse($donnees['adresse']);
        $adresse->setSuite($donnees['suite']);
        $adresse->setCp($donnees['cp']);
        $adresse->setVille($donnees['ville']);
        $adresse->setPaysId($donnees['paysID']);
        $adresse->setPays($donnees['pays']);
        $adresse->setTel($donnees['tel']);
        $adresse->setClientId($donnees['clientID']);
        
        return $adresse;
    }
    
    public function readAllAdresseClient($clientID) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM adresse a JOIN pays p ON a.paysID = p.paysID AND clientID = :clientID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':clientID', $clientID, PDO::PARAM_INT);
        $req->execute();
        
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $adresse = new Adresse();
            $adresse->setAdresseID($donnees['adresseID']);
            $adresse->setNom($donnees['nom']);
            $adresse->setPrenom($donnees['prenom']);
            $adresse->setAdresse($donnees['adresse']);
            $adresse->setSuite($donnees['suite']);
            $adresse->setCp($donnees['cp']);
            $adresse->setVille($donnees['ville']);
            $adresse->setPays($donnees['pays']);
            $adresses[] = $adresse;
        }
        if(!empty($adresses)) {
            return $adresses;
        }
    }
    
    /////*** Update ***/////
    public function updateAdresse(Adresse $adresse) {
        $cnx = $this->connexion();
        $sql = "UPDATE adresse SET titre = :titre, nom = :nom, prenom = :prenom, adresse = :adresse, suite = :suite, cp = :cp, ville = :ville, paysID = :paysID, tel = :tel, clientID = :clientID WHERE adresseID = :adresseID";
        $req = $cnx->prepare($sql);
        $req->bindValue(":adresseID", $adresse->getAdresseID(), PDO::PARAM_INT);
        $req->bindValue(":titre", $adresse->getTitre(), PDO::PARAM_STR);
        $req->bindValue(":nom", $adresse->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom", $adresse->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":adresse", $adresse->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(":suite", $adresse->getSuite(), PDO::PARAM_STR);
        $req->bindValue(":cp", $adresse->getCp(), PDO::PARAM_STR);
        $req->bindValue(":ville", $adresse->getVille(), PDO::PARAM_STR);
        $req->bindValue(":paysID", $adresse->getPaysID(), PDO::PARAM_INT);
        $req->bindValue(":tel", $adresse->getTel(), PDO::PARAM_STR);
        $req->bindValue(":clientID", $adresse->getClientID(), PDO::PARAM_INT);
        
        $req->execute();  
    }
}
