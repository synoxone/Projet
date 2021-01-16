<?php
namespace model\site;

class Article extends Prix {
    
    private $artID;
    private $nom;
    private $description;
    private $keywords;
    
    /////*** Setter ***/////
    public function setArtId($artID) {
        if ($artID > 0) {
            $this->artID = $artID;
        }
    }
    public function setNom($nom) {
        if (is_string($nom)) {
            $this->nom = $nom;
        }
    }
    public function setDescription($description) {
        if (is_string($description)) {
            $this->description = $description;
        }
    }
    public function setKeywords($keywords) {
        if (is_string($keywords)) {
            $this->keywords = $keywords;
        }
    }
    /////*** Getter ***/////
    public function getArtId() {
        return $this->artID;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getKeywords() {
        return $this->keywords;
    }
}
