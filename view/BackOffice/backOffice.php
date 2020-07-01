<!--
<div class="container">
  <h1> Tableau d'administration</h1>

  <ul class="collapsible">
  <a href="index.php?action=postValidator">
    <li>
      <div class="collapsible-header">
        <i class="material-icons">work</i>
        BIllets à valider :
        <span class="new badge">4</span></div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
  </a>

  <a href="index.php?action=commentValidator">
    <li>
      <div class="collapsible-header">
        <i class="material-icons">question_answer</i>
        Commentaires à valider :
        <span class="badge">1</span></div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
  </a>
</ul>

</div>
-->
<h4>Billets à valider : </h4>
<?php
     $posts = get_posts();
?>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($posts)) {
            foreach ($posts as $post) {
                ?>
                <tr id="commentaire_<?= $post->id ?>">
                    <td><?= $post->title ?></td>
                    <td><?= substr($post->content, 0, 100); ?>...</td>
                    <td>
                        <a href="index.php?action=acceptedPostValidator&amp;postId=<?= $post->id ?>" id="<?= $post->id ?>"
                           class="btn-floating btn-small waves-effect waves-light green see_comment"><i
                                class="material-icons">done</i></a>
                        <a href="index.php?action=removePostValidator&amp;postId=<?= $post->id ?>" id="<?= $post->id ?>"
                           class="btn-floating btn-small waves-effect waves-light red delete_comment"><i
                                class="material-icons">delete</i></a>


                        </div>
                    </td>
                </tr>

            <?php
            }
        }else{
            ?>
                <tr>
                    <td></td>
                    <td><center>Aucun billet à valider</center></td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<h4>Commentaires à valider :</h4>
<?php
     $comments = get_comments();
?>
<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($comments)) {
            foreach ($comments as $comment) {
                ?>
                <tr id="commentaire_<?= $comment->id ?>">
                    <td><?= $comment->title ?></td>
                    <td><?= substr($comment->content, 0, 100); ?>...</td>
                    <td>

                        <a href="index.php?action=acceptedCommentValidator&amp;commentId=<?= $comment->id ?>" id="<?= $comment->id ?>"
                           class="btn-floating btn-small waves-effect waves-light green see_comment"><i
                                class="material-icons">done</i></a>
                        <a href="index.php?action=removeCommentValidator&amp;commentId=<?= $comment->id ?>" id="<?= $comment->id ?>"
                           class="btn-floating btn-small waves-effect waves-light red delete_comment"><i
                                class="material-icons">delete</i></a>


                        </div>

                    </td>
                </tr>

            <?php
            }
        }else{
            ?>
                <tr>
                    <td></td>
                    <td><center>Aucun commentaire à valider</center></td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>
