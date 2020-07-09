<?php
	session_start();

	require('controller/BackOfficeController.php');
	require('controller/CommentController.php');
	require('controller/PostController.php');
	require('controller/NavigationController.php');
	require('controller/UserController.php');
	require('controller/MessageController.php');
	require('controller/MailController.php');

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
				echo 'Erreur : tous les champs ne sompt pas remplis !';
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
		$postId= $_GET['postId'];

		$commentController=new CommentController();
		$commentController->deleteComment($commentId, $postId);
	}

// ------------------- USER ----------------- //

//add a user
	elseif ($_GET['action'] == 'addUser')
	{
		if (!empty(htmlspecialchars($_POST['name'])) && !empty(htmlspecialchars($_POST['first_name'])) && !empty(htmlspecialchars($_POST['email'])) && !empty(htmlspecialchars($_POST['password'])) && !empty(htmlspecialchars($_POST['password2'])))
		{
			if(htmlspecialchars($_POST['password'])==htmlspecialchars($_POST['password2']))
			{
				$pass_hash = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

				$userController=new UserController();
				$userController->addUser(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['first_name']), htmlspecialchars($_POST['email']), $pass_hash);
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

		$userController=new UserController();
		$userController->joinUser($email, $password);
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

	//------------------------- ACTION -------------------- //

	elseif ($_GET['action'] == 'mail')
		{
			$to ='contact@ldx.com';
			$subject ='formulaire de contact';
			$nameContact = htmlspecialchars($_POST['contact']);
			$mailContact = htmlspecialchars($_POST['email']);
			$messageContact = htmlspecialchars($_POST['message']);
			$message =	$nameContact .' - Email :'. $mailContact .' - Message :'. $messageContact;

			$mailController=new MailController();
			$mailController->mailTo($to, $subject, $message);
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
	elseif($_GET['action'] == 'postValidator')
		{
			$navigationController=new NavigationController();
			$navigationController->postValidator();
		}
	elseif($_GET['action'] == 'commentValidator')
		{
			$navigationController=new NavigationController();
			$navigationController->commentValidator();
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
		$navigationController= new NavigationController();
		$navigationController->home();
	}
