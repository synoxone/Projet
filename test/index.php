<?php
session_start();
/////*** Chargement de l'autoloader ***/////
$class = '';
include_once('classe/Autoloader.php');
Autoloader::autoload($class);
