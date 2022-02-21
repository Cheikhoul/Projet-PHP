<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["pseudo"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="assets/styles/style.css" />
  </head>
  <body>
    <?php
    require_once("assets/header.php");
    ?>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
    <p><a href ="pages/formUrl.php">C'est votre tableau de bord.</a></p>
    <a href="login/logout.php">Déconnexion</a>
    </div>
    <?php
    require_once("assets/footer.php");
    ?>
  