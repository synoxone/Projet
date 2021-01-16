<article>
    <h1>Supprimer un article</h1>
    <img src='media/article/<?= $panier->getArticle(); ?>.jpeg'/>
    <p><?= $panier->getArticle(); ?>
    (taille: <?= $panier->getTaille(); ?>)
    <?= $panier->getPrix(); ?> €</p>
    <hr/>
    <p>Souhaitez vous vraiment supprimer cet article?</p>
    <form method='post' action=''>
        <input type='submit' name='non' value='Non'/>
        <input type='submit' name='oui' value='Oui'/>
    </form>
</article>
