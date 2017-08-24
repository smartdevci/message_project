<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 18/08/2017
 * Time: 11:58
 */
session_start();
define('GROUPE',1);
define('CONTACT',0);
require_once '../_class/all_class.php';
//session_start();
$groupe=$_GET['id_groupe'];


$id=$_SESSION['com_message__id'];
$user=DAO::getUser($id);

$liste_contact=$user->getContact();
$liste_contact_id_groupe=$user->getContactGroup($groupe);
?>