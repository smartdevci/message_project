<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 20/08/2017
 * Time: 05:58
 */
session_start();
$_SESSION['com_message__id']=$_GET['id'];

header('Location: ./');

?>