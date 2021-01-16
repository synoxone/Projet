<?php
namespace classe;

class View {
    private $dossier;
    private $fichier;
    private $titre;
    private $description;
    private $keywords;
    
    public function __construct($dossier, $fichier, $titre, $description, $keywords) {
        $this->dossier     = $dossier;
        $this->fichier     = $fichier;
        $this->titre       = $titre;
        $this->description = $description;
        $this->keywords    = $keywords;
    }
    
    public function afficherVueSite($tableau = array()) {
        
        extract($tableau);
        
        $dossier     = $this->dossier;
        $fichier     = $this->fichier;
        $titre       = $this->titre;
        $description = $this->description;
        $keywords    = $this->keywords;
        
        ob_start();
        include('view/'.$dossier.'/'.$fichier.'.php');
        $contenu = ob_get_clean();
        
        include('view/site/_gabarit_site.php');
    
    }
    
    public function afficherVueClient($tableau = array()) {
        
        extract($tableau);
        
        $dossier     = $this->dossier;
        $fichier     = $this->fichier;
        $titre       = $this->titre;
        $description = $this->description;
        $keywords    = $this->keywords;
        
        ob_start();
        include('view/'.$dossier.'/'.$fichier.'.php');
        $contenu = ob_get_clean();
        
        include('view/client/_gabarit_client.php');
    
    }
}