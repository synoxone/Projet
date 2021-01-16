<?php
namespace model\client;

class Client {
    
    private $clientID;
    private $titre;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    
    /////*** Setter ***/////
    public function setClientId($clientID) {
        if ($clientID > 0) {
            $this->clientID = $clientID;
        }
    }
     public function setTitre($titre) {
        if (is_string($titre)) {
            $this->titre = $titre;
        }
    }
    public function setNom($nom) {
        if (!is_numeric($nom)) {
            $this->nom = $nom;
        }
    }
    public function setPrenom($prenom) {
        if (!is_numeric($prenom)) {
            $this->prenom = $prenom;
        }
    }
    public function setEmail($email) {
        if (is_string($email)) {
            $this->email = $email;
        }
    }
    public function setPassword($password) {
        if ($password > 0) {
            $this->password = $password;
        }
    }
    
    /////*** Getter ***/////
    public function getClientId() {
        return $this->clientID;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    
}
