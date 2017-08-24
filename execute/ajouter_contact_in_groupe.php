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
$id_groupe=$_GET['id_groupe'];
$id_contact=$_GET['id_contact'];

DAO::insertContactInGroup($id_contact,$id_groupe);

?>
