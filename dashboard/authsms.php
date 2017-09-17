<?php
session_start();

require_once '../_class/all_class.php';

header("Content-Type: text/html; charset=UTF-8");

$_SESSION['sender'] = $_GET['sender'];
$_SESSION['recipient'] = $_GET['recipient'];
//$_SESSION['message'] = str_replace("â","a",$_GET['message']);
$_SESSION['message'] = DAO::replace($_GET['message']);
$nombre_message=$_GET['nb'];

$_SESSION['login']="sylvere18";
$_SESSION['pwd']="web43947";

//DEFINITION DES VARIABLES
$numeros=explode("///",$_SESSION['recipient']);


$login = $_SESSION['login'];
$password = $_SESSION['pwd'];

//"username=Your Username&password=Your Password&mt=Message Type&fl=Sent As Flash Message &sid=Sender Name&mno=Mobile Number&ipcl=Your Server Ip Address&msg=Message"
// VERIFICATION SI LA METHODE EST "POST"
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {

        if($login != "sylvere18" || $password != "web43947")
        {
            die("non");
        }else{
            $sender = htmlspecialchars($_SESSION['sender']);
            $recipient = htmlspecialchars($_SESSION['recipient']);
//            $message = iconv("ISO-8859-1", "UTF-8//TRANSLIT", htmlspecialchars($_SESSION['message']));
            $message = htmlspecialchars($_SESSION['message']);
//            echo $message. "<br>";
            $msgType = 0;
            $flash = 0;
            $ip = $_SERVER['REMOTE_ADDR'];

            $url="";
            for($i=0;$i<sizeof($numeros);$i++)
            {
                if(!empty($numeros[$i]))
                {
                    if($i!=0)
                    {
                        $url.="///";
                    }
                    $url.="https://1s2u.com/sms/sendsms/sendsms.asp?username=" . $login . "&password=" .$password. "&mt=" .$msgType. "&fl=" .$flash. "&sid=" .$sender. "&mno=" .DAO::getNumberReturn($numeros[$i]). "&ipcl=" .$ip. "&msg=" .$message;
                }

            }

            DAO::sentMessage($_SESSION['com_message__id'],DAO::no_accent($_SESSION['message']),$_SESSION['sender'],$_SESSION['recipient'],$nombre_message);
            echo $url;
        }

    }
    else
    {
        echo "non";
    }

?>


