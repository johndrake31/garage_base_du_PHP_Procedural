<?php

$user = "garage";
$pass = "garage";
$dbh = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


$maRequest =  $dbh->query("SELECT * FROM `garages`;");

$garages = $maRequest->fetchAll();

$titreDeLaPage = "Garages";

//buffer
// j'active la mémoire tampon
//les instruction suivantes ne seront pas affichées dans la page HTML finale
ob_start();


require_once "templates/garages/garages.html.php";
//et ce jusqu'à ce qu'on désactive la memoire tampon
//au passage, on récupère son contenu (et donc garages.html.php) pour 
//le stocker dans la variable $contenuDeLaPage



$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";
