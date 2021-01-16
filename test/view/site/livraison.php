<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
} elseif(!isset($_SESSION['panier'])) {
    header('location: panier.html');
}
?>
<article>
    <h1>Adresse de livraison</h1>
    <p>Sélectionner un adresse de livraison:</p>
<?php
        if(!empty($adresses)) {
            foreach($adresses as $adresse) {
?>
                <p><?= $adresse->getNom(); ?> <?= $adresse->getPrenom(); ?></p> 
                <p><?= $adresse->getAdresse(); ?></p> 
                <p><?= $adresse->getSuite(); ?></p> 
                <p><?= $adresse->getCp(); ?> <?= $adresse->getVille(); ?></p>
                <p><?= $adresse->getPays(); ?></p>
                <form method='post' action='paiement.html'>
                    <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
                    <input type='submit' name='choisir' value='Choisir'>
                </form>
                <form method='post' action='modifier-adresse.html'>
                    <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
                    <input type='submit' name='modifier' value='Modifier'>
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
