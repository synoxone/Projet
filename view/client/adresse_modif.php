<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Modifier une adresse</h1>
    <p>Modifier une adresse de livraison :</p>
    <form  method='post' action=''>
        <span class='erreur'><?= $erreur; ?></span>
        <span class='validation'><?= $validation; ?></span>
        <input type='hidden' name='adresseID' value='<?= $monadresse->getAdresseId(); ?>'>
        <p>Civilité*</p>
        <p><input type='radio' name='titre' value='M' checked><label for='titre1'>M</label>
        <input type='radio' name='titre' value='Mme' <?php if($monadresse->getTitre() == "Mme") echo "checked"; ?>><label for='titre2'>Mme</label></p>
        <p>Nom*</p>
        <p><input id='nom' class="champ" type='text' name='nom' value='<?= $monadresse->getNom(); ?>'/></p>
        <p>Prénom*</p>
        <p><input id='prenom' class="champ" type='text' name='prenom' value='<?= $monadresse->getPrenom(); ?>'/></p>
        <p>Adresse*</p>
        <p><input id='adresse' class="champ" type='text' name='adresse' value='<?= $monadresse->getAdresse(); ?>'/></p>
        <p>Complément d'adresse</p>
        <p><input type='text' class="champ" name='suite' value='<?= $monadresse->getSuite(); ?>'/></p>
        <p>Code postal*</p>
        <p><input id='cp' class="champ" type='text' name='cp' value='<?= $monadresse->getCp(); ?>'/></p>
        <p>Ville*</p>
        <p><input id='ville' class="champ" type='text' name='ville' value='<?= $monadresse->getVille(); ?>'/></p>
        <p>Pays*</p>
        <p><input id='pays' class="champ" type='text' name='pays' value='<?= $monadresse->getPays(); ?>'/></p>
        <p>téléphone*</p>
        <p><input id='tel' class="champ" type='tel' name='tel' value='<?= $monadresse->getTel(); ?>'/></p>
        <p><i>*Champs obliatoires</i></p>
        <p><input id='soumission' class="submit" type='submit' name='valider' value='Modifier'/></p>
    </form>
<?php
    if(isset($_SESSION['panier'])) {
?>
        <p><a href="livraison.html">Retour au panier</a></p>
<?php
    } else {
?>
    <p><a href="adresse.html">Retour</a></p>
<?php
    }
?>
</article>
