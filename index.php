<?php
require_once("assets/header.php");
?>
<main>
  <h1>Votre URL raccourcie en un clique !</h1>
  <section class="connection">
    <h2>Connexion</h2>
    <!-- TODO: add action form -->
    <form action="">
      <label for="email">
        <span>Email:</span>
        <input type="email">
      </label>
      <label for="email">
        <span>Mot de passe:</span>
        <input type="password">
      </label>
      <button type="submit">Se connecter</button>
    </form>
  </section>
</main>
<?php
require_once("assets/footer.php");
?>