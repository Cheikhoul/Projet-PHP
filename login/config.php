<?php require_once('../assets/header.php'); ?>
<?php require_once('../function/template.dataLinker.php') ?>

<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'tp_mathias_khadim_gaspard');

// Connexion à la base de données MySQL 
$conn = DatabaseLinker::getConnexion();
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>

