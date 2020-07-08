<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- USER ---------------//
Class UserController
{
  public function addUser($name, $first_name, $email, $password)
  	{
  		$userManager = new UserManager();
  		$dataUser = $userManager->subUser($name, $first_name, $email, $password);

  		if ($dataUser === false)
  			{
  				die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
  			}
  		else
  			{
          $page = 'view/UserManager/signIn_done.php';
      		require('view/template.php');
  			}
  	}

  public function joinUser($email, $password)
  	{
  		$userManager = new UserManager();
  		$userManager->connexionUser($email, $password);

      if(isset($_SESSION['id']))
      {
        $infosMessage = 'Vous êtes bien connecté !';
      }
      else
      {
        $infosMessage= 'Mauvais identifiant ou mot de passe !';
      }

      $messageController=new MessageController();
      $messageController->infosMessage($infosMessage);
  	}

    public function joinUser_done()
    	{
        $page = 'view/UserManager/signUp_done.php';
        require('view/template.php');
    	}

  public function testConnection($email, $password)
  	{
  		$userManager = new UserManager();
  		$userManager->testedConnection($email, $password);
  	}
}
