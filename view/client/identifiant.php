<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Mon mot de passe</h1>
    <p>Modifiez votre mot de passe :</p>
    <form method='post' action=''>
        <span class='validation'><?= $validation; ?></span>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Mot de passe actuel*</p>
        <input id='password' class="champ" type='password' name='password' value='<?= $client->getPassword(); ?>'/>
        <p>Nouveau mot de passe*</p>
        <input id='nouveaupassword' class="champ" type='password' name='nouveaupassword'/>
        <p><i>8 caractères minimum</i></p>
        <p>Confirmer le mot de passe*</p>
        <input id='confirmerpassword' class="champ" type='password' name='confirmerpassword'/>
        <p><i>*Champs obliatoires</i></p>
        <input id='soumission' class="submit" type='submit' name='valider' value='Modifier'/>
    </form>
</article>
