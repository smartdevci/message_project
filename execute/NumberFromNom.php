<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
require_once '../_class/all_class.php';
$numero=$_GET['numero'];
$contact=Contact::getContactFromNumberOrName($numero);
echo $contact->getName();

