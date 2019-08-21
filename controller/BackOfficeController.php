<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

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
