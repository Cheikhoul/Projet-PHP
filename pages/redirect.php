<?php require('../login/config.php');
require_once('../assets/header.php'); ?>

<?php

session_start();

$getUrlOrigin = $conn->prepare("SELECT * FROM url_raccourcie 
JOIN url_origine
ON url_raccourcie.id_url_origine=url_origine.id_url_origine
WHERE url_raccourcie = :urlId");

$testUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// $testUrl = 'http://localhost:8888/Projet-PHP/pages/redirect.php?id=18c1c606';

$getUrlOrigin->bindParam("urlId", $testUrl);
$getUrlOrigin->execute();

$result = $getUrlOrigin->fetchAll();

$redirectUrl = $result[0]['url_origine'];

header("Location: $redirectUrl");

require_once("../assets/footer.php");

?>