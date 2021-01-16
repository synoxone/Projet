<?php
namespace controller\client;
use classe;
use model\client as mc;

class EspaceClient {
    
    public function voirAdresse() {
        $manager  = new mc\AdresseManager();
        $adresses = $manager->readAllAdresseClient($_SESSION['id']);
        
        $view = new classe\View('client', 'adresse', 'Mes adresses', 'je suis la desc d\'adresse', 'clé1, clé2');
        $view->afficherVueClient(['adresses' => $adresses]);
    }
    
    public function voirAjoutAdresse() {
        $manageradresse   = new mc\AdresseManager();
        $managerpays      = new mc\PaysManager();
        $message          = new classe\Message();
        $erreur           = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            
            $monpays = $managerpays->verifPays($pays);
            
            if(!$monpays) {
                $erreur = $message->msgPaysErreur();
            }
            if(!$erreur) {
                $paysID = $monpays->getPaysId();
            
                $monadresse = new mc\Adresse();
                $monadresse->setTitre($titre);
                $monadresse->setNom($nom);
                $monadresse->setPrenom($prenom);
                $monadresse->setAdresse($adresse);
                $monadresse->setSuite($suite);
                $monadresse->setCp($cp);
                $monadresse->setVille($ville);
                $monadresse->setPaysId($paysID);
                $monadresse->setTel($tel);
                $monadresse->setClientId($_SESSION['id']);
                $manageradresse->createAdresse($monadresse);
                
                if(isset($_SESSION['panier'])) {
                    header('location: livraison.html');
                } else {
                    header('location: adresse.html');
                }  
            }
            
        }
        $view = new classe\View('client', 'adresse_ajout', 'Ajoutez une adresse', 'je suis la desc d\'ajoutez une adresse', 'clé1, clé2');
        $view->afficherVueClient(['erreur' => $erreur]);
    }
    
    public function voirDeconnexion() {
        $view = new classe\View('client', 'deconnexion', 'Deconnexion', 'je suis la desc de deconnexion', 'clé1, clé2');
        $view->afficherVueSite();
    }
    
    public function voirEspaceClient() {
        $manager = new mc\ClientManager();
        $client  = $manager->readClient($_SESSION['id']);
        
        $view = new classe\View('client', 'espace_client', 'Espace client', 'je suis la desc de l\'espace client', 'clé1, clé2');
        $view->afficherVueClient(['client' => $client]);
    }
    
    public function voirIdentifiant() {
        $message    = new classe\Message();
        $manager    = new mc\ClientManager();
        $client     = $manager->readClient($_SESSION['id']);
        $erreur     = '';
        $validation = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            
            if($password != $client->getPassword()) {
                $erreur = $message->msgModificationErreur();
            }
            elseif(strlen($nouveaupassword) < 8) {
                $erreur = $message->msgPasswordErreur();
            }
            
            if(!$erreur) {
                $client->setPassword($nouveaupassword);
                $manager->updateClient($client);
                
                $validation = $message->msgModificationOk();
            }
        }
        $view = new classe\View('client', 'identifiant', 'Mon mot de passe', 'je suis la desc de mon mot de passe', 'clé1, clé2');
        $view->afficherVueClient(['validation' => $validation, 'erreur' => $erreur, 'client' => $client]);
    }
    
    public function voirInformation() {
        $message    = new classe\Message();
        $manager    = new mc\ClientManager();
        $client     = $manager->readClient($_SESSION['id']);
        $erreur     = '';
        $validation = '';
        
        if(!empty($_POST)) {
            extract($_POST);
            
            if($client->getEmail() != $email) {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erreur = $message->msgEmailErreur();
                }
                elseif($manager->verifEmail($email)) {
                    $erreur = $message->msgEmailExiste();
                }
            }
            
            if(!$erreur) {
                $client->setTitre($titre);
                $client->setNom($nom);
                $client->setPrenom($prenom);
                $client->setEmail($email);
                $manager->updateClient($client);
                
                $validation = $message->msgModificationOk();
            }
        }
        $view = new classe\View('client', 'information', 'Mes informations', 'je suis la desc d\'information', 'clé1, clé2');
        $view->afficherVueClient(['validation' => $validation, 'erreur' => $erreur, 'client' => $client]);
    }
    
    public function voirModifAdresse() {
        $manageradresse   = new mc\AdresseManager();
        $managerpays      = new mc\PaysManager();
        $message          = new classe\Message();
        $erreur           = '';
        $validation       = '';
        
        if(isset($_POST['valider'])) {
            extract($_POST);
            
            $monpays = $managerpays->verifPays($pays);
            
            if(!$monpays) {
                $erreur = $message->msgPaysErreur();
            }
            if(!$erreur) {
                $paysID = $monpays->getPaysId();
            
                $monadresse = new mc\Adresse();
                $monadresse->setAdresseId($adresseID);
                $monadresse->setTitre($titre);
                $monadresse->setNom($nom);
                $monadresse->setPrenom($prenom);
                $monadresse->setAdresse($adresse);
                $monadresse->setSuite($suite);
                $monadresse->setCp($cp);
                $monadresse->setVille($ville);
                $monadresse->setPaysId($paysID);
                $monadresse->setTel($tel);
                $monadresse->setClientId($_SESSION['id']);
                $manageradresse->updateAdresse($monadresse);

                $validation = $message->msgModificationOk();  
            }
            
        }
        $monadresse = $manageradresse->readAdresse($_POST['adresseID']);
        
        $view = new classe\View('client', 'adresse_modif', 'Modifier une adresse', 'je suis la desc de modifier une adresse', 'clé1, clé2');
        $view->afficherVueClient(['monadresse' => $monadresse, 'erreur' => $erreur, 'validation' => $validation]);
    }
  
    public function voirSuppAdresse() {
        $manager = new mc\AdresseManager();
        $adresse = $manager->readAdresse($_POST['adresseID']);
        
        if(!empty($_POST)) {
            extract($_POST);
            
            if(isset($non)) {
                header('location: adresse.html');
            }
            if(isset($oui)) {
                $manager->deleteAdresse($adresseID);
                header('location: adresse.html');
            }
        }
        $view = new classe\View('client', 'adresse_supp', 'Supprimer une adresse', 'je suis la desc de supprimer une adresse', 'clé1, clé2');
        $view->afficherVueClient(['adresse' => $adresse]);
    }
    
}
