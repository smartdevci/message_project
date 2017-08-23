<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 19/08/2017
 * Time: 14:55
 */

require_once 'Server.php';

class DAO
{


    public  static $connexion;
    private static  $host=Server::host;
    private static  $database_name=Server::database_name;
    private static  $user=Server::user;
    private static  $password=Server::password;




    public static function produceID()
    {
        $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $identifiant="";

        for($i=0;$i<8;$i++)
        {
            $nb=rand(0,strlen($letters)-1);
            $identifiant.=$letters[$nb];
        }

        return $identifiant;
    }


    public static function getConnection()
    {
        DAO::$connexion=new PDO('mysql:host='.DAO::$host.';dbname='.DAO::$database_name, DAO::$user, DAO::$password);
        return DAO::$connexion;
    }


    public static function getUser($id_user)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("SELECT * FROM users WHERE user_id=:id_user");
        $requete->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $requete->execute();
        $reponse=$requete->fetch();

        $user=new User(
            $reponse['nom'],
            $reponse['prenom'],
            $reponse['user_name'],
            $reponse['name_messenger'],
            $reponse['remaining_msg'],
            $reponse['email']
        );


        $user->type=($reponse['id_type']==1)?'admin':$user->type;
        $user->setIdentifiant($reponse['identifiant']);
        $user->setId($reponse['user_id']);


        return $user;

    }


    public static function sentMessage($id_user,$contenu,$expediteur_nom,$destinataire,$nombre_message)
    {

        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            INSERT INTO message(contenu, nombre_message, expediteur_nom, destinataire_numero, id_user) 
            VALUES (:contenu, :nombre_message, :expediteur_nom, :destinataire_numero, :id_user)
        ");

        $requete->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $requete->bindValue(':expediteur_nom',$expediteur_nom,PDO::PARAM_STR);
        $requete->bindValue(':destinataire_numero',$destinataire,PDO::PARAM_STR);
        $requete->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $requete->bindValue(':nombre_message',$nombre_message,PDO::PARAM_STR);
        $requete->execute();

        $update=$connexion->prepare("
            UPDATE users SET remaining_msg=remaining_msg-:nombre WHERE user_id=:id_user
        ");

        $update->bindValue(':nombre',$nombre_message,PDO::PARAM_INT);
        $update->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $update->execute();
    }



}