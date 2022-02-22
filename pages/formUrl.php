<?php
require('../login/config.php');
require_once('../assets/header.php'); ?>
<h1>MES URL raccourcies</h1>
<a href="../index.php">Back to DashBoard</a>
<br>
<?php require_once('../function/shortenUrl.php') ?>
<?php require_once('../function/template.dataLinker.php') ?>

<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["pseudo"])) {
  header("Location: ../login/login.php");
  exit();
}
?>

<?php
$id = $_SESSION['id'];

if($_POST){
  if ($_POST['url']) {
    try {
      saveUrl($conn, $id);
    } catch (\Throwable $th) {
      throw $th;
    }

    echo "
      <form class='box' action='' method='POST'>
        <label for='url'>
          <span>Url:</span>
          <input type='url' class='box-input' name='url' placeholder='Tapez une URL à raccourcir'>
        </label>
        <button type='submit' class='box-button'>Générer mon URL</button>
      </form>
    ";
  }
} else {
  echo "
    <form class='box' action='' method='POST'>
      <label for='url'>
        <span>URL:</span>
        <input type='url' class='box-input' name='url' placeholder='Tapez une URL à raccourcir'>
      </label>
      <button type='submit' class='box-button'>Générer mon URL</button>
    </form>
  ";
}
?>

<?php
// TODO Add variable for id_utilisateur

$getGeneratedURL = $conn->prepare("SELECT url_origine.url_origine, url_raccourcie.url_raccourcie FROM utilisateur 
    JOIN url_origine ON utilisateur.id_utilisateur = url_origine.id_utilisateur
    JOIN url_raccourcie ON url_origine.id_url_origine = url_raccourcie.id_url_origine
    WHERE utilisateur.id_utilisateur = ?");

$getGeneratedURL->bindParam(1, $id);

$getGeneratedURL->execute();

$result = $getGeneratedURL->fetchAll();

if ($result) {
  echo "
        <table>
          <thead>
            <tr>
              <th><span title='Copiez une URL générée et collez la sur votre navigateur pour être redirigé vers votre adresse cible correspondante'>URL générée</span></th>
              <th><span title='URL cible'>URL complète</th>
            </tr>
          </thead>
        <tbody>
        ";

  foreach ($result as $key => $value) {
    echo "
        <tr>
        <td>" . "<a href='$value[url_raccourcie]' target='_blank'>" . $value['url_raccourcie'] . "</a>" . "</td>
          <td>" . $value['url_origine'] . "</td>
        </tr>";
  };
}

echo "</tbody>
</table>";
?>

<?php require_once('../assets/footer.php'); ?>