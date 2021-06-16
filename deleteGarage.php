<?php
$garage_id = null;
//effacer le garage
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $garage_id = $_GET['id'];
}
if (!$garage_id) {
    die('please enter a proper number  in the url for this to delete.');
}

$dbh = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$maRequete =  $dbh->prepare("SELECT * FROM `garages` where id =:garage_id");

$maRequete->execute(['garage_id' => $garage_id]);

$garage_to_delete = $maRequete->fetch();
if (!$garage_to_delete) {
    die("Does Not Exist");
}

$maRequeteDelete =  $dbh->prepare("DELETE FROM `garages` WHERE id =:garage_id");

$maRequeteDelete->execute(['garage_id' => $garage_id]);

//faire un header vers index.php

header("Location: index.php");
