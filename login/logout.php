<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../assets/styles/style.css" />
    </head>
    <body>
<?php
  require_once("../assets/header.php");
  // Initialiser la session
  session_start();
  
  // Détruire la session.
  if(session_destroy())
  {
    // Redirection vers la page de connexion
    header("Location: login.php");
  }
  require_once("../assets/footer.php");
?>
