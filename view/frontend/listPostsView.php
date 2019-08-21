<div class="container">
  <h1>
      Le blog des entrepreneurs !
  </h1>

  <p>
      Amis entrepreneurs, découvrez les derniers articles de la communauté et n'hésitez pas à partager votre expérience, bénéfique à tous !
  </p>

  <?php
    if(isset($_SESSION['id']))
    {
      echo '<a href="index.php?action=addPost" class="waves-effect waves-light red btn"><i class="material-icons left">add</i>Ajouter un post</a>';
    }
      while ($data = $posts->fetch())
      {
  ?>

  <div class="card">
    <div class="card-title">
      <h3>
          <?php echo htmlspecialchars($data['title']); ?>
          <em>le <?php echo $data['post_date']; ?></em>
      </h3>
    </div>

    <div class="card-content">
      <p>
          <?php echo nl2br(htmlspecialchars($data['description'])); ?>
          <br />
          <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire l'article</a></em>
      </p>
    </div>
  </div>


  <?php
  }
  $posts->closeCursor();
  ?>
</div>
