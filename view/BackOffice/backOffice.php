<div class="container">
  <h1> Tableau d'administration</h1>


<h2>Gestion des billets :</h2>

<?php
  if($backPosts->fetch()==NULL)
  {
?>
  <div class="center">
    Aucun article à valider.
  </div>

<?php
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
          <a class="waves-effect waves-light btn green"><i class="material-icons">check</i></a>
          <a href="index.php?action=removePostValidator&amp;postId=<?= $data['id'] ?>" class="waves-effect waves-light btn red"><i class="material-icons">clear</i></a>
          <br />
        </div>
      </div>
    </div>

    <?php
    }
    $backPosts->closeCursor();

  }
?>


<h2>Gestion des commentaires :</h2>

<?php
  if($backComments->fetch()==NULL)
  {
?>
  <div class="center">
    Aucun commentaire à valider.
  </div>

<?php
  }
  else
  {
    while ($comment = $backComments->fetch())
      {
?>

<table class="centered highlight responsive-table">
  <thead>
          <tr>
              <th>Auteur</th>
              <th>Date</th>
              <th>Contenu</th>
              <th>Action</th>
          </tr>
  </thead>
  <tr>
    <td><?= htmlspecialchars($comment['writter_name']) ?> <?= htmlspecialchars($comment['writter']) ?></td>
    <td><?= $comment['comment_date'] ?></td>
    <td><?= nl2br(htmlspecialchars($comment['content'])) ?></td>
    <td>
      <a class="waves-effect waves-light btn green"><i class="material-icons">check</i></a>
      <a class="waves-effect waves-light btn red"><i class="material-icons">clear</i></a>
    </td>
  </tr>
</table>

<?php
  }
}
?>

<br />
<br />

</div>
