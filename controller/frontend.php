<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- POST ---------------//

function listPosts()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

        $page = 'view/frontend/listPostsView.php';
        require('view/template.php');
	}

function post()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();


		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager-> getComments($_GET['id']);

		$page = 'view/frontend/postView.php';
		require('view/template.php');
	}


	function addPost()
	{

		$page = 'view/PostManager/addPost.php';
		require('view/template.php');
	}

	function addedPost($title, $summary, $content)
	{
		$postManager = new PostManager();
		$dataPost = $postManager->sendedPost($title, $summary, $content);


		echo '<p>Votre billet a bien été envoyé, il va être soumis à validation dans les plus brefs délais</p>';
		$page = 'view/presentation.php';
		require('view/template.php');
	}

	function editPost($postId)
	{
		$postManager = new PostManager();
		$post = $postManager->getPost($postId);

		$page = 'view/PostManager/editPost.php';
		require('view/template.php');
	}

function editedPost($postId, $postTitle, $postDescription, $postContent)
{
	$postManager = new PostManager();
	$post = $postManager->editedPost($postId, $postTitle, $postDescription, $postContent);

	$page = 'view/presentation.php';
	require('view/template.php');
}

	function deletePost($postId)
	{
		$postManager = new PostManager();
		$removedPost = $postManager->removePost($postId);

		$page = 'view/presentation.php';
		require('view/template.php');
	}

//----------------- COMMENT ---------------//

function addComment($content, $postId)
	{
		$commentManager = new CommentManager();
		$affectedLines = $commentManager->postComment($content, $postId);

		if ($affectedLines === false)
			{
				die('Impossible d\'ajouter le commentaire !');
			}
		else
			{
				header('Location: index.php?action=post&id=' .$postId);
			}
	}

function editComment($commentId, $postId)
{
	$commentManager = new CommentManager();
	$comments = $commentManager-> getComment($commentId, $postId);

	$page = 'view/CommentManager/editComment.php';
	require('view/template.php');
}

function editedComment($commentId, $commentContent, $postId)
{
	$commentManager = new CommentManager();
	$editedLines = $commentManager->editedComment($commentId, $commentContent);

	if ($editedLines === false)
		{
			die('Impossible de modifier le commentaire.');
		}
	else
		{
			$page = 'view/presentation.php';
			require('view/template.php');
		}
}

function deleteComment($commentId, $postId)
{
	$commentManager = new CommentManager();
	$removeComment = $commentManager->removeComment($commentId);


	header('Location: index.php?action=post&id=' .$postId);
}

//----------------- USER ---------------//

function addUser($name, $first_name, $email, $password)
	{
		$userManager = new UserManager();
		$dataUser = $userManager->subUser($name, $first_name, $email, $password);

		if ($dataUser === false)
			{
				die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
			}
		else
			{
				header('Location: view/memberarea/signIn_done.php');
			}
	}

function joinUser($email)
	{
		$userManager = new UserManager();
		$userManager->connexionUser($email);
	}
//----------------- BACK OFFICE ---------------//

function admin()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	$commentManager = new CommentManager();
	$comments = $commentManager-> getSendedComments();

	$page = 'view/BackOffice/backOffice.php';
	require('view/template.php');
}


//----------------- NAVIGATION ---------------//

	function signIn()
		{
            $page = 'view/memberarea/signIn.php';
            require('view/template.php');
		}

	function signUp()
		{
            $page = 'view/memberarea/signUp.php';
            require('view/template.php');
		}

	function leave()
		{
            $page = 'view/memberarea/leave.php';
            require('view/template.php');
		}
function joinUser_done()
		{
            $page = 'view/memberarea/signUp_done.php';
            require('view/template.php');
		}
function error()
		{
            $page = 'view/errorPage.php';
            require('view/template.php');
		}

	function home()
		{
            $page = 'view/presentation.php';
            require('view/template.php');
		}
