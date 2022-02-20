<?php 
require('../login/config.php');
require_once('../assets/header.php'); ?>
<h1>URL</h1>
<?php require_once('../function/shortenUrl.php') ?>
<?php require_once('../function/template.dataLinker.php') ?>

<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["pseudo"])){
    header("Location: login.php");
    exit(); 
  }
?>

<?php

if ($_POST['url']) {
  echo "
    <form action='' method='POST'>
      <label for='url'>
        <span>Url:</span>
        <input type='url' name='url'>
      </label>
      <button type='submit'>Générer mon URL</button>
    </form>
  ";
} else {
  echo "
    <form action='' method='POST'>
      <label for='url'>
        <span>Url:</span>
        <input type='url' name='url'>
      </label>
      <button type='submit'>Générer mon URL</button>
    </form>
  ";
}
?>

<table>
  <thead>
    <tr>
      <th>URL généré</th>
      <th>Url complète</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // TODO Add variable for id_utilisateur

    $getGeneratedURL = $conn->prepare("SELECT url_origine.url_origine, url_raccourcie.url_raccourcie FROM utilisateur 
    JOIN url_origine ON utilisateur.id_utilisateur = url_origine.id_utilisateur
    JOIN url_raccourcie ON url_origine.id_url_origine = url_raccourcie.id_url_origine
    WHERE utilisateur.id_utilisateur = 1");

    $getGeneratedURL->execute();

    $result = $getGeneratedURL->fetchAll();

    foreach ($result as $key => $value) {
      echo "
      <tr>
        <td>" . $value['url_raccourcie'] . "</td>
        <td>" . $value['url_origine'] . "</td>
      </tr>";
    };
    ?>
  </tbody>
</table>

<?php require_once('../assets/footer.php'); ?>