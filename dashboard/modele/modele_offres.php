<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 18/08/2017
 * Time: 11:58
 */
require_once '../_class/all_class.php';
//session_start();
//var_dump($_SESSION);

$id=$_SESSION['com_message__id'];
$user=DAO::getUser($id);


$liste_contact=$user->getContact();
$liste_offres=DAO::getOffre();

$nombre_groupe=250;
$nombre_contact=2500;
?>