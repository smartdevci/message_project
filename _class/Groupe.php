<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 16:28
 */
class Groupe
{

    public $id;
    public $name;
    public $owner;

    public function __construct($name,$owner)
    {
        $this->id=0;
        $this->name=$name;
        $this->owner=$owner;
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


    public function setOwner($owner)
    {
        $this->owner=$owner;
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


    public function getOwner()
    {
        return $this->owner;
    }


    /************FUNCTIONS******************/
    public function register()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("INSERT INTO groupe(nom_groupe, id_user) VALUES (:nom, :id_user)");
        $requete->bindValue(":nom",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":id_user",$this->getOwner(),PDO::PARAM_INT);
        $requete->execute();
        $this->setId($connexion->lastInsertId());
        echo 'okkkk';
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
        $requete=$connexion->prepare("DELETE FROM groupe WHERE id_groupe=:id_groupe");
        $requete->bindValue(":id_groupe",$this->getId(),PDO::PARAM_INT);
        $requete->execute();

        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("DELETE FROM contact_groupe WHERE id_groupe=:id_groupe");
        $requete->bindValue(":id_groupe",$this->getId(),PDO::PARAM_INT);
        $requete->execute();


    }







}