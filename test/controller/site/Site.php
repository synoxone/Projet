<?php
namespace controller\site;
use classe;
use model\client as mc;
use model\site   as ms;

class Site {
    
    public function voirAccueil() {
        
        $view = new classe\View('site', 'accueil', 'Marque | Magasin de streetwear en ligne', 'je suis la desc de l accueil', 'clé1, clé2');
        $view->afficherVueSite();
    }
    
    public function voirIdentification() {
        
        $message    = new classe\Message();
        $manager    = new mc\ClientManager();
        $erreur     = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            
            $client = $manager->verifCompte($email, $password);
            
            if($client) {
                $_SESSION['id'] = $client->getClientId();
            } else {
                $erreur = $message->msgConnexionErreur();
            }
        }
        $view = new classe\View('site', 'identification', 'Identification', 'je suis la desc d\'identification', 'clé1, clé2');
        $view->afficherVueSite(['erreur' => $erreur]);
    }
    
    public function voirInscription() {
        $message    = new classe\Message();
        $manager    = new mc\ClientManager();
        $erreurs    = [];
        $validation = '';
        $action     = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs['email'] = $message->msgEmailErreur();
            }
            elseif($manager->verifEmail($email)) {
                $erreurs['email'] = $message->msgEmailExiste();
            }
            
            if(strlen($password) < 8) {
                $erreurs['password'] = $message->msgPasswordErreur();
            }
            
            if(!$erreurs) {
                $client  = new mc\Client();
                $client->setTitre($titre);
                $client->setNom($nom);
                $client->setPrenom($prenom);
                $client->setEmail($email);
                $client->setPassword($password);;
                $manager->createClient($client);
                
                $validation = $message->msgInscriptionOk();
                unset($_POST);
            }
        }
        $view = new classe\View('site', 'inscription', 'Inscrpition', 'je suis la desc d\'inscription', 'clé1, clé2');
        $view->afficherVueSite(['validation' => $validation, 'erreurs' => $erreurs]);
    }
    
    public function voirArticle() {
        $managerarticle  = new ms\ArticleManager();
        $article         = $managerarticle->readArticle($_GET['id']);
        $managerstock    = new ms\StockManager();
        $tailles         = $managerstock->readTaille($_GET['id']);
        $message         = new classe\Message();
        $validation      = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            $validation = $message->msgAjoutPanierOk();
            $panier     = new classe\Panier();
            $panier->ajouterArticle($article->getNom(), $taille, 1, $article->getPrix());
        }
        
        $titre = $article->getNom();
        $desc  = $article->getDescription();
        $key   = $article->getKeywords();
        $view  = new classe\View('site', 'article', "$titre", "$desc", "$key");
        $view->afficherVueSite(['article' => $article, 'tailles' => $tailles, 'validation' => $validation]);
    }
    
    public function voirPanier() {
        if(!isset($_SESSION['panier'])) {
            $total   = '';
            $paniers = '';
        } else {
            $panier  = new classe\Panier();
            $total   = $panier->totalPanier();
            $paniers = $panier->readPanier();
        }
        
        $view = new classe\View('site', 'panier', 'Panier', 'je suis la desc du panier', 'clé1, clé2');
        $view->afficherVueSite(['total' => $total, 'paniers' => $paniers]);
    }
    
    public function voirSoustraireArticle() {
        $panier   = new classe\Panier();
        $qt       = 1;
        $position = $_GET['id'];
        
        if($_SESSION['panier']['qt'][$position] == 1) {
            header('location: article-supp_'.$position.'.html');
        } else {
            $panier->soustraireArticle($position, $qt);
            $view = new classe\View('site', 'article_moins', 'Soustraire un article', 'je suis la desc de soustraire article', 'clé1, clé2');
            $view->afficherVueSite();;
        } 
    }
    
    public function voirAdditionnerArticle() {
        $panier   = new classe\Panier();
        $qt       = 1;
        $position = $_GET['id'];
        
        /*if($_SESSION['panier']['qt'][$position] == 1) {
            header('location: article-supprimer_'.$position.'.html');
        } else {*/
            $panier->additionnerArticle($position, $qt);
            $view = new classe\View('site', 'article_plus', 'Additionner un article', 'je suis la desc d\'additionner article', 'clé1, clé2');
            $view->afficherVueSite();;
        //} 
    }
    
    public function voirSupprimerArticle() {
        $panier = new classe\Panier();
        $panier = $panier->readPosition($_GET['id']);
        
        if(!empty($_POST)) {
            extract($_POST);
            
            if(isset($non)) {
                header('location: panier.html');
            }
            if(isset($oui)) {
                $panier->supprimerArticle($panier->getPosition());
                header('location: panier.html');
            }
        }
        
        $view = new classe\View('site', 'article_supp', 'Supprimer un article', 'je suis la desc de supprimer un article', 'clé1, clé2');
        $view->afficherVueSite(['panier' => $panier]);
    }
    
    public function voirLivraison() {
        $manager  = new mc\AdresseManager();
        
        if(isset($_SESSION['id'])) {
            $adresses = $manager->readAllAdresseClient($_SESSION['id']);
        } else {
            $adresses = '';
        }
        
        $view = new classe\View('site', 'livraison', 'Adresse de livraison', 'je suis la desc de livraison', 'clé1, clé2');
        $view->afficherVueSite(['adresses' => $adresses]);
    }
    
    public function voirPaiement() {
        $message = new classe\Message();
        $manager = new mc\AdresseManager();
        $adresse = $manager->readAdresse($_POST['adresseID']);
        $erreurs = [];
        
        if(!isset($_SESSION['panier'])) {
            $total   = '';
            $paniers = '';
        } else {
            $panier  = new classe\Panier();
            $total   = $panier->totalPanier();
            $paniers = $panier->readPanier();
        }
        
        if(isset($_POST['valider'])) {
            extract($_POST);
            
            if( (!is_numeric($numero)) || (strlen($numero) !== 16) ) {
                $erreurs['numero'] = $message->msgNumeroErreur();
            }
            if( (!is_numeric($crypto)) || (strlen($crypto) !== 3) ) {
                $erreurs['crypto'] = $message->msgCryptoErreur();
            }
            if(!$erreurs) {
                $date = date('Y-m-d H:i:s');
                $commandemanager = new mc\CommandeManager();
                
                $commande = new mc\Commande();
                $commande->setDate($date);
                $commande->setHt($total);
                $commande->setAdresseId($_POST['adresseID']);
                
                $commandemanager->createCommande($commande);
                $commande = $commandemanager->readCommande($_POST['adresseID'], $date);
                
                $cdeartmanager = new mc\CdeartManager();
                
                foreach($paniers as $panier) {
                    
                    $cdeart = new mc\Cdeart();
                    $cdeart->setCdeId($commande->getCdeId());
                    $cdeart->setNom($panier->getArticle());
                    $cdeart->setTaille($panier->getTaille());
                    $cdeart->setQt($panier->getQt());
                    
                    $cdeartmanager->createCdeart($cdeart);
                }
                
                header('location: commande.html');
            }
        }
        
        $view = new classe\View('site', 'paiement', 'Paiement', 'je suis la desc de Paiement', 'clé1, clé2');
        $view->afficherVueSite(['total' => $total, 'paniers' => $paniers, 'erreurs' => $erreurs, 'adresse' => $adresse, 'commande' => $commande]);
    }
    
    public function voirCommande() {
        $view = new classe\View('site', 'commande', 'Commande validée', 'je suis la desc de commande', 'clé1, clé2');
        $view->afficherVueSite();
    }
    
}
