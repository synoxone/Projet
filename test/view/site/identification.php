<?php
if(isset($_SESSION['id'])) {
    header('Location: espace-client.html');
}
?>
<article>
    <h1>Identification</h1>
    <p>Veuillez entrer vos identifiants:</p>
    <form method='post' action=''>
        <span id='erreur' class='erreur'><?= $erreur; ?></span>
        <p>Adresse e-mail*</p>
        <input id='email' type='email' name='email' value='<?php if(isset($_POST['email'])) echo $_POST['email']; ?>'/>
        <p>Mot de passe*</p>
        <input id='password' type='password' name='password'/>
        <p>*Champs obliatoires</p>
        <input id='soumission' type='submit' name='valider' value='Se connecter'/>
    </form>
    <p><a href=''>Mot de passe oublié?</a></p>
    <p>Vous n'êtes pas encore inscrit?<a href='inscription.html'> Créer un compte</a></p>
</article>
