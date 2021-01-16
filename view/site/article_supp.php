<article>
    <h1>Supprimer un article</h1>
    <div class="supprimer">
        <div class="article">
            <img class="photo" src='media/article/<?= $panier->getArticle(); ?>.jpeg'/>
            <div class="details">
                <p><?= $panier->getArticle(); ?></p>
                <p>(taille: <?= $panier->getTaille(); ?>)</p>
                <p><?= $panier->getPrix(); ?> €</p>
            </div>
        </div>
        <hr/>
        <p><b>Souhaitez vous vraiment supprimer cet article?</b></p>
        <form method='post' action=''>
            <input type='submit' class="submit" name='non' value='Non'/>
            <input type='submit' class="submit" name='oui' value='Oui'/>
        </form>
    </div>
</article>
