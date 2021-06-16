<?php

$garage_id = null;
$name = null;
$price = null;

if (!empty($_POST['garageId']) && ctype_digit($_POST['garageId'])) {
    $garage_id = $_POST['garageId'];
}

if (!empty($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
}

if (!empty($_POST['price'])) {
    $price = htmlspecialchars($_POST['price']);
}

if (!$garage_id || !$name || !$price) {
    die("formulaire mal rempli");
}

$dbh = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


$maRequete = $dbh->prepare("SELECT * FROM garages WHERE id =:garage_id");
$maRequete->execute(['garage_id' => $garage_id]);
$garage = $maRequete->fetch();

if (!$garage) {
    die("garage inexistant");
}


$maRequeteAnnonceC = $dbh->prepare("INSERT INTO `annonce` (`name`, `price`, `garage_id`) VALUES (:name, :price, :garage_id)");

$maRequeteAnnonceC->execute(['name' => $name, 'price' => $price, 'garage_id' => $garage_id]);

header("Location: garage.php?id=$garage_id");



    // if ($annonce) {
    //     header("Location: garage.php?id=$garage_id");
    // } else {
    //     die('somehting went wrong with the insert');
    // }
