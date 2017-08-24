<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 18/08/2017
 * Time: 11:58
 */
session_start();
require_once '../_class/all_class.php';
//session_start();
$groupe="";
$valeur=$_GET['valeur'];

if(isset($_GET['groupe']))
{
    $groupe=1;
}
else if(isset($_GET['contact']))
{
    $groupe=0;
}


$id=$_SESSION['com_message__id'];
$user=DAO::getUser($id);

$liste_contact=$user->getContactFilter($groupe,$valeur);

?>