<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <?php
        require('config.php');
        session_start();

        if (isset($_POST['pseudo'])){
        $pseudo = stripslashes($_REQUEST['pseudo']);
        $pseudo = mysqli_real_escape_string($conn, $pseudo);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
            $query = "SELECT * FROM `utilisateurs` WHERE pseudo='$pseudo' and password='".hash('sha256', $password)."'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['pseudo'] = $pseudo;
            header("Location: index.php");
        }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
        }
        ?>
        <form class="box" action="" method="post" name="login">
        <h1 class="box-logo box-title">Votre URL raccourcie en un clic !</h1>
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <p class="box-register">Déjà inscrit? <a href="register.php">S'inscrire</a></p>
        <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
        </form>
    </body>
</html>