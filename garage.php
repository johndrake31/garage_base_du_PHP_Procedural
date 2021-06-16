<?php
// MY CRAPPY CODE
// if (
//     isset($_GET['garageId']) &&
//     $_GET['garageId'] != "" &&
//     is_numeric($_GET['garageId'])
// ) {

//     $garageId = $_GET['garageId'];

//     $maRequest =  $dbh->query("SELECT * FROM `garages`; ");

//     $garage = $maRequest->fetch($garageId);
//     var_dump($garage);
// }

$garage_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $garage_id = $_GET['id'];
}
if (!$garage_id) {
    die('please enter a number in the url for this to work.');
}

$dbh = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$maRequete =  $dbh->prepare("SELECT * FROM `garages` WHERE id =:garage_id");

$maRequete->execute(['garage_id' => $garage_id]);

$garage = $maRequete->fetch();


// ANNONCE SECTION

$maRequeteAnnonces =  $dbh->prepare("SELECT * FROM `annonce` WHERE garage_id =:garage_id");

$maRequeteAnnonces->execute(['garage_id' => $garage_id]);

$annonces = $maRequeteAnnonces->fetchAll();



// SECTION TO RENDER


$titreDeLaPage = $garage['name'];

ob_start();

require_once "templates/garages/garage.html.php";

$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";
