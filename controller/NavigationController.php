<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- NAVIGATION ---------------//

class NavigationController
{
	public function signIn()
		{
            $page = 'view/UserManager/signIn.php';
            require('view/template.php');
		}
	public function signUp()
		{
            $page = 'view/UserManager/signUp.php';
            require('view/template.php');
		}
	public function leave()
		{
            $page = 'view/UserManager/leave.php';
            require('view/template.php');
		}
	public function error()
		{
            $page = 'view/infosPage.php';
            require('view/template.php');
		}

	public function home()
		{
	          $page = 'view/presentation.php';
	          require('view/template.php');
		}

	public function postValidator()
	{
						$page = 'view/BackOffice/backOfficePosts.php';
						require('view/template.php');
	}
	public function commentValidator()
	{
						$page = 'view/BackOffice/backOfficeComments.php';
						require('view/template.php');
	}
}
