<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
//var_dump($_SESSION);
require_once '../_class/all_class.php';
$id_rechargement=$_GET['id_rechargement'];
$nombre_sms=$_GET['quantite'];


//DAO::validerTransaction($id_rechargement,$nombre_sms);
//echo " id_rechargement : ".$id_rechargement;
DAO::validerTransaction($id_rechargement);
header('Location: http:./../dashboard/rechargera.php');

//exit;

?>



