<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
require_once '../_class/all_class.php';
$nom_offre=$_GET['nom'];
$nombre_sms=$_GET['nombre_sms'];
$prix=$_GET['prix'];
$id_offre=$_GET['id_offre'];
$offre=new Offre($nom_offre,$prix,$nombre_sms);
$offre->setId($id_offre);
var_dump($offre);
$offre->update();

