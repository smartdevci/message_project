<?php 
require_once '../_class/all_class.php';

$connexion=DAO::getConnection();

$email=$_GET['email'];
$password=md5($_GET['password']);


$requete=$connexion->prepare("
	(SELECT * FROM users WHERE email=:email AND password=:password)
	UNION
	(SELECT * FROM users WHERE user_name=:username AND password=:password2)
	
");

$requete->bindValue(':email',$email,PDO::PARAM_STR);
$requete->bindValue(':password',$password,PDO::PARAM_STR);
$requete->bindValue(':username',$email,PDO::PARAM_STR);
$requete->bindValue(':password2',$password,PDO::PARAM_STR);
$requete->execute();

$reponse=$requete->fetch();

echo ($requete->rowCount()!=0)?$reponse['user_id']:$requete->rowCount();