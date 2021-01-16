<?php
namespace classe;

class Panier {
    private $articleID;
    private $article;
    private $taille;
    private $qt;
    private $prix;
    private $position;
    
    public function readPanier() {
        for($i = 0; $i < count($_SESSION['panier']['articleID']); $i++) {
            $panier = new Panier();
            $panier->setArticleId($_SESSION['panier']['articleID'][$i]);
            $panier->setArticle($_SESSION['panier']['article'][$i]);
            $panier->setTaille($_SESSION['panier']['taille'][$i]);
            $panier->setQt($_SESSION['panier']['qt'][$i]);
            $panier->setPrix($_SESSION['panier']['prix'][$i]);
            $panier->setPosition($i);
            
            $paniers [] = $panier;
        }
        if(!empty($paniers)) {
            return $paniers;
        }
    }
    
    public function readPosition($position) {
        $panier = new Panier();
        $panier->setArticleId($_SESSION['panier']['articleID'][$position]);
        $panier->setArticle($_SESSION['panier']['article'][$position]);
        $panier->setTaille($_SESSION['panier']['taille'][$position]);
        $panier->setQt($_SESSION['panier']['qt'][$position]);
        $panier->setPrix($_SESSION['panier']['prix'][$position]);
        $panier->setPosition($position);
        
        return $panier;
    }
	
	public function __construct() {
        /////*** Création du panier ***/////
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']              = array();
            $_SESSION['panier']['articleID'] = array();
            $_SESSION['panier']['article']   = array();
            $_SESSION['panier']['taille']    = array();
            $_SESSION['panier']['qt']        = array();
            $_SESSION['panier']['prix']      = array();
            $_SESSION['panier']['verrou']    = "off";
        } 
	}
    
    public function ajouterArticle($articleID, $article, $taille, $qt, $prix) {
        if(isset($_SESSION['panier'])) {
            $positionId     = array_flip(array_keys($_SESSION['panier']['articleID'], $articleID));
            $positionTaille = array_flip(array_keys($_SESSION['panier']['taille'], $taille));
            $tableau        = array_intersect_key($positionTaille, $positionId);
            $position       = key($tableau);
            
            if($position !== null) {
            /////*** Si l'article et la taille existe déjà ***/////
                $_SESSION['panier']['qt'][$position] += $qt;
            } else {
            $_SESSION['panier']['articleID'][] = $articleID;
            $_SESSION['panier']['article'][]   = $article;
            $_SESSION['panier']['taille'][]    = $taille;
            $_SESSION['panier']['qt'][]        = $qt;
            $_SESSION['panier']['prix'][]      = $prix;
            }
        } else {
            echo 'Un problème est survenu veuillez contacter l\'administrateur du site.';
        }
    }
    
    public function totalPanier() {
        $total = 0;
        for($i = 0; $i < count($_SESSION['panier']['articleID']); $i++) {
            $total += $_SESSION['panier']['qt'][$i] * $_SESSION['panier']['prix'][$i];
        }
        return $total;
    }
    
    public function soustraireArticle ($position, $qt) {
        if(isset($_SESSION['panier'])) {
            $_SESSION['panier']['qt'][$position] -= $qt;
        }
    }
    
    public function additionnerArticle ($position, $qt) {
        if(isset($_SESSION['panier'])) {
            $_SESSION['panier']['qt'][$position] += $qt;
        }
    }
    
    public function supprimerArticle($position) {
        
        if(isset($_SESSION['panier'])) {
            unset($_SESSION['panier']['articleID'][$position]);
            unset($_SESSION['panier']['article'][$position]);
            unset($_SESSION['panier']['taille'][$position]);
            unset($_SESSION['panier']['qt'][$position]);
            unset($_SESSION['panier']['prix'][$position]);
            /////*** Trier le tableau ***/////
            sort($_SESSION['panier']['articleID']);
            sort($_SESSION['panier']['article']);
            sort($_SESSION['panier']['taille']);
            sort($_SESSION['panier']['qt']);
            sort($_SESSION['panier']['prix']);
        }
    }
    
    public function verrouOn() {
        $_SESSION["panier"]["verrou"] = "on";
    }
    
    /////*** Setter ***/////
    public function setArticleId($articleID) {
        if ($articleID > 0) {
            $this->articleID = $articleID;
        }
    }
    
    public function setArticle($article) {
        if (is_string($article)) {
            $this->article = $article;
        }
    }
    
    public function setTaille($taille) {
        if (is_string($taille)) {
            $this->taille = $taille;
        }
    }
    
    public function setQt($qt) {
        if ($qt > 0) {
            $this->qt = $qt;
        }
    }
    
    public function setPrix($prix) {
        if ($prix > 0) {
            $this->prix = $prix;
        }
    }
    
    public function setPosition($position) {
        if ($position >= 0) {
            $this->position = $position;
        }
    }
    
    /////*** Getter ***/////
    public function getArticleId() {
        return $this->articleID;
    }
    
    public function getArticle() {
        return $this->article;
    }
    
    public function getTaille() {
        return $this->taille;
    }
    
    public function getQt() {
      return $this->qt;
    }
    
    public function getPrix() {
        return $this->prix;
    }
    
    public function getPosition() {
        return $this->position;
    }
        
}
