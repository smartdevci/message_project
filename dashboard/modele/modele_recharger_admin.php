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
if($_SESSION['com_message__type']=="admin")
{
    header('Location:./');
}

$id=$_SESSION['com_message__id'];
$user=DAO::getUser($id);

$liste_offre=DAO::getOffre();
$liste_souscription=DAO::getSouscriptionValide();
$liste_souscription_en_cours=DAO::getSouscriptionEnCours();
?>