<?php
if(!isset($_SESSION['id'])) {
    header('location: identification.html');
}
?>
<article>
    <h1>Espace client</h1>
    <p>Bonjour <?= $client->getPrenom(); ?>,</p>
    <p>bienvenue dans votre espace client.</p>
</article>
