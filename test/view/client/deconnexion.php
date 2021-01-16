<?php
$_SESSION = [];

if (ini_get('session.use_cookies')) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params['path'], $params['domain'],
    $params['secure'], $params['httponly']
  );
}

session_destroy();
?>
<article>
    <h1>Se déconnecter</h1>
    <p>Vous êtes déconnecté,<br> à bientôt!</p>
    <p><a href='accueil.html'>Retour à la boutique</a></p>
    <p><a href='identification.html'> Se connecter</a></p>
</article>
