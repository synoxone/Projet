<?php
namespace classe;

class Message {
    
    public function msgAjoutPanierOk() {
        $msg = 'L\'article a bien été ajouté à votre panier';
        return $msg;
    }
    
    public function msgConnexionErreur() {
        $msg = 'Votre email ou votre mot de passe est incorrect';
        return $msg;
    }
    
    public function msgEmailErreur() {
        $msg = 'Adresse e-mail invalide';
        return $msg;
    }
    
    public function msgEmailExiste() {
        $msg = 'Cet email existe déjà';
        return $msg;
    }
    
    public function msgInscriptionOk() {
        $msg = 'Félicitation! Votre compte à bien été créé';
        return $msg;
    }
    
    public function msgModificationOk() {
        $msg = 'Votre modification a bien été enregistrée';
        return $msg;
    }
    
    public function msgModificationErreur() {
        $msg = 'Modification impossible, veuillez réessayer';
        return $msg;
    }
    
    public function msgPaysErreur() {
        $msg = 'Veuillez renseigner un pays existant';
        return $msg;
    }
    
    public function msgPasswordErreur() {
        $msg = 'Le mot de passe doit faire au moins 8 caractères';
        return $msg;
    }
    
    public function msgNumeroErreur() {
        $msg = 'Le numéro de carte doit comporter 16 chiffres';
        return $msg;
    }
    
     public function msgCryptoErreur() {
        $msg = 'Le cryptogramme doit comporter 3 chiffres';
        return $msg;
    }
    
}
