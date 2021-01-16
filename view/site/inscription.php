<?php
if( (isset($_SESSION['id'])) && (isset($_SESSION['panier'])) ) {
    header('Location: livraison.html');
} elseif(isset($_SESSION['id'])) {
    header('Location: espace-client.html');
}
?>
<article>
    <h1>Inscription</h1>
    <p>Veuillez renseigner vos informations:</p>
    <form method='post' action=''>
        <span class='validation'><?= $validation; ?></span>
        <?php
        foreach($erreurs as $erreur) {
        ?>
            <span class='erreur'><?= $erreur; ?></span>
            <?php
        }
        ?>
        <span id='erreur' class='erreur'></span>
        <p>Civilité*</p>
        <input type='radio' name='titre' value='M' checked><label for='titre1'>M</label>
        <input type='radio' name='titre' value='Mme'><label for='titre2'>Mme</label>
        <p>Nom*</p>
        <input id='nom' class="champ" type='text' name='nom' value='<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>'/>
        <p>Prénom*</p>
        <input id='prenom' class="champ" type='text' name='prenom' value='<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>'/>
        <p>Adresse e-mail*</p>
        <input id='email' class="champ" type='email' name='email' value='<?php if(isset($_POST['email'])) echo $_POST['email']; ?>'/>
        <p>Mot de passe*</p>
        <input id='password' class="champ" type='password' name='password'/>
        <p>8 caractères minimum</p>
        <p><i>*Champs obliatoires</i></p>
        <input id='soumission' class="submit" type='submit' name='valider' value="S'inscrire"/>
    </form>
    <a href='identification.html'><p>Déjà inscrit? Se connecter</p></a>
</article>
