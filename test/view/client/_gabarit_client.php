<!doctype html>
<html>
    <head>
    <meta charset='utf-8'>
    <title><?= $titre ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'/>
    <meta name='description' content='<?= $description ?>'/>
    <meta name='keywords' content='<?= $keywords ?>'/>
    <link rel='stylesheet' href='' />
    </head>

    <body>
    <header>
        <h1><a href='accueil.html'>LOGO</a></h1>
    </header>
    <nav>
        <ul>
            <li><a href='accueil.html'>La boutique</a></li>
            <li><a href=''>Nouveautés</a></li>
            <li><a href=''>La marque</a></li>
            <li><a href='panier.html'>Mon panier</a></li>
            <li><a href='inscription.html'>Espace client</a></li>  
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href='information.html'>Mes informations</a></li>
            <li><a href='identifiant.html'>Mon mot de passe</a></li>
            <li><a href='adresse.html'>Mes adresses</a></li>
            <li><a href=''>Mes commandes</a></li>
            <li><a href='deconnexion.html'>Déconnexion</a></li>
        </ul>
    </nav>
<?= $contenu; ?>
    <footer>
        <form method='post' action=''>
            <h3>Inscivez-vous à la newsletter:</h3>
            <input type='email' name='email' placeholder='Votre adresse mail'/>
            <input type='submit' name='valider' value='OK'/>
        </form>
        <nav>
            <ul>
                <li><a href=''>Conditions générales de vente</a></li>
                <li><a href=''>Mentions légales</a></li>
                <li><a href=''>Livraisons et retours</a></li>
                <li><a href=''>Politique de confidentialité</a></li>
                <li><a href=''>Nous contacter</a></li>
            </ul>
        </nav>
        <p>&copy; 2020 - Marque</p>
    </footer>
    <script src='media/jquery/jquery-3.5.1.min.js'></script>
    <script src='media/jquery/controle-formulaire.js'></script>
    </body>
</html>