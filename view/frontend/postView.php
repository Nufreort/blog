<div class="container">
	<p>
		<a href="index.php?action=listPosts">Retour à la liste des billets</a>
	</p>


		<?php
			if($_SESSION['id']==$post["author"])
			{
		?>
				<div>
					<a href="index.php?action=editPost&amp;postId=<?= $post['id'] ?>" class="waves-effect waves-light btn-small blue"><i class="material-icons left">edite</i>Modifier l'article</a>
					<a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>" class="waves-effect waves-light btn-small blue"><i class="material-icons left">clear</i>Supprimer l'article</a>
				</div>
		<?php
			}
		?>


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


	<h2>Commentaires</h2>

	<?php
		while ($comment = $comments->fetch())
		{
	?>
	<div class="card">
		<div class="card-content">
			<p>
				<strong><?= htmlspecialchars($comment['writter_name']) ?> <?= htmlspecialchars($comment['writter']) ?></strong> le <?= $comment['comment_date'] ?>

				<?php
					if(htmlspecialchars($comment['writter_id']) == $_SESSION['id'])
					{
				?>

				(<a href="index.php?action=editComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">Modifier</a> / <a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>">Supprimer</a>)

				<?php
					}
				?>

			</p>

			<p>
				<?= nl2br(htmlspecialchars($comment['content'])) ?>
			</p>
		</div>
	</div>

	<?php
		}
	?>

	<p> Pour rappel, l'ajout des commentaires est soumis à validation.
		Votre commentaire apparaitre dans les prochaines 72h. Merci de votre compréhension !
	</p>

	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<fieldset>
			<legend>Ajouter votre commentaire :</legend>
			<div>
				<label for="content">Commentaire :</label><br />
				<textarea id="content" name="content"></textarea>
			</div>
			<div>
				<input type="submit" value="Valider" />
			</div>
		</fieldset>
	</form>

</div>
