<?php
require_once('model/ManagerGetData.php');

class CommentManager extends Manager
	{
		public function getComments($postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('SELECT comment.id, comment.author, comment.content, user.id AS writter_id, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(comment.date, \'%d/%m/%y à %Hh%imin\') AS comment_date FROM comment INNER JOIN user ON user.id = comment.author WHERE post_id = ? AND statut = 1 ORDER BY comment_date DESC');
			$comments->execute(array($postId));

			return $comments;
		}

		public function getComment($commentId, $postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('SELECT comment.id, comment.author, comment.content, user.id AS writter_id, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(comment.date, \'%d/%m/%y à %Hh%imin\') AS comment_date  FROM comment INNER JOIN user ON user.id = comment.author WHERE post_id = ? AND comment.id = ?');
			$comments->execute(array($postId, $commentId));

			return $comments;
		}

		public function postComment($content, $postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('INSERT INTO comment(author, content, post_id) VALUES(?, ?, ?)');
			$affectedLines = $comments->execute(array($_SESSION['id'], $content, $postId));

			return $affectedLines;
		}

		public function editedComment($commentId, $commentContent)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('UPDATE comment SET content=?, statut=0  WHERE id=?');
			$editedLines = $comments->execute(array($commentContent, $commentId));

			return $editedLines;
		}

		public function removeComment($commentId, $postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('DELETE FROM comment WHERE id=? AND post_id=?');
			$removedLines = $comments->execute(array($commentId, $postId));

			return $removedLines;
		}

		public function countComment()
		{
			$db = $this->dbConnect();

			$comments = $db->prepare(' SELECT COUNT (*)  FROM comment WHERE statut = 0 ');
			$countComments = $comments->execute();

			return $countComments;

			$_SESSION['countComment'] = $countComments;
		}
	}
