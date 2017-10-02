<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 16:28
 */
class Offre
{

    public $id;
    public $name;
    public $price;
    public $number_msg;
    public $validate_nbre_jour;


    public function __construct($name,$price,$number_msg,$nb_jr)
    {
        $this->id=0;
        $this->name=$name;
        $this->price=$price;
        $this->number_msg=$number_msg;
        $this->validate_nbre_jour=$nb_jr;

        //echo "ici ".$name."/".$price."/".$number_msg."/".$this->validate_nbre_jour."/////////////";

    }



    /************SETTER****************/
    public function setId($id)
    {
        $this->id=$id;
    }

    public function setName($name)
    {
        $this->name=$name;
    }


    public function setPrice($price)
    {
        $this->pricce=$price;
    }

    public function setNumberMsg($number)
    {
        $this->number_msg=$number;
    }

    public function setValidateJour($number_of_jour)
    {
        $this->validate_nbre_jour=$number_of_jour;
    }


    /************GETTER****************/
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getPrice()
    {
        return intval($this->price);
    }

    public function getNumberMsg()
    {
        return intval($this->number_msg);
    }


    public function getValidateJour()
    {
        $this->validate_nbre_jour;
    }



    /************FUNCTIONS******************/
    public function register()
    {
        $connexion=DAO::getConnection();
        //echo $this->getValidateJour();
        $url="INSERT INTO offres(nom_offre, nombre_sms, validate_nbre_jour, prix) VALUES (:nom_offre, :nombre_sms, :validate_nbre_jour, :prix)";
        //echo $url;
        $requete=$connexion->prepare($url);
        $requete->bindValue(":nom_offre",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":nombre_sms",$this->getNumberMsg(),PDO::PARAM_INT);
        $requete->bindValue(":prix",$this->getPrice(),PDO::PARAM_INT);
        $requete->bindValue(":validate_nbre_jour",$this->validate_nbre_jour,PDO::PARAM_INT);
        $requete->execute();
        $this->setId($connexion->lastInsertId());
    }


    public function update()
    {
        $connexion=DAO::getConnection();
        //$query="UPDATE offres SET nom_offre='".$this->getName()."',nombre_sms=".intval($this->getNumberMsg()).", prix=".intval($this->getPrice())." WHERE id_offre=".$this->getId();
        //echo $query;
       $query="UPDATE offres SET nom_offre=:nom,nombre_sms=:nombre_sms, prix=:price WHERE id_offre=:id_offre";
        $requete=$connexion->prepare($query);
        $requete->bindValue(":nom",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":nombre_sms",$this->getNumberMsg(),PDO::PARAM_INT);
        $requete->bindValue(":price",$this->getPrice(),PDO::PARAM_INT);
        $requete->bindValue(":id_offre",$this->getId(),PDO::PARAM_INT);
        var_dump($requete);
        //$requete->execute();
        //echo $requete->rowCount();


        //echo $this->getName()."/".$this->getNumberMsg()."/".$this->getPrice()."/".$this->getId()."/".$query;

    }




    public function delete()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("UPDATE offres SET effacer=1 WHERE id_offre=:id_offre");
        $requete->bindValue(":id_offre",$this->getId(),PDO::PARAM_INT);
        $requete->execute();




    }







}