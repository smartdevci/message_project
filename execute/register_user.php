<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 19/08/2017
 * Time: 12:17
 */

require_once '../_class/all_class.php';
if(isset($_GET['name']))
{
    $name=$_GET['name'];
    $email=$_GET['email'];
    $username=$_GET['username'];
    $expediteur=$_GET['expediteur'];
    $password=md5($_GET['password']);

    $user=new User($name,"",$username,$expediteur,0,$email);
    $user->register(2,$password);
    //var_dump($user);
}
//print_r($_GET);


?>