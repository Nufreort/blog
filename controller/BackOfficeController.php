<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- BACK OFFICE ---------------//
Class BackOfficeController
{
	public function admin()
	{
		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function backConnection()
	{
		$page = 'view/BackOffice/backConnection.php';
		require('view/template.php');
	}

// -------------- POSTS VALIDATOR ---------------- //
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

// -------------- COMMENTS VALIDATOR ---------------- //

	public function removeCommentValidator($commentId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backComments = $backOfficeManager->removeCommentValidator($commentId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

	public function acceptedCommentValidator($commentId)
	{
		$backOfficeManager = new BackOfficeManager();
		$backComments = $backOfficeManager->acceptedCommentValidator($commentId);

		$page = 'view/BackOffice/backOffice.php';
		require('view/template.php');
	}

}
