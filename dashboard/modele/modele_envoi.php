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
//var_dump($user);
$liste_contact=$user->getContact();
$expeditor_name=$user->name_messenger;


$liste_groupe=$user->getGroup();

