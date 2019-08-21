<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- POST ---------------//
Class PostController
{
  public function listPosts()
  	{
  		$postManager = new PostManager();

  		$posts = $postManager->getPosts();

          $page = 'view/frontend/listPostsView.php';
          require('view/template.php');
  	}

  public function post()
  	{
  		$postManager = new PostManager();
  		$commentManager = new CommentManager();


  		$post = $postManager->getPost($_GET['id']);
  		$comments = $commentManager-> getComments($_GET['id']);

  		$page = 'view/frontend/postView.php';
  		require('view/template.php');
  	}


  public function addPost()
  	{

  		$page = 'view/PostManager/addPost.php';
  		require('view/template.php');
  	}

  public function addedPost($title, $summary, $content)
  	{
  		$postManager = new PostManager();
  		$dataPost = $postManager->sendedPost($title, $summary, $content);


  		echo '<p>Votre billet a bien été envoyé, il va être soumis à validation dans les plus brefs délais</p>';
  		$page = 'view/presentation.php';
  		require('view/template.php');
  	}

  public function editPost($postId)
  	{
  		$postManager = new PostManager();
  		$post = $postManager->getPost($postId);

  		$page = 'view/PostManager/editPost.php';
  		require('view/template.php');
  	}

  public function editedPost($postId, $postTitle, $postDescription, $postContent)
    {
    	$postManager = new PostManager();
    	$post = $postManager->editedPost($postId, $postTitle, $postDescription, $postContent);

    	$page = 'view/presentation.php';
    	require('view/template.php');
    }

  public function deletePost($postId)
  	{
  		$postManager = new PostManager();
  		$removedPost = $postManager->removePost($postId);

  		$page = 'view/presentation.php';
  		require('view/template.php');
  	}
}
