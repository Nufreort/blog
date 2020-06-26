<?php
	session_start();


	require('controller/BackOfficeController.php');
	require('controller/CommentController.php');
	require('controller/PostController.php');
	require('controller/NavigationController.php');
	require('controller/UserController.php');
	require('controller/MessageController.php');

//----------------- INITIALISATION ---------------- //
	if (isset($_GET['action']))
	{

//-- --------------------------- POST -------------------- //

//-- get all the posts
	if ($_GET['action'] == 'listPosts')
		{
			$postController=new PostController();
			$postController->listPosts();
    }
//-- get a post
	elseif ($_GET['action'] == 'post')
		{
			if (isset($_GET['id']) && $_GET['id'] > 0)
			{
				$postController=new PostController();
				$postController->post();
			}
		}

//-- add a post
	elseif ($_GET['action'] == 'addPost')
		{
			if(isset($_POST['title'], $_POST['summary'], $_POST['content']))
				{
					$title = htmlspecialchars($_POST['title']);
					$summary = htmlspecialchars($_POST['summary']);
					$content = htmlspecialchars($_POST['content']);
					$postController=new PostController();
					$postController->addedPost($title, $summary, $content);
				}
			else
				{
					$postController=new PostController();
					$postController->addPost();
				}
		}

//edit a post
	elseif ($_GET['action'] == 'editPost')
		{
			$postId=$_GET['postId'];
			$postController=new PostController();
			$postController->editPost($postId);
		}

	elseif ($_GET['action'] == 'editedPost')
		{
			$postId=$_GET['postId'];
			$postTitle=htmlspecialchars($_POST['title']);
			$postDescription=htmlspecialchars($_POST['description']);
			$postContent=htmlspecialchars($_POST['content']);
			$postController=new PostController();
			$postController->editedPost($postId, $postTitle, $postDescription, $postContent);
		}

// delete a post
	elseif ($_GET['action'] == 'deletePost')
	{
		$postId=$_GET['postId'];
		$postController=new PostController();
		$postController->deletePost($postId);
	}

 // ------------------ COMMENTS  --------------------//


 // add a comment
	elseif ($_GET['action'] == 'addComment')
	{
		if (isset($_GET['id']) && $_GET['id']> 0)
		{
			if (isset($_POST['content']))
			{
				$content = htmlspecialchars($_POST['content']);
				$postId = $_GET['id'];

				$commentController=new CommentController();
				$commentController->addComment($content, $postId);
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
		$commentController=new CommentController();
		$commentController->editComment($commentId, $postId);
	}

	elseif ($_GET['action'] == 'editedComment')
	{
		$commentId=$_GET['commentId'];
		$commentContent=htmlspecialchars($_POST['content']);
		$postId=$_GET['postId'];

		$commentController=new CommentController();
		$commentController->editedComment($commentId, $commentContent, $postId);
	}

// delete a comment

	elseif ($_GET['action'] == 'deleteComment')
	{
		$commentId = $_GET['commentId'];
		$postId= $_GET['post'];

		$userController=new UserController();
		$userController->deleteComment($commentId, $postId);
	}

// ------------------- USER ----------------- //

//add a user
	elseif ($_GET['action'] == 'addUser')
	{
		if (!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']))
		{
			if($_POST['password']==$_POST['password2'])
			{
				$pass_hash = password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT);

				$userController=new UserController();
				$userController->addUser(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['first_name']),htmlspecialchars($_POST['email']),$pass_hash);
			}
			else
			{
				$errorMessage = 'Les mots de passe sont différents.';

				$messageController=new MessageController();
				$messageController->errorMessage($errorMessage);
			}
		}
		else
		{
			$errorMessage = 'Tous les champs ne sont pas remplis.';

			$messageController=new MessageController();
			$messageController->errorMessage($errorMessage);
		}
	}

// user connexion

elseif($_GET['action'] == 'joinUser')
	{

		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

// ----------- code à couper ----------- //
$db = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
$connexion->execute(array($email));
$resultat = $connexion->fetch();
// ----------- fin de coupe --------------//

		$isPasswordCorrect = password_verify($password, $resultat['password']);

		if (!$resultat['password'])
		{
			$errorMessage = 'Mauvais identifiant ou mot de passe !';

			$messageController=new MessageController();
			$messageController->errorMessage($errorMessage);
		}
		else
		{
			if($isPasswordCorrect)
			{
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $resultat['name'];
				$_SESSION['first_name'] = $resultat['first_name'];
				$_SESSION['email'] = $resultat['email'];
				$_SESSION['role'] = $resultat['role'];

//------réussir à passer par le routeur----//
				$page = 'view/memberarea/signUp_done.php';
        require('view/template.php');
			}
			else
			{
				$errorMessage =  'Mauvais identifiant ou mot de passe ! (erreur 2)';

				$messageController=new MessageController();
				$messageController->errorMessage($errorMessage);
			}
		}
	}

/*
	elseif($_GET['action'] == 'joinUser')
	{

		$email = $_POST['email'];
		$password = $_POST['password'];

		$userController=new UserController();
		$userController->testConnection($email, $password);

		if(isset($connectedUser))
		{
			echo 'oui';
		}
		else {
			echo 'non';
		}

-----------------------
----------------------- deja en commentaire / ANTE
		/*	{
				$_SESSION['id'] = $connectedUser['id'];
				$_SESSION['name'] = $connectedUser['name'];
				$_SESSION['first_name'] = $connectedUser['first_name'];
				$_SESSION['email'] = $connectedUser['email'];
				$_SESSION['role'] = $roleUser;

				$userController=new UserController();
				$userController->joinUser_done();
	}
			else
			{
				$errorMessage = 'Mauvais identifiant ou mot de passe ! (erreur 2)';

				$navigationController=new navigationController();
				$navigationController->errorMessage($errorMessage);
			}*/

	// end of user connexion

// ------------------------- BACK OFFICE --------------------///

	elseif($_GET['action'] == 'admin')
	{
		$backOfficeController=new BackOfficeController();
		$backOfficeController->admin();
		/* --- parametrer le bouton en fonction du rôle
		if($resultat['role']=='admin')
		{
			//----- retirer le message d'erreur pour les intrusions ----///
			$backOfficeController=new BackOfficeController();
			$backOfficeController->admin();
		}

		else
		{
			Echo "Cet espace est réservé aux administrateurs !";
		}
		*/
	}

	elseif($_GET['action'] == 'removePostValidator')
	{
		$postId = $_GET['postId'];
		$backOfficeController=new BackOfficeController();
		$backOfficeController->removePostValidator($postId);
	}

	elseif($_GET['action'] == 'acceptedPostValidator')
	{
		$postId = $_GET['postId'];
		$backOfficeController=new BackOfficeController();
		$backOfficeController->acceptedPostValidator($postId);
	}

	elseif($_GET['action'] == 'removeCommentValidator')
	{
		$commentId = $_GET['commentId'];
		$backOfficeController=new BackOfficeController();
		$backOfficeController->removeCommentValidator($commentId);
	}

	elseif($_GET['action'] == 'acceptedCommentValidator')
	{
		$commentId = $_GET['commentId'];
		$backOfficeController=new BackOfficeController();
		$backOfficeController->acceptedCommentValidator($commentId);
	}

	elseif($_GET['action'] == 'backConnection')
	{
		$backOfficeController=new BackOfficeController();
		$backOfficeController->backConnection();
	}

	elseif($_GET['action'] == 'joinAdmin')
	{
		$backOfficeController=new BackOfficeController();
		$backOfficeController->joinAdmin();
	}

//------------------------- NAVIGATION -------------------- //

	elseif ($_GET['action'] == 'signIn')
		{
			$navigationController=new NavigationController();
			$navigationController->signIn();
		}
	elseif ($_GET['action'] == 'signUp')
		{
			$navigationController=new NavigationController();
			$navigationController->signUp();
		}
	elseif ($_GET['action'] == 'leave')
		{
			$navigationController=new NavigationController();
			$navigationController->leave();
		}
    else
    {
			$navigationController=new NavigationController();
			$navigationController->error();
    }

//-------------- Home ------------------ //
	}
	else
	{
		$navigationController = new NavigationController();
		$navigationController ->home();
	}
