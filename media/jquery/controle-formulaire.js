$(document).ready(function () {
  $('#soumission').click(function() {
      var retour = true;
      
      if($('#nom').val() == '') {
        $('#nom').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires'); 
        retour = false;
      } else {
        $('#nom').css('border-color', '');  
      }
      
      if($('#prenom').val() == '') {
        $('#prenom').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#prenom').css('border-color', ''); 
      }
      
      if($('#adresse').val() == '') {
        $('#adresse').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');
        retour = false;
      } else {
        $('#adresse').css('border-color', '');  
      }
      
      if($('#cp').val() == '') {
        $('#cp').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#cp').css('border-color', ''); 
      }
      
      if($('#ville').val() == '') {
        $('#ville').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#ville').css('border-color', '');  
      }
      
      if($('#pays').val() == '') {
        $('#pays').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#pays').css('border-color', '');  
      }
      
      if($('#tel').val() == '') {
        $('#tel').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#tel').css('border-color', '');  
      }
      
      if($('#email').val() == '') {
        $('#email').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#email').css('border-color', '');  
      }
      
      if($('#password').val() == '') {
        $('#password').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires'); 
        retour = false;
      } else {
        $('#password').css('border-color', '')  
      }
      
      if($('#nouveaupassword').val() == '') {
        $('#nouveaupassword').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires'); 
        retour = false;
      } else {
        $('#nouveaupassword').css('border-color', '');  
      }
      
      if($('#confirmerpassword').val() == '') {
        $('#confirmerpassword').css('border-color', 'red');
        $('#erreur').html('veuillez remplir les champs obligatoires');  
        retour = false;
      } else {
        if($('#confirmerpassword').val() == $('#nouveaupassword').val()) {
            $('#nouveaupassword').css('border-color', '');  
            $('#confirmerpassword').css('border-color', ''); 
        } else {
            $('#confirmerpassword').css('border-color', 'red'); 
            $('#erreur').html('veuillez confirmer le nouveau mot de passe');  
            retour = false;
        }
      }
      
      if($('#taille').val() == '') { 
        $('#taille').css('border-color', 'red'); 
        $('#erreur').html('veuillez sélectionner une taille'); 
        retour = false;
      } else {
        $('#taille').css('border-color', ''); 
      }
      
      if($('#numero').val() == '') {
        $('#numero').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#numero').css('border-color', '');  
      }
      
      if($('#date').val() == '') {
        $('#date').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires');  
        retour = false;
      } else {
        $('#date').css('border-color', '');  
      }
      
      if($('#crypto').val() == '') {
        $('#crypto').css('border-color', 'red');
        $('#erreur').html('veuillez remplir tous les champs obligatoires'); 
        retour = false;
      } else {
        $('#crypto').css('border-color', '');  
      }
      
      return retour;
  });  
});