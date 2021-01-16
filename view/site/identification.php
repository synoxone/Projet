<?php
if( (isset($_SESSION['id'])) && (isset($_SESSION['panier'])) ) {
    header('Location: livraison.html');
} elseif(isset($_SESSION['id'])) {
    header('Location: espace-client.html');
}
?>
<article>
    <h1>Identification</h1>
    <p>Veuillez entrer vos identifiants:</p>
    <form method='post' action=''>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Adresse e-mail*</p>
        <input id='email' class="champ" type='email' name='email' value='<?php if(isset($_POST['email'])) echo $_POST['email']; ?>'/>            
        <p>Mot de passe*</p>
        <input id='password' class="champ" type='password' name='password'/>
        <p><i>*Champs obliatoires</i></p>
        <input id='soumission' class="submit" type='submit' name='valider' value='Se connecter'/>
    </form>
    <p><a href=''>Mot de passe oublié?</a></p>
    <a href='inscription.html'><p>Pas encore inscrit? Créer un compte</p></a>
</article>
