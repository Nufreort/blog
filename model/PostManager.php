<?php
require_once("model/ManagerGetData.php");

class PostManager extends Manager
	{
		public function getPosts()
			{
				$db = $this->dbConnect();

				$req = $db->query('SELECT post.id, post.title, post.description, post.content, post.author, post.statut, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(post.post_date, \'%d/%m/%y à %Hh%imin\') AS post_date FROM post INNER JOIN user ON user.id = post.author WHERE statut = 1 ORDER BY post_date DESC LIMIT 0,5');

				return $req;
			}

		public function getPost($postId)
			{

				$db = $this->dbConnect();

				$req = $db->prepare('SELECT post.id, post.title, post.description, post.content, post.author, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(post.post_date, \'%d/%m/%y à %Hh%imin\') AS post_date FROM post INNER JOIN user ON user.id = post.author WHERE post.id = ?');
				$req->execute(array($postId));
				$post= $req->fetch();

				return $post;
			}

		public function sendedPost($title, $summary, $content)
		{
			$db = $this->dbConnect();

			$req = $db->prepare('INSERT INTO post(title, description, content, author) VALUES(?, ?, ?, ?)');
			$dataPost = $req->execute(array($title, $summary, $content, $_SESSION['id']));

			return $dataPost;
		}

		public function editedPost($postId, $postTitle, $postDescription, $postContent)
		{
			$db = $this->dbConnect();

			$req = $db->prepare('UPDATE post SET title=?, description=?, content=? WHERE id=?');
			$editedLines = $req->execute(array($postTitle, $postDescription, $postContent, $postId));

			return $editedLines;
		}

		public function removePost($postId)
		{
			$db = $this->dbConnect();

			$req = $db->prepare('DELETE FROM post WHERE id=?');
			$removedPost = $req->execute(array($postId));

			return $removedPost;
		}
	}
