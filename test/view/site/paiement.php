<?php
var_dump($commande);
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
} elseif(!isset($_SESSION['panier'])) {
    header('location: panier.html');
}
?>
<article>
    <h1>Paiement</h1>
    <h2>Vos coordonnées bancaire</h2>
    <form method='post' action=''>
<?php
        foreach($erreurs as $erreur) {
?>
            <span class='erreur'><?= $erreur; ?></span>
<?php
        }
?>
        <span id='erreur' class='erreur'></span>
        <input type='hidden' name='adresseID' value='<?= $adresse->getAdresseId(); ?>'>
        <p>Numéro de la carte:</p>
        <p><input id='numero' type='text' name='numero' placeholder='1111 1111 1111 1111' value='<?php if(isset($_POST['numero'])) echo $_POST['numero']; ?>'/></p>
        <p>Date de validité:</p>
        <p><input id='date' type='text' name='date' placeholder='05/24' value='<?php if(isset($_POST['date'])) echo $_POST['date']; ?>'/></p>
        <p>Cryptogramme:</p>
        <p><input id='crypto' type='text' name='crypto' placeholder='111' value='<?php if(isset($_POST['crypto'])) echo $_POST['crypto']; ?>'/></p>
        <p><input id='soumission' type='submit' name='valider' value='Valider ma commande'/></p>
        <p><a href="livraison.html">Retour à l'étape précédente</a></p>
    </form>
    <h3>Votre panier</h3>
<?php
    if(isset($paniers)) {
            foreach($paniers as $panier) {
?>
                <p><img src='media/article/<?= $panier->getArticle(); ?>.jpeg'/>
                <?= $panier->getArticle(); ?>
                (taille: <?= $panier->getTaille(); ?>)
                <?= $panier->getPrix(); ?> €
                <?= $panier->getQt(); ?><p>
<?php
            }
    }
?>
    <p>Total: <?= $total; ?>€</p>
    <h3>Adresse de livraison</h3>
    <p><?= $adresse->getNom(); ?> <?= $adresse->getPrenom(); ?></p> 
    <p><?= $adresse->getAdresse(); ?></p> 
    <p><?= $adresse->getSuite(); ?></p> 
    <p><?= $adresse->getCp(); ?> <?= $adresse->getVille(); ?></p>
    <p><?= $adresse->getPays(); ?></p>
</article>
