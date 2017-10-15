<?php
session_start();

require_once '../_class/all_class.php';

header("Content-Type: text/html; charset=UTF-8");

$liste_numero=array();
//var_dump($liste_numero);

$_SESSION['sender'] = $_GET['sender'];
$_SESSION['recipient'] = $_GET['recipient'];
$_SESSION['groupe']=$_GET['groupe'];
//$_SESSION['message'] = str_replace("â","a",$_GET['message']);
$_SESSION['message'] = DAO::replace($_GET['message']);
$nombre_message=$_GET['nb'];
$nombre_message=DAO::getNumberMsg($_GET['message']);


//echo $nombre_message;

$_SESSION['login']="sylvere18";
$_SESSION['pwd']="web43947";

//DEFINITION DES VARIABLES
$numeros=explode("///",$_SESSION['recipient']);
$numeros_groupes=DAO::getNumberFromGroup($_SESSION['groupe']);





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
                    array_push($liste_numero,DAO::getNumberReturn($numeros[$i]));
                }

            }



            $tout_numero=Fonctions::mergeNotDuplicate($liste_numero,$numeros_groupes);
           // $nombre_message=str_len($_SESSION['message'])

            foreach ($tout_numero as $numero_final)
            {
                if(!empty($numero_final))
                {
                    $url.="///https://1s2u.com/sms/sendsms/sendsms.asp?username=" . $login . "&password=" .$password. "&mt=" .$msgType. "&fl=" .$flash. "&sid=" .$sender. "&mno=" .$numero_final. "&ipcl=" .$ip. "&msg=" .$message;
                    DAO::sentMessage($_SESSION['com_message__id'],DAO::no_accent($_SESSION['message']),$_SESSION['sender'],$numero_final,$nombre_message);

                    //echo "<br/> id : ".$_SESSION['com_message__id']." msg : ".DAO::no_accent($_SESSION['message'])." sender : ".$_SESSION['sender']." numero : ".$numero_final." nombre msg = ".$nombre_message;
                }

            }

            $connexion=DAO::getConnection();

            $requete_expiration=$connexion->prepare("SELECT :dateNowUser > NOW() as expiration");
            $date_expiration_message=DAO::getExpirationDate($_SESSION['com_message__id']);
            $requete_expiration->bindValue(':dateNowUser',$date_expiration_message,PDO::PARAM_STR);
            $requete_expiration->execute();
            $reponse_expiration=$requete_expiration->fetch();

            echo $reponse_expiration['expiration']==1? "date valid":"date wrong";



            echo $url;


        }

    }
    else
    {
        echo "non";
    }

?>


