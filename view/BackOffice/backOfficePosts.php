<h2>Gestion des billets :</h2>



<?php
var_dump($backPosts);

  if($backPosts->fetch()==NULL)
  {
?>
  <div class="center">
    Aucun article à valider.
  </div>

<?php
  $backPosts->closeCursor();
  }

  else
  {
    while ($data = $backPosts->fetch())
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
          <span class="red-text">Description :</span>
          <?php echo nl2br(htmlspecialchars($data['description'])); ?>
        </p>
      </div>

      <div class="card-content">
        <p>
          <span class="red-text">Contenu :</span>
          <?php echo nl2br(htmlspecialchars($data['content'])); ?>
        </p>

        <div class="center">
          <a href="index.php?action=acceptedPostValidator&amp;postId=<?= $data['id'] ?>" class="waves-effect waves-light btn green"><i class="material-icons">check</i></a>
          <a href="index.php?action=removePostValidator&amp;postId=<?= $data['id'] ?>" class="waves-effect waves-light btn red"><i class="material-icons">clear</i></a>
          <br />
        </div>
      </div>
    </div>

    <?php
    $backPosts->closeCursor();
    }


  }
  */
?>
