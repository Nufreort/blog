<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- COMMENT ---------------//

Class CommentController
{
  public function addComment($content, $postId)
  	{
  		$commentManager = new CommentManager();
  		$affectedLines = $commentManager->postComment($content, $postId);

      $infosMessage= '<p>Votre commentaire a bien été envoyé, il va être soumis à validation dans les plus brefs délais !</p>';

      $page = 'view/infosMessage.php';
      require('view/template.php');

  	}

  public function editComment($commentId, $postId)
    {
    	$commentManager = new CommentManager();
    	$comments = $commentManager-> getComment($commentId, $postId);

    	$page = 'view/CommentManager/editComment.php';
    	require('view/template.php');
    }

  public function editedComment($commentId, $commentContent, $postId)
    {
    	$commentManager = new CommentManager();
    	$editedLines = $commentManager->editedComment($commentId, $commentContent);

      $infosMessage= '<p>Votre modification a bien été envoyée, elle va être soumise à validation dans les plus brefs délais !</p>';

      $page = 'view/infosMessage.php';
      require('view/template.php');
    }

  public function deleteComment($commentId, $postId)
    {
    	$commentManager = new CommentManager();
    	$removeComment = $commentManager->removeComment($commentId, $postId);

      $infosMessage= '<p>Votre commentaire a bien été supprimé !</p>';

      $page = 'view/infosMessage.php';
      require('view/template.php');
    }
}
