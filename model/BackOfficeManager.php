<?php
require_once("model/ManagerGetData.php");

class BackOfficeManager extends Manager
	{
  /*  public function getPostsValidator()
			{
				$db = $this->dbConnect();

				$backPosts = $db->query('SELECT post.id, post.title, post.description, post.content, post.author, post.statut, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(post.post_date, \'%d/%m/%y à %Hh%imin\') AS post_date FROM post INNER JOIN user ON user.id = post.author WHERE statut = 0');

				return $backPosts;
			}

	*/
    public function getPostsValidator()
    {
      $db = $this->dbConnect();

      $backPosts = $db->query('SELECT * from post WHERE statut = 0');

      return $backPosts;
    }
		
    public function removePostValidator($postId)
    {
      $db = $this->dbConnect();

      $backPosts = $db->prepare('DELETE from post WHERE id=?');
      $backPosts->execute(array($postId));

      return $backPosts;
    }

		public function acceptedPostValidator($postId)
    {
      $db = $this->dbConnect();

      $backPosts = $db->prepare('UPDATE `post` SET `statut`=1 WHERE id = ?');
      $backPosts->execute(array($postId));

      return $backPosts;
    }


    public function getCommentsValidator()
      {
        $db = $this->dbConnect();

        $backComments = $db->query('SELECT comment.id, comment.author, comment.content, user.id AS writter_id, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(comment.date, \'%d/%m/%y à %Hh%imin\') AS comment_date FROM comment INNER JOIN user ON user.id = comment.author WHERE statut = 0 ORDER BY comment_date DESC');

        return $backComments;
      }


			public function removeCommentValidator($commentId)
	    {
	      $db = $this->dbConnect();

	      $backComments = $db->prepare('DELETE from comment WHERE id=?');
	      $backComments->execute(array($commentId));

	      return $backComments;
	    }

			public function acceptedCommentValidator($commentId)
	    {
	      $db = $this->dbConnect();

	      $backComments = $db->prepare('UPDATE `comment` SET `statut`=1 WHERE id = ?');
	      $backComments->execute(array($commentId));

	      return $backComments;
	    }


/* >Cette fonction est étrange, pas sur qu'elle soit encore valide !
			public function joinAdmin($email, $password)
	    {
	      $db = $this->dbConnect();

	      $backPosts = $db->prepare('SELECT * from user');
	      $backPosts->execute(array($email, $password));

	      return $backPosts;
	    }
*/
  }
