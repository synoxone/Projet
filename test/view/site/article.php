<article>
    <h1><?= $article->getNom(); ?></h1>
    <img src='media/article/<?= $article->getNom(); ?>.jpeg'/>
    <p><?= $article->getPrix(); ?>€</p>
    <p><?= $article->getDescription(); ?></p>
        <form method='post' action=''>
            <span class='validation'><?= $validation; ?></span>
            <span id='erreur' class='erreur'></span>
            <p>Taille:</p>
            <select name='taille' id='taille'>
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
            <input id='soumission' type='submit' name='valider' value='Ajouter au panier'/>
                
            </form>
</article>
