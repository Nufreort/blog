<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- NAVIGATION ---------------//

class MessageController
{
  public function errorMessage($errorMessage)
		{
	           $page = 'view/errorMessage.php';
	           require('view/template.php');
		}

  public function infosMessage($infosMessage)
  	{
             $page = 'view/errorMessage.php';
             require('view/template.php');
  	}
}
