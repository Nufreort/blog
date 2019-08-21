<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- COMMENT ---------------//

Class CommentController
{
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
}
