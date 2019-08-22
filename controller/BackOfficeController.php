<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');

//----------------- BACK OFFICE ---------------//
Class BackOfficeController
{
	public function admin()
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->getPostsValidator();

		$backOfficeManager = new BackOfficeManager();
		$backComments = $backOfficeManager->getCommentsValidator();

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function removePostValidator($postId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->removePostValidator($postId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}
}
