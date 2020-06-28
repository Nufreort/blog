<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- NAVIGATION ---------------//

class NavigationController
{
	public function signIn()
		{
            $page = 'view/memberarea/signIn.php';
            require('view/template.php');
		}
	public function signUp()
		{
            $page = 'view/memberarea/signUp.php';
            require('view/template.php');
		}
	public function leave()
		{
            $page = 'view/memberarea/leave.php';
            require('view/template.php');
		}
	public function joinUser_done()
		{
            $page = 'view/memberarea/signUp_done.php';
            require('view/template.php');
		}
	public function error()
		{
            $page = 'view/errorPage.php';
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
