<?php
namespace model\site;
use PDO;

class ArticleManager {
    
    /////*** Read ***/////
    public function readArticle($artID) {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM article as a JOIN prix as p WHERE a.catID = p.catID AND a.gammeID = p.gammeID AND artID = :artID';
        $req = $cnx->prepare($sql);
        $req->bindValue(':artID', $artID, PDO::PARAM_INT);
        $req->execute();
        
        $count = $req->rowCount();
        if($count > 0) {
        
            $donnees = $req->fetch(PDO::FETCH_ASSOC);

            $article = new Article();
            $article->setArtId($donnees['artID']);
            $article->setNom($donnees['nom']);
            $article->setDescription($donnees['description']);
            $article->setKeywords($donnees['keywords']);
            $article->setPrix($donnees['prix']);
        
            return $article;
        } else {
            return false;
        }
    }
    
    public function readAllArticle() {
        $cnx = $this->connexion();
        $sql = 'SELECT * FROM article as a JOIN prix as p WHERE a.catID = p.catID AND a.gammeID = p.gammeID';
        $req = $cnx->prepare($sql);
        $req->execute();
        
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setArtID($donnees['artID']);
            $article->setNom($donnees['nom']);
            $article->setDescription($donnees['description']);
            $article->setKeywords($donnees['keywords']);
            $article->setPrix($donnees['prix']);
            $articles[] = $article;
        }
        if(!empty($articles)) {
            return $articles;
        }
    }
    
    /////*** Connexion à la BDD ***/////
    private function connexion() {
        $cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
        return $cnx;
    }
}
