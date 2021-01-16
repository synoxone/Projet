<article>
    <h1><?= $article->getNom(); ?></h1>
    <div class="article">
        <img src='media/article/<?= $article->getNom(); ?>.jpeg'/>
        <div class="details">
            <p><?= $article->getDescription(); ?></p>
            <p><?= $article->getPrix(); ?>€</p>
            <form method='post' action=''>
                <span class='validation'><?= $validation; ?></span>
                <br>
                <span id='erreur' class='erreur'></span>
                <p>Taille:</p>
                <select id='taille' class="champ" name='taille' >
                    <option value=''>Sélectionnez une taille</option>
                    <?php
                        if(isset($tailles)) {
                            foreach($tailles as $taille) {
                            ?>
                                <option value='<?= $taille->getTaille(); ?>'><?= $taille->getTaille(); ?></option>
                                <?php
                            }
                        }
                        ?>
                </select>
                <input id='soumission' class="submit" type='submit' name='valider' value='Ajouter au panier'/>      
            </form>
        </div>
    </div>
</article>
