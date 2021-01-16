<article>
    <h1>Panier</h1>
<?php
    if(!$total) {
?>
        <p>Votre panier est vide</p>
<?php
    } else {
        if(isset($paniers)) {
            foreach($paniers as $panier) {
?>
                <p><img src='media/article/<?= $panier->getArticle(); ?>.jpeg'/>
                <?= $panier->getArticle(); ?>
                (taille: <?= $panier->getTaille(); ?>)
                <?= $panier->getPrix(); ?> €
                <a href='article-moins_<?= $panier->getPosition(); ?>.html'><input type='button' name='moins' value='-'/></a> 
                <?= $panier->getQt(); ?>
                <a href='article-plus_<?= $panier->getPosition(); ?>.html'><input type='button' name='plus' value='+'/></a>
                <a href='article-supp_<?= $panier->getPosition(); ?>.html'><input type='button' value='Supprimer'></a></p>
<?php
            }
}
?>
        <p>Total: <?= $total; ?>€</p>
        <p><a href='livraison.html'><input class='valider' type='button' value='Valider le panier'/></a></p>
<?php
    }
?>
    <p><a href='accueil.html'>Continuez vos achats</a></p>
</article>
