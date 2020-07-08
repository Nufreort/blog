<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- NAVIGATION ---------------//

class MessageController
{
  public function errorMessage($errorMessage)
		{
	           $page = 'view/infosMessage.php';
	           require('view/template.php');
		}

  public function infosMessage($infosMessage)
  	{
             $page = 'view/infosMessage.php';
             require('view/template.php');
  	}
}
