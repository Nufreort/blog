<div class="container">
  <h1>Modifier votre article :</h1>

  <div class="card">
    <div class=card-title>
      <h3>
        <?php echo htmlspecialchars($post['title']); ?>
        <?php echo '- Ecrit par : ' . htmlspecialchars($post['writter_name']) . ' ' . htmlspecialchars($post['writter']); ?>
        <em> (le <?php echo $post['post_date']; ?>)</em>
      </h3>
    </div>
    <div class="card-content">
      <p>
        <?= nl2br(htmlspecialchars($post['description'])) ?>
      </p>
    </div>
    <div class="card-content">
      <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
      </p>
    </div>
  </div>

  <form action="index.php?action=editedPost&amp;postId=<?= $post['id']?>" method="post">
      <fieldset>
          <legend>Modifier votre billet ici :</legend>
          <div>
              <label for="title">Titre de votre article</label><br />
              <input type="text" id="title" name="title" value="<?= $post['title']?>"/>
          </div>
          <div>
              <label for="description">Saisissez un court résumé de votre article :</label><br />
              <input type="text" id="description" name="description" value="<?= $post['description']?>"/>
          </div>
          <div>
              <label for="content">Votre message :</label><br />
              <textarea id="content" name="content"><?= $post['content']?></textarea>
              </div>
          <div>
              <input type="submit" value="Modifier" />
          </div>
      </fieldset>
  </form>


</div>
