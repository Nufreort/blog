<?php
session_start(); ?>

<?php
	require('controller/frontend.php');

//--- index page
	if (isset($_GET['action']))
	{

//-- --------------------------- POST -------------------- //

//-- get all the posts
		if ($_GET['action'] == 'listPosts')
		{
      listPosts();
    }


//-- get a post
		elseif ($_GET['action'] == 'post')
		{
			if (isset($_GET['id']) && $_GET['id'] > 0)
			{
					post();
			}
		}

//-- add a post
	elseif ($_GET['action'] == 'addPost')
	{
		if(isset($_POST['title'], $_POST['summary'], $_POST['content']))
		{
			$title = $_POST['title'];
			$summary = $_POST['summary'];
			$content = $_POST['content'];
			addedPost($title, $summary, $content);
		}
		else
		{
			addPost();
		}
	}

//edit a post
	elseif ($_GET['action'] == 'editPost')
	{
		$postId=$_GET['postId'];
		editPost($postId);
	}

	elseif ($_GET['action'] == 'editedPost')
	{
		$postId=$_GET['postId'];
		$postTitle=$_POST['title'];
		$postDescription=$_POST['description'];
		$postContent=$_POST['content'];
		editedPost($postId, $postTitle, $postDescription, $postContent);
	}

// delete a post
	elseif ($_GET['action'] == 'deletePost')
	{
		$postId=$_GET['postId'];
		deletePost($postId);
	}


 // ------------------ COMMENTS  --------------------//


 // add a comment
	elseif ($_GET['action'] == 'addComment')
	{
		if (isset($_GET['id']) && $_GET['id']> 0)
		{
			if (isset($_POST['content']))
			{
				$content = $_POST['content'];
				$postId = $_GET['id'];
				addComment($content, $postId);
			}
			else
			{
				echo 'Erreur : tous les champs ne sompt pas remplis !' ;
			}
		}
		else
		{
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}

// edite a comment

	elseif ($_GET['action'] == 'editComment')
	{
		$commentId=$_GET['commentId'];
		$postId=$_GET['postId'];
		editComment($commentId, $postId);
	}

	elseif ($_GET['action'] == 'editedComment')
	{
		$commentId=$_GET['commentId'];
		$commentContent=$_POST['content'];
		$postId=$_GET['postId'];
		editedComment($commentId, $commentContent, $postId);
	}

	//{
	//	updateComment($_GET['Id'], $_GET['content']);

	//	if($editedLines===false)
	//	{
	//		die('Impossible de modifier le commentaire.');
	//	}

	//	header('Location:index.php?action=listPostView');
//	}

// delete a comment

	elseif ($_GET['action'] == 'deleteComment')
	{
		$commentId = $_GET['commentId'];
		$postId= $_GET['post'];
		deleteComment($commentId, $postId);
	}

// ------------------- USER ----------------- //

//add a user
	elseif ($_GET['action'] == 'addUser')
	{
		if (!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']))
		{
			if($_POST['password']==$_POST['password2'])
			{
				$pass_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
				addUser($_POST['name'],$_POST['first_name'],$_POST['email'],$pass_hash);
			}
			else
			{
				echo 'Les mots de passe sont différents.';
			}
		}
		else
		{
			echo 'Tous les champs ne sont pas remplis.';
		}
	}

// user connexion

	elseif($_GET['action'] == 'joinUser')
	{

		$email = $_POST['email'];
		$password = $_POST['password'];

// ----------- code à couper ----------- //
$db = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
$connexion->execute(array($email));
$resultat = $connexion->fetch();
// ----------- fin de coupe --------------//

		$isPasswordCorrect = password_verify($password, $resultat['password']);

		if (!$resultat['password'])
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
			if($isPasswordCorrect)
			{
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $resultat['name'];
				$_SESSION['first_name'] = $resultat['first_name'];
				$_SESSION['email'] = $resultat['email'];

				joinUser_done();
			}
			else
			{
				echo 'Mauvais identifiant ou mot de passe ! (erreur 2)';
			}
		}
	}
// ------------------------- BACK OFFICE --------------------///

	elseif($_GET['action'] == 'admin')
	{
		admin();
	}


// Navigation //

	elseif ($_GET['action'] == 'signIn')
		{
			signIn();
		}
	elseif ($_GET['action'] == 'signUp')
		{
			signUp();
		}
	elseif ($_GET['action'] == 'leave')
		{
			leave();
		}
    else
    {
        error();
    }

// Home //
	}
	else
	{
		home();
	}
