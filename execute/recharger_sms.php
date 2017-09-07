<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
require_once '../_class/all_class.php';
$id_offre=$_GET['id_offre'];
$id_user=$_SESSION['com_message__id'];
$quantite=$_GET['quantite'];

print_r($_SESSION);

DAO::recharger($id_user,$quantite,$id_offre);

?>
