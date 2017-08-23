<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
var_dump($_SESSION);
require_once '../_class/all_class.php';
$nom="";
$numero="";
$id_contact=$_GET['id_contact'];
$contact=new Contact($nom,$numero,0);
$contact->setId($id_contact);
$contact->delete();

