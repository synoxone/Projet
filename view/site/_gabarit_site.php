<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title><?= $titre ?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'/>
        <meta name='description' content='<?= $description ?>'/>
        <meta name='keywords' content='<?= $keywords ?>'/>
        <link rel='stylesheet' href='media/css/style.css'/>
    </head>

    <body>
        <div id="site">
            <header>
                <h1><a href='accueil.html'>LOGO</a></h1>
                <nav>
                    <ul>
                        <li><a href='accueil.html'>La boutique</a></li>
                        <li><a href=''>Nouveautés</a></li>
                        <li><a href=''>La marque</a></li>
                        <li><a href='panier.html'>Mon panier</a></li>
<?php
                        if(isset($_SESSION['id'])) {
?>
                            <li><a href='espace-client.html'>Espace client</a></li> 
<?php
                        } else {
?>
                            <li><a href='identification.html'>Mon compte</a></li>
<?php
                        }
?>    
                    </ul>
                </nav>
            </header>
            <?= $contenu; ?>
            <footer>
                <form method='post' action=''>
                    <h3>Inscivez-vous à la newsletter:</h3>
                    <input type='email' class="champ" name='email' placeholder='Votre adresse mail'/>
                    <input type='submit' name='valider' class="submit" value='OK'/>
                </form>
                <section>
                    <ul>
                        <li><a href=''>Conditions générales de vente</a></li>
                        <li><a href=''>Mentions légales</a></li>
                        <li><a href=''>Livraisons et retours</a></li>
                        <li><a href=''>Politique de confidentialité</a></li>
                        <li><a href=''>Nous contacter</a></li>
                    </ul>
                </section>
                <p>&copy; 2020 - Marque</p>
            </footer>
            <script src='media/jquery/jquery-3.5.1.min.js'></script>
            <script src='media/jquery/controle-formulaire.js'></script>
        </div>
    </body>
</html>