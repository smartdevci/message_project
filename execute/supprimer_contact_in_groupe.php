<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
require_once '../_class/all_class.php';
$id_groupe=$_GET['id_groupe'];
$id_contact=$_GET['id_contact'];

DAO::deleteContactInGroup($id_contact,$id_groupe);

?>
