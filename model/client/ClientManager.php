<?php
namespace model\client;
use PDO;

class ClientManager {
    
    /////*** Create ***/////
    public function createClient(Client $client) {
        $cnx = $this->connexion();
        $sql = 'INSERT INTO client (titre, nom, prenom, email, password) VALUES (:titre, :nom, :prenom, :email, :password)';
        $req = $cnx->prepare($sql);
        $req->bindValue(':titre', $client->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':password', $client->getPassword(), PDO::PARAM_STR);
        
        $req->execute();
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
        return $cnx;
    }
    
    /////*** Read ***/////
    public function readClient($clientID) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM client WHERE clientID = :clientID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':clientID', $clientID, PDO::PARAM_INT);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
        $client = new Client();
        $client->setClientId($donnees['clientID']);
        $client->setTitre($donnees['titre']);
        $client->setNom($donnees['nom']);
        $client->setPrenom($donnees['prenom']);
        $client->setEmail($donnees['email']);
        $client->setPassword($donnees['password']);
        
        return $client;
    }
    
    /////*** Update ***/////
    public function updateClient(Client $client) {
        $cnx = $this->connexion();
        $sql = 'UPDATE client SET titre = :titre, nom = :nom, prenom = :prenom, email = :email, password = :password WHERE clientID = :clientID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':clientID', $client->getClientId(), PDO::PARAM_INT);
        $req->bindValue(':titre', $client->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $client->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':password', $client->getPassword(), PDO::PARAM_STR);
        
        $req->execute();
    }
    
    /////*** Vérification du couple email/password ***/////
    public function verifCompte($email, $password) {
        $cnx = $this->connexion();
        $sql = 'SELECT clientID FROM client WHERE email = :email AND password = :password';
        $req = $cnx->prepare($sql);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
        
        $count = $req->rowCount();
        if($count > 0) {
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
        
            $client = new Client ();
            $client->setClientId($donnees['clientID']);
        
            return $client;
        } else {
            return false;
        }
    }
    
    /////*** on vérifie que l'email n'est pas déjà présent dans la table ***/////
    public function verifEmail($email) {
        $cnx = $this->connexion();
        $sql = 'SELECT clientID FROM client WHERE email = :email';
        $req = $cnx->prepare($sql);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        
        $count = $req->rowCount();
        
        if($count > 0 ) {
            return true;
        } else {
            return false;
        }
    }
    
}
