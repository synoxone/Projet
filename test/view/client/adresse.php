<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Mes adresses</h1>
    <p>Visualisez et modifiez vos adresses de livraison:</p>
    <?php
    if(!empty($adresses)) {
        foreach($adresses as $adresse) {
    ?>
            <p><?= $adresse->getNom(); ?> <?= $adresse->getPrenom(); ?></p> 
            <p><?= $adresse->getAdresse(); ?></p> 
            <p><?= $adresse->getSuite(); ?></p> 
            <p><?= $adresse->getCp(); ?> <?= $adresse->getVille(); ?></p>
            <p><?= $adresse->getPays(); ?></p>
    
            <form method='post' action='modifier-adresse.html'>
                <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
                <input type='submit' name='modifier' value='Modifier'>
            </form>
            <form method='post' action='supprimer-adresse.html'>
                <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
                <input type='submit' name='supprimer' value='Supprimer'>
            </form>
    <?php  
        }
    } else {
    ?>
    <p>Votre liste d'adresse est vide.</p>
    <?php
    }
    ?>
    <p><a href='ajouter-adresse.html'>Ajouter une adresse</a></p>
</article>
