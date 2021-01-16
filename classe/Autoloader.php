<?php
class Autoloader {
    
    public static function autoload($class) {
        /////*** Autoloader ***/////
        spl_autoload_register(function($class) {
            $chemin = str_replace('\\', '/', $class);
            require_once($chemin.'.php');
        });
        
        /////*** Déclaration des paramètres de la classe Rooter ***/////
        if(isset($_GET['page'])) {
            switch($_GET['page']) {
                case 'accueil':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirAccueil';
                    break;
                case 'identification':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirIdentification';
                    break;
                case 'inscription':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirInscription';
                    break;
                case 'espace-client':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirEspaceClient';
                    break;
                case 'information':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirInformation';
                    break;
                case 'identifiant':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirIdentifiant';
                    break;
                case 'adresse':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirAdresse';
                    break;
                case 'ajouter-adresse':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirAjoutAdresse';
                    break;
                case 'modifier-adresse':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirModifAdresse';
                    break;
                case 'supprimer-adresse':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirSuppAdresse';
                    break;
                case 'deconnexion':
                    $namespace = 'controller\client\EspaceClient';
                    $methode = 'voirDeconnexion';
                    break;
                case 'article':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirArticle';
                    break;
                case 'panier':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirPanier';
                    break;
                case 'article-moins':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirSoustraireArticle';
                    break;
                case 'article-plus':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirAdditionnerArticle';
                    break;
                case 'article-supp':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirSupprimerArticle';
                    break;
                case 'livraison':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirLivraison';
                    break;
                case 'paiement':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirPaiement';
                    break;
                case 'commande':
                    $namespace = 'controller\site\Accueil';
                    $methode = 'voirCommande';
                    break;
            }
            
            /////*** Instanciation de la classe Rooter ***/////
            $rooter = new classe\Rooter($namespace, $methode);  
        } else {
            $rooter = new classe\Rooter('controller\site\Accueil','voirAccueil');
        }
        $rooter->chooseController(); 
    }
}
