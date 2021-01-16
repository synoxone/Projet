<article>
    <h1>Panier</h1>
    <div class="panier">
        <?php
        if(!$total) {
        ?>
            <p>Votre panier est vide</p>
            <?php
        } else {
            if(isset($paniers)) {
                ?>
                <div class="articles">
                    <?php
                    foreach($paniers as $panier) {
                        ?>
                        <div class="article">
                            <img class="photo" src='media/article/<?= $panier->getArticle(); ?>.jpeg'/>
                            <div class="details">
                                <p><?= $panier->getArticle(); ?>
                                (taille : <?= $panier->getTaille(); ?>)</p>
                                <p><?= $panier->getPrix(); ?> €</p>
                                <p>Quantité :</p>
                                <p><a href='article-moins_<?= $panier->getPosition(); ?>.html'><input type='button' class="button" name='moins' value='-'/></a> 
                                <?= $panier->getQt(); ?>
                                <a href='article-plus_<?= $panier->getPosition(); ?>.html'><input type='button' class="button" name='plus' value='+'/></a></p>
                                <p><a href='article-supp_<?= $panier->getPosition(); ?>.html'><input type='button' class="button" value='Supprimer'></a></p>
                            </div>    
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="total">
                <p>Total: <?= $total; ?>€</p>
                <p><a href='livraison.html'><input class="submit" name='valider' type='button' value='Valider le panier'/></a></p>
            </div>
            <?php
        }
        ?>
        </div>
    <p><a href='accueil.html'>Continuez vos achats</a></p>
</article>
