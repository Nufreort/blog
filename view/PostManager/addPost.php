<div class="container">
  <h1 class="center">Ajouter un billet</h1>

  <p>Dans le but de garantir des billets de la meilleure qualité possible, l'ensemble des billets ajouter sont
    soumis à la validation avant publication. Un délai de 48 à 72h est à prévoir avant que votre contribution ne soit
    visible par les autres membres de la communauté. Merci de votre participation et de votre compréhension !</p>

  <form action="index.php?action=addPost" method="post">
      <fieldset>
          <legend>Ajouter votre billet ici :</legend>
          <div>
              <label for="title">Titre de votre article</label><br />
              <input type="text" id="title" name="title" />
          </div>
          <div>
              <label for="summary">Saisissez un court résumé de votre article :</label><br />
              <input type="text" id="summary" name="summary" />
          </div>
          <div>
              <label for="content">Votre message :</label><br />
              <textarea id="content" name="content"></textarea>
              </div>
          <div>
              <input type="submit" value="Ajouter" />
          </div>
      </fieldset>
  </form>
</div>
