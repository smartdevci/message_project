<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 20/08/2017
 * Time: 05:58
 */
session_start();
require_once '../_class/all_class.php';

$_SESSION['com_message__id']=$_GET['id'];

$user=DAO::getUser($_GET['id']);

$_SESSION['com_message__type']=$user->type;

header('Location: ./');

?>