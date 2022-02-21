<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../assets/styles/style.css" />
</head>

<body>
    <?php
    require('config.php');
    require_once("../assets/header.php");
    session_start();

    if (isset($_POST['pseudo'])) {
        $pseudo = stripslashes($_REQUEST['pseudo']);
        $password = stripslashes($_REQUEST['password']);
        $query = "SELECT * FROM `utilisateur` WHERE pseudo='$pseudo' and password='" . hash('sha256', $password) . "'";
        $result = $conn->prepare($query);
        $result->execute();

        $getUser = $result->fetchAll();
        $rows = $result->rowCount();
        if ($rows == 1) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['id'] = $getUser[0]['id_utilisateur'];
            header("Location: ../index.php");
        } else {
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
        <?php if (!empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
    </form>
    <?php
    require_once("../assets/footer.php");
    ?>