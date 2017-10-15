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

    public static $number_charactere_per_message=160;




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
        $requete=$connexion->prepare("SELECT *,DATE_FORMAT(date_fin_validite,'%d/%m/%Y') as date_expiration FROM users WHERE user_id=:id_user");
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
/*        $user->setIdentifiant($reponse['identifiant']);*/
        $user->setId($reponse['user_id']);
        $user->date_expiration_message=$reponse['date_expiration'];


        return $user;

    }



    public static function getExpirationDate($id_user)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("SELECT date_fin_validite as date_expiration FROM users WHERE user_id=:id_user");
        $requete->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $requete->execute();
        $reponse=$requete->fetch();

        return $reponse['date_expiration'];

    }






    public static function sentMessage($id_user,$contenu,$expediteur_nom,$destinataire,$nombre_message)
    {
        /**
         * Enregistrement du message
         */
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





    public static function validerTransaction($id_rechargement)
    {
        $connexion=DAO::getConnection();


        $requete=$connexion->prepare("
            SELECT * FROM rechargement r, offres o 
            WHERE r.id_rechargement=:id_rechargement AND r.id_offre=o.id_offre
            
        ");
        $requete->bindValue(':id_rechargement',$id_rechargement,PDO::PARAM_INT);
        $requete->execute();
        $reponse=$requete->fetch();
        $id_user=$reponse['id_user'];
        $nombre_sms=$reponse['nombre_sms'];
        $validite_nbre_jour=$reponse['validate_nbre_jour'];

        $requete=$connexion->prepare("SELECT DATE_ADD(NOW(),INTERVAL :validate_nbre_jour DAY) as expiration");
        $requete->bindValue(':validate_nbre_jour',$validite_nbre_jour,PDO::PARAM_INT);
        $requete->execute();
        $reponse=$requete->fetch();




        echo "<br/> nombre ligne ".$requete->rowCount();
        echo "<br/> nombre sms ".$nombre_sms;
        $expiration_from_today=$reponse['expiration'];  //la date d'expiration que le nouveu rechargement va apporter

        echo "<br/> La date exp Avant ".$validite_nbre_jour;
        echo "<br/> La date exp Après ".$expiration_from_today;

        $requete_user_date_expiration_now=$connexion->prepare("SELECT date_fin_validite as ladate FROM users WHERE user_id=:id_user");
        $requete_user_date_expiration_now->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $requete_user_date_expiration_now->execute();
        $response_user_date_expiration_now=$requete_user_date_expiration_now->fetch();
        $user_date_expiration_now=$response_user_date_expiration_now['ladate'];

        echo "<br/> Ancienne date ".$user_date_expiration_now;

        $date_expiration=DAO::maxDate($expiration_from_today,$user_date_expiration_now);
        echo "<br/>  date ".$date_expiration;


        $update=$connexion->prepare("
            UPDATE users SET 
            remaining_msg=remaining_msg+:nombre, 
            date_fin_validite=:new_expiration
            WHERE user_id=:id_user
        ");

        $update->bindValue(':nombre',$nombre_sms,PDO::PARAM_INT);
        $update->bindValue(':new_expiration',$date_expiration,PDO::PARAM_STR);
        $update->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $update->execute();

        echo "<br/> Req update ".$update->rowCount()."/".$id_user;




        $update=$connexion->prepare("
            UPDATE rechargement SET valide=1 WHERE id_rechargement=:id_rechargement
        ");

        $update->bindValue(':id_rechargement',$id_rechargement,PDO::PARAM_INT);
        $update->execute();

    }




    public static function  maxDate($date1,$date2)
    {
        $connexion=DAO::getConnection();
        $requete_comparaison=$connexion->prepare("SELECT :date1<:date2 as result");
        $requete_comparaison->bindValue(':date1',$date1,PDO::PARAM_STR);
        $requete_comparaison->bindValue(':date2',$date2,PDO::PARAM_STR);
        $requete_comparaison->execute();

        $reponse_comparaison=$requete_comparaison->fetch();

        return $reponse_comparaison['result']==1?$date2:$date1;
    }



    public static function getOffre()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->query("SELECT * FROM offres WHERE effacer=0 ORDER BY nombre_sms ");
        //$requete->execute();
        return $requete->fetchAll();
    }



    public static function getSouscriptionValide()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->query("SELECT *, DATE_FORMAT(date_rechargement,'%d-%m-%Y %H:%i:%s') as la_date FROM rechargement r, offres o, users u WHERE valide=1 AND u.user_id=r.id_user AND r.id_offre=o.id_offre ORDER BY date_rechargement DESC");
        return $requete->fetchAll();
    }

    public static function getSouscriptionEnCours()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->query("SELECT *, DATE_FORMAT(date_rechargement,'%d-%m-%Y %H:%i:%s') as la_date FROM rechargement r, offres o, users u  WHERE valide=0 AND u.user_id=r.id_user AND r.id_offre=o.id_offre ORDER BY date_rechargement DESC");
        return $requete->fetchAll();
    }



    public static function deleteContactInGroup($id_contact,$id_groupe)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            DELETE FROM contact_groupe WHERE id_contact=:id_contact AND id_groupe=:id_groupe
        ");

        $requete->bindValue(':id_contact',$id_contact,PDO::PARAM_INT);
        $requete->bindValue(':id_groupe',$id_groupe,PDO::PARAM_INT);
        $requete->execute();

    }


    public static function insertContactInGroup($id_contact,$id_groupe)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            INSERT INTO contact_groupe (id_contact,id_groupe) VALUES (:id_contact,:id_groupe)
        ");

        $requete->bindValue(':id_contact',$id_contact,PDO::PARAM_INT);
        $requete->bindValue(':id_groupe',$id_groupe,PDO::PARAM_INT);
        $requete->execute();

    }


    public static function recharger($id_user,$quantite,$id_offre)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            INSERT INTO rechargement (quantite, id_user, id_offre) VALUES (:quantite, :id_user, :id_offre)
        ");

        $requete->bindValue(':id_user',$id_user,PDO::PARAM_INT);
        $requete->bindValue(':id_offre',$id_offre,PDO::PARAM_INT);
        $requete->bindValue(':quantite',$quantite,PDO::PARAM_INT);
        $requete->execute();
        echo 'fini '.$requete->rowCount();

    }


    public static function getNumber($texte)
    {

        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            SELECT * FROM contact WHERE numero=:numero
        ");

        $requete->bindValue(':numero',$texte,PDO::PARAM_STR);
        $requete->execute();


        if($requete->rowCount()!=0)
        {
            $reponse=$requete->fetch();
            echo $reponse['numero'];

        }
        else
        {
            $requete2=$connexion->prepare("
               SELECT * FROM contact WHERE nom=:nom
            ");

            $requete2->bindValue(':nom',$texte,PDO::PARAM_STR);
            $requete2->execute();

            if($requete2->rowCount()!=0)
            {
                $reponse2=$requete2->fetch();
                echo $reponse2['numero'];

            }
            else
            {
                echo $texte;
            }

        }


    }




    public static function getNumberReturn($texte)
    {

        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            SELECT * FROM contact WHERE numero=:numero
        ");

        $requete->bindValue(':numero',$texte,PDO::PARAM_STR);
        $requete->execute();


        if($requete->rowCount()!=0)
        {
            $reponse=$requete->fetch();
            return $reponse['numero'];

        }
        else
        {
            $requete2=$connexion->prepare("
               SELECT * FROM contact WHERE nom=:nom
            ");

            $requete2->bindValue(':nom',$texte,PDO::PARAM_STR);
            $requete2->execute();

            if($requete2->rowCount()!=0)
            {
                $reponse2=$requete2->fetch();
                return $reponse2['numero'];

            }
            else
            {
                return $texte;
            }

        }
    }




    public static function getNumberMsg($message)
    {

        $nombre_lettre_msg=strlen($message);
        $nombre=0;

        $nombre=intval($nombre_lettre_msg/DAO::$number_charactere_per_message);
        $reste=$nombre_lettre_msg%DAO::$number_charactere_per_message;

        if($reste!=0)
        {
            $nombre++;
        }
        return $nombre;
    }


    public static function getNumberFromGroup($group_idOfGroup)
    {
        // $group_idOfGroup : ///id_groupe1///id_groupe2///...///id_groupeN
        $contacts="";

        $connexion=DAO::getConnection();
        $groupes=explode("///",$group_idOfGroup);
        foreach ($groupes as $groupe_id)
        {
            if(!empty(trim($groupe_id)))
            {
                $query=$connexion->prepare("SELECT numero FROM contact WHERE id_contact IN(SELECT id_contact FROM contact_groupe WHERE id_groupe=:id_groupe)");
                $query->bindValue(':id_groupe',$groupe_id);
                $query->execute();

                while($reponse=$query->fetch())
                {
                    $contacts.="///".$reponse['numero'];
                }


                //echo $query->rowCount()."  ";
            }

        }

        //echo $contacts;



        return explode("///",$contacts);
    }





    public static function no_accent($chaine) {
        $pattern = array("/é/", "/è/", "/ê/", "/ë/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
        $replacement_chaine = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o", " ");
        $nouvelle_chaine = preg_replace($pattern, $replacement_chaine, $chaine);
        return $nouvelle_chaine;

        str_replace("â","a",$_GET['message']);
}



    public static function replace($chaine) {
        $pattern = array("é", "è", "ê", "ë", "ç", "à", "â", "î", "ï", "ù", "ô");
        $replacement_chaine = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o");

        for($i=0;$i<sizeof($pattern);$i++)
        {
            $chaine=str_replace($pattern[$i],$replacement_chaine[$i],$chaine);
        }
        //$nouvelle_chaine = preg_replace($pattern, $replacement_chaine, $chaine);
        return $chaine;
    }


//  éèêëçàâîïùô


}