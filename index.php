<?php
	session_start();


	require('controller/BackOfficeController.php');
	require('controller/CommentController.php');
	require('controller/PostController.php');
	require('controller/NavigationController.php');
	require('controller/UserController.php');

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
					$title = $_POST['title'];
					$summary = $_POST['summary'];
					$content = $_POST['content'];
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
			$postTitle=$_POST['title'];
			$postDescription=$_POST['description'];
			$postContent=$_POST['content'];
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
				$content = $_POST['content'];
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
		$commentContent=$_POST['content'];
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
				$pass_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);

				$userController=new UserController();
				$userController->addUser($_POST['name'],$_POST['first_name'],$_POST['email'],$pass_hash);
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

		$userController=new UserController();
		$userController->testConnection($email, $password);

		if(isset($connectedUser))
			{
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $resultat['name'];
				$_SESSION['first_name'] = $resultat['first_name'];
				$_SESSION['email'] = $resultat['email'];

				$userController=new UserController();
				$userController->joinUser_done();
			}
			else
			{
				echo 'Mauvais identifiant ou mot de passe ! (erreur 2)';
			}
		}

// ------------------------- BACK OFFICE --------------------///

	elseif($_GET['action'] == 'admin')
	{
		$backOfficeController=new BackOfficeController();
		$backOfficeController->admin();
	}

	elseif($_GET['action'] == 'removePostValidator')
	{
		$postId = $_GET['postId'];
		$backOfficeController=new BackOfficeController();
		$backOfficeController->removePostValidator($postId);
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
