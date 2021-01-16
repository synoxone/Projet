<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Supprimer une adresse</h1>
    <p>Supprimer une adresses de livraison:</p>
    <p><?= $adresse->getAdresse(); ?></p>
    <p><?= $adresse->getSuite(); ?></p>
    <p><?= $adresse->getCp(); ?></p>
    <p><?= $adresse->getVille(); ?></p>
    <p><?= $adresse->getPays(); ?></p>
    <hr/>
    <p>Souhaitez vous vraiment supprimer cette adresse?</p>
    <form method='post' action=''>
        <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
        <input type='submit' name='non' value='Non'/>
        <input type='submit' name='oui' value='Oui'/>
    </form>
</article>
