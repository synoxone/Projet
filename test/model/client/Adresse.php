<?php
namespace model\client;

class Adresse extends Pays {
    
    private $adresseID;
    private $titre;
    private $nom;
    private $prenom;
    private $adresse;
    private $suite;
    private $cp;
    private $ville;
    private $paysID;
    private $tel;
    private $clientID;
    
    /////*** Setter ***/////
    public function setAdresseId($adresseID) {
        if ($adresseID > 0) {
            $this->adresseID = $adresseID;
        }
    }
    public function setTitre($titre) {
        if (is_string($titre)) {
            $this->titre = $titre;
        }
    }
    public function setNom($nom) {
        if (is_string($nom)) {
            $this->nom = $nom;
        }
    }
    public function setPrenom($prenom) {
        if (is_string($prenom)) {
            $this->prenom = $prenom;
        }
    }
    public function setAdresse($adresse) {
        if (is_string($adresse)) {
        $this->adresse = $adresse;
        }
    }
    public function setSuite($suite) {
        if (is_string($suite)) {
        $this->suite = $suite;
        }
    }
    public function setCp($cp) {
        if (is_string($cp)) {
        $this->cp = $cp;
        }
    }
    public function setVille($ville) {
        if (is_string($ville)) {
        $this->ville = $ville;
        }
    }
    public function setPaysId($paysID) {
        if ($paysID >0) {
            $this->paysID = $paysID;
        }
    }
    public function setTel($tel) {
        if ($tel > 0) {
        $this->tel = $tel;
        }
    }
    public function setClientId($clientID) {
        if ($clientID > 0) {
            $this->clientID = $clientID;
        }
    }
    
    /////*** Getter ***/////
    public function getAdresseId() {
        return $this->adresseID;
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
    public function getAdresse() {
        return $this->adresse;
    }
    public function getSuite() {
        return $this->suite;
    }
    public function getCp() {
        return $this->cp;
    }
    public function getVille() {
        return $this->ville;
    }
    public function getPaysId() {
        return $this->paysID;
    }
    public function getTel() {
        return $this->tel;
    }
    public function getClientId() {
        return $this->clientID;
    }
    
}
