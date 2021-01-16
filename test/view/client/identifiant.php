<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Mon mot de passe</h1>
    <p>Modifiez votre mot de passe:</p>
    <form method='post' action=''>
        <span class='validation'><?= $validation; ?></span>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Mot de passe actuel*</p>
        <input id='password' type='password' name='password' value='<?= $client->getPassword(); ?>'/>
        <p>Nouveau mot de passe*</p>
        <input id='nouveaupassword' type='password' name='nouveaupassword'/>
        <p>8 caractères minimum</p>
        <p>Confirmer le mot de passe*</p>
        <input id='confirmerpassword' type='password' name='confirmerpassword'/>
        <input id='soumission' type='submit' name='valider' value='Modifier'/>
        <p>*Champs obliatoires</p>
    </form>
</article>
