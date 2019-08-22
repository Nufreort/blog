<?php

function getPosts()
{
	$db = dbConnect();

	$req = $db->query('SELECT id, title, description, content, DATE_FORMAT(post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post ORDER BY post_date DESC LIMIT 0,5');

	return $req;
}

function getPost($postId)
{

	$db = dbConnect();

	$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post WHERE id = ?');
	$req->execute(array($postId));
	$post= $req->fetch();

	return $post;
}


function getComments($postId)
{
	$db = dbConnect();
	
	$comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(date, \'%d/%m/%y à %Hh%imin%ss\') AS comment_date FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));


	return $comments;
}

function postComment($postId, $author, $content)
{
	$db = dbConnect();
	
	$comments = $db->prepare('INSERT INTO comment(post_id, author, content) VALUES(?, ?, ?)');
	$affectedLines = $comments->execute(array($postId, $author, $content));
	
	return $affectedLines;
}

function subUser($name, $first_name, $email, $password)
{
	$db = dbConnect();
	
	$member = $db->prepare('INSERT INTO user(name, first_name, email, password) VALUES(?, ?, ?, ?)');
	$dataUser = $member->execute(array($name, $first_name, $email, $password));
	
	return $dataUser;
}

function connexionUser($email)
{
	$db = dbConnect();
	
	$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
	$connexion->execute(array($email));
	$resultat = $connexion->fetch();
	
	return $resultat;
}

function dbConnect()
{
	
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

		return $db;
	}

	catch(Exception $e)
	{
		die('Erreur : '. $e->getMessage());
	}
}

?>