<?php
	require_once('model/ManagerGetData.php');

		class UserManager extends Manager
	{
		public function subUser($name, $first_name, $email, $password)
			{
				$db = $this->dbConnect();

				$member = $db->prepare('INSERT INTO user(name, first_name, email, password) VALUES(?, ?, ?, ?)');
				$dataUser = $member->execute(array($name, $first_name, $email, $password));

				return $dataUser;
			}

		public function connexionUser($email, $password)
		{
			$db = $this->dbConnect();

			$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
			$connexion->execute(array($email));
			$resultat = $connexion->fetch();

			$isPasswordCorrect = password_verify($password, $resultat['password']);

				if(!$resultat['password'])
				{
					$infosMessage = 'Mauvais identifiant ou mot de passe !';

					$messageController = new MessageController();
					$messageController->infosMessage($infosMessage);
				}
				else
				{
					if($isPasswordCorrect)
					{
						$_SESSION['id'] = $resultat['id'];
						$_SESSION['name'] = $resultat['name'];
						$_SESSION['first_name'] = $resultat['first_name'];
						$_SESSION['email'] = $resultat['email'];
						$_SESSION['role'] = $resultat['role'];

						$infosMessage = 'Vous êtes bien connecté !';

						return $infosMessage;
					}
					else
					{
						$infosMessage = 'Mauvais identifiant ou mot de passe ! (erreur 2)';

						return $infosMessage;
					}
				}
			}


		public function testedConnection($email, $password)
		{
			$db = $this->dbConnect();

			$connexion = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
			$connectedUser = $connexion->execute(array($email, $password));

			return $connectedUser;
		}
	}
