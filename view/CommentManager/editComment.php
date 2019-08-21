<div class="container">
  <h1>Modifier votre commentaire</h1>
  <p><a href="index.php?action=listPosts">Retour à l'article</a></p>

  <p>Votre commentaire à modifier :</p>

  <?php
    while ($comment = $comments->fetch())
    {
  ?>
  <div class="card">
    <div class="card-content">
      <p>
        <strong><?= htmlspecialchars($comment['writter_name']) ?> <?= htmlspecialchars($comment['writter']) ?></strong> le <?= $comment['comment_date'] ?>
      </p>
      <p>
        <?= nl2br(htmlspecialchars($comment['content'])) ?>
      </p>
    </div>
  </div>




  <form action="index.php?action=editedComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $_GET['postId'] ?>" method="post">
  	<div>
  		<label for="content">Commentaire :</label><br />
  		<textarea id="content" name="content"><?= $comment['content'] ?></textarea>
  	</div>
  	<div>
  		<input type="submit" value="Valider" />
  	</div>
  </form>

  <?php
    }
  ?>
</div>
