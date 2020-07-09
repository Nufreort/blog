<?php
     $posts = get_posts();
?>

<h1>Billets à valider : </h1>
<div class="container">
  <div class="card">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Chapô</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    ?>
                    <tr id="commentaire_<?= $post->id ?>">
                        <td><?= $post->title ?></td>
                        <td><?= $post->description ?></td>
                        <td><?= $post->content ?></td>
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
            }

            else
            {
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
  </div>
</div>


<h1>Commentaires à valider :</h1>

<?php
     $comments = get_comments();
?>

<div class="container">
  <div class="card">
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
            if(!empty($comments))
            {
                foreach ($comments as $comment)
                {
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
  </div>
</div>
