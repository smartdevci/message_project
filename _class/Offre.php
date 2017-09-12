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


    public function __construct($name,$price,$number_msg)
    {
        $this->id=0;
        $this->name=$name;
        $this->price=$price;
        $this->number_msg=$number_msg;

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
        return $this->price;
    }

    public function getNumberMsg()
    {
        return $this->number_msg;
    }


    /************FUNCTIONS******************/
    public function register()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("INSERT INTO offres(nom_offre, nombre_sms, prix) VALUES (:nom_offre, :nombre_sms, :prix)");
        $requete->bindValue(":nom_offre",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":nombre_sms",$this->getNumberMsg(),PDO::PARAM_INT);
        $requete->bindValue(":prix",$this->getPrice(),PDO::PARAM_INT);
        $requete->execute();
        $this->setId($connexion->lastInsertId());
    }


    public function update()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("UPDATE groupe SET nom_groupe=:nom WHERE id_groupe=:id_groupe");
        $requete->bindValue(":nom",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":id_groupe",$this->getId(),PDO::PARAM_INT);
        $requete->execute();

    }




    public function delete()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("UPDATE offres SET effacer=1 WHERE id_offre=:id_offre");
        $requete->bindValue(":id_offre",$this->getId(),PDO::PARAM_INT);
        $requete->execute();




    }







}