<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Mes informations</h1>
    <p>Visualisez et modifiez vos informations de facturation:</p>
    <form method='post' action=''>
        <span class='validation'><?= $validation; ?></span>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Civilité*</p>
        <input type='radio' name='titre' value='M' checked><label for='titre1'>M</label>
        <input type='radio' name='titre' value='Mme' <?php if($client->getTitre() == 'Mme') echo 'checked'; ?>><label for='titre2'>Mme</label>
        <p>Nom*</p>
        <input id='nom' type='text' name='nom' value='<?= $client->getNom(); ?>'/>
        <p>Prénom*</p>
        <input id='prenom' type='text' name='prenom' value='<?= $client->getPrenom(); ?>'/>
        <p>Adresse e-mail*</p>
        <input id='email' type='email' name='email' value='<?= $client->getEmail(); ?>'/>
        <input id='soumission' type='submit' name='valider' value='Modifier'/>
        <p>*Champs obliatoires</p>
    </form>
</article>
