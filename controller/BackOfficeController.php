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

	public function acceptedPostValidator($postId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->acceptedPostValidator($postId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function removeCommentValidator($commentId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->removeCommentValidator($commentId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function acceptedCommentValidator($commentId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->acceptedCommentValidator($commentId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function backConnection()
	{
		$page = 'view/BackOffice/backConnection.php';
		require('view/template.php');
	}

	public function joinAdmin($email, $password)
	{
		$backOfficeManager = new BackOfficeManager();
		$backPosts = $backOfficeManager->joinAdmin($email, $password);
	}

}
