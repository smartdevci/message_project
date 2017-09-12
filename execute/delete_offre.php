<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
require_once '../_class/all_class.php';
$nom="";
$id_offre=$_GET['id_offre'];
$offre=new Offre("",0,0);
$offre->setId($id_offre);
$offre->delete();

