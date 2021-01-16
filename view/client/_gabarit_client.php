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
                        <li><a href='inscription.html'>Espace client</a></li>  
                    </ul>
                </nav>
            </header>
            <div id="client">
                <section>
                    <ul>
                        <li><a href='information.html'><button>Mes informations</button></a></li>
                        <li><a href='identifiant.html'><button>Mon mot de passe</button></a></li>
                        <li><a href='adresse.html'><button>Mes adresses</button></a></li>
                        <li><a href=''><button>Mes commandes</button></a></li>
                        <li><a href='deconnexion.html'><button>Déconnexion</button></a></li>
                    </ul>
                </section>
                <?= $contenu; ?>
            </div>
            <footer>
                <p>&copy; 2020 - Marque</p>
            </footer>
            <script src='media/jquery/jquery-3.5.1.min.js'></script>
            <script src='media/jquery/controle-formulaire.js'></script>
        </div>
    </body>
</html>