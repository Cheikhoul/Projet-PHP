<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
      <?php
        require_once("../assets/header.php");
        require("config.php");

        if(isset($_REQUEST["pseudo"], $_REQUEST["password"], $_REQUEST["mail"])){
        
          $pseudo = stripslashes($_REQUEST["pseudo"]);
          $password = stripslashes($_REQUEST["password"]);
          $mail = stripslashes($_REQUEST["mail"]);
          $query = "INSERT into `utilisateur` (pseudo, password, mail)
                    VALUES ('$pseudo', '".hash('sha256', $password)."', '$mail')";

            $res = $conn->prepare($query);
            $res -> execute();
            if($res){
              echo "<div class='sucess'>
                    <h3>Vous êtes inscrit avec succès.</h3>
                    <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
              </div>";
            }
        }else{
      ?>
        <form class="box" action="" method="post">
          <h1 class="box-logo box-title">Votre URL raccourcie en un clic !</h1>
            <h1 class="box-title">S'inscrire</h1>
          <input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur" required />
            <input type="text" class="box-input" name="mail" placeholder="Adresse électronique" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici !</a></p>
        </form>
      
      <?php } ?>

    <?php
    require_once("../assets/footer.php");
    ?>
  