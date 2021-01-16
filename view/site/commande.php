<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
} elseif($_SESSION["panier"]["verrou"] !== "on") {
    header('location: livraison.html');
} else {
    unset($_SESSION["panier"]);
}
?>
<article>
    <h1>Commande</h1>
    <p>Merci!</p> 
    <p>Votre commande a bien été prise en compte</p>
    <p><a href="espace-client.html">Retour à l'espace client</a></p>
    <p><a href='accueil.html'>Retour au magasin</a></p>
</article>
