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
$id_groupe=$_GET['id_groupe'];
$groupe=new Groupe($nom,0);
$groupe->setId($id_groupe);
$groupe->delete();

