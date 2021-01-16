<article>
    <div class="vitrine">
        <?php
        if(isset($articles)) {
            foreach($articles as $article) {
                ?>
                <a href='article_<?= $article->getArtID(); ?>.html'><img class="photo" src='media/article/<?= $article->getNom(); ?>.jpeg' />
                <p><?= $article->getNom(); ?></p> 
                <p><?= $article->getPrix(); ?> €</p></a>
                <?php
            }
        } else {
            ?>
            <p>La liste des articles est vide.</p>
            <?php
        }
        ?>
    </div>
</article>
