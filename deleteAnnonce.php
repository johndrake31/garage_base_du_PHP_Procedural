<?php
$annonce_id = null;
//effacer le garage
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $annonce_id = $_GET['id'];
}
if (!$annonce_id) {
    die('please enter a proper number  in the url for this to delete.');
}

$dbh = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$maRequete =  $dbh->prepare("SELECT * FROM `annonce` where id =:annonce_id");

$maRequete->execute(['annonce_id' => $annonce_id]);

$annonce_to_delete = $maRequete->fetch();
if (!$annonce_to_delete) {
    die("Does Not Exist");
}
$garage_id = $annonce_to_delete['garage_id'];
$maRequeteDelete =  $dbh->prepare("DELETE FROM `annonce` WHERE id =:annonce_id");

$maRequeteDelete->execute(['annonce_id' => $annonce_id]);

//faire un header vers index.php

header("Location: garage.php?id=$garage_id");
