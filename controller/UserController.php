<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- USER ---------------//

function addUser($name, $first_name, $email, $password)
	{
		$userManager = new UserManager();
		$dataUser = $userManager->subUser($name, $first_name, $email, $password);

		if ($dataUser === false)
			{
				die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
			}
		else
			{
				header('Location: view/memberarea/signIn_done.php');
			}
	}

function joinUser($email)
	{
		$userManager = new UserManager();
		$userManager->connexionUser($email);
	}
