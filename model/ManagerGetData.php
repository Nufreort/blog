<?php

class Manager
	{
		protected function dbConnect()
			{
				$dbhost = 'localhost';
				$dbname = 'myblog';
				$dbuser = 'root';
				$dbpswd = '';

				$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
				
				return $db;
			}
	}
