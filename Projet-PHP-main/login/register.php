<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
      <?php
        require_once("assets/header.php");
        require("config.php")


        if (isset($_REQUEST["pseudo"], $_REQUEST["password"], $_REQUEST["mail"])){
          
          // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
          $pseudo = stripslashes($_REQUEST["pseudo"]);
          $pseudo = mysqli_real_escape_string($conn, $pseudo); 
          // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
          $password = stripslashes($_REQUEST["password"]);
          $password = mysqli_real_escape_string($conn, $password);
          // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
          $mail = stripslashes($_REQUEST["mail"]);
          $mail = mysqli_real_escape_string($conn, $mail);
         
          //requéte SQL + mot de passe crypté
            $query = "INSERT into `utilisateurs` (pseudo, password, mail)
                      VALUES ('$username', '".hash('sha256', $password)."', '$mail')";
          // Exécuter la requête sur la base de données
            $res = mysqli_query($conn, $query);
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
    require_once("assets/footer.php");
    ?>
  </body>
</html>