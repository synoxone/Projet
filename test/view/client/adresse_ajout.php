<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Ajoutez une adresse</h1>
    <p>Ajoutez une nouvelle adresse de livraison:</p>
    <form  method='post' action=''>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Civilité*</p>
        <p><input type='radio' name='titre' value='M' checked><label for='titre1'>M</label>
        <input type='radio' name='titre' value='Mme' <?php if( (isset($_POST['titre'])) && ($_POST['titre'] == 'Mme')) echo 'checked'; ?>><label for='titre2'>Mme</label></p>
        <p>Nom*</p>
        <p><input id='nom' type='text' name='nom' value='<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>'/></p>
        <p>Prénom*</p>
        <p><input id='prenom' type='text' name='prenom' value='<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>'/></p>
        <p>Adresse*</p>
        <p><input id='adresse' type='text' name='adresse' value='<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>'/></p>
        <p>Complément d'adresse</p>
        <p><input type='text' name='suite' value='<?php if(isset($_POST['suite'])) echo $_POST['suite']; ?>'/></p>
        <p>Code postal*</p>
        <p><input id='cp' type='text' name='cp' value='<?php if(isset($_POST['cp'])) echo $_POST['cp']; ?>'/></p>
        <p>Ville*</p>
        <p><input id='ville' type='text' name='ville' value='<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>'/></p>
        <p>Pays*</p>
        <p><input id='pays' type='text' name='pays' value='<?php if(isset($_POST['pays'])) echo $_POST['pays']; ?>'/></p>
        <p>téléphone*</p>
        <p><input id='tel' type='tel' name='tel' value='<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>'/></p>
        <p><input id='soumission' type='submit' name='valider' value='Ajouter'/></p>
        <p>*Champs obliatoires</p>
    </form>
    <p><a href="adresse.html">Retour</a></p>
</article>
