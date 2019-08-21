<?php
require_once("model/ManagerGetData.php");

class UserManager extends Manager
	{
		public function subUser($name, $first_name, $email, $password)
			{
				$db = $this->dbConnect();

				$member = $db->prepare('INSERT INTO user(name, first_name, email, password) VALUES(?, ?, ?, ?)');
				$dataUser = $member->execute(array($name, $first_name, $email, $password));

				return $dataUser;
			}

		public function connexionUser($email)
			{
				$db = $this->dbConnect();

				$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
				$connexion->execute(array($email));
				$resultat = $connexion->fetch();

				return $resultat;
			}
	}
