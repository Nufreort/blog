<div class="container">
  <h1>
      Page de connexion
  </h1>

  <p>
      <a href="index.php">Retour à la page d'accueil</a>
  </p>

  <form class="connexion" action="index.php?action=joinUser" method="post">
    <fieldset>
      <legend>Connexion :</legend>
      <div>
          <label for="email">Email :</label><br />
          <input type="text" id="email" name="email" />
      </div>
      <div>
          <label for="password">Mot de passe :</label><br />
          <input type="password" id="password" name="password" />
      </div>
      <div>
          <input type="submit" value="Se connecter" />
      </div>
    </fieldset>
  </form>
</div>
