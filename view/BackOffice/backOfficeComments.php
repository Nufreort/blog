<h2>Gestion des commentaires :</h2>

<?php
  if($backComments->fetch() == NULL)
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
              <a href="index.php?action=acceptedCommentValidator&amp;commentId=<?= $comment['id'] ?>" class="waves-effect waves-light btn green"><i class="material-icons">check</i></a>
              <a href="index.php?action=removeCommentValidator&amp;commentId=<?= $comment['id'] ?>" class="waves-effect waves-light btn red"><i class="material-icons">clear</i></a>
            </td>
          </tr>
        </table>

        <?php
      }

      $backComments->closeCursor();

  }
?>
