<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 16:28
 */
class Contact
{

    public $id;
    public $name;
    public $number;
    public $owner;

    public function __construct($name,$number,$owner)
    {
        $this->id=0;
        $this->name=$name;
        $this->number=$number;
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

    public function setNumber($number)
    {
        $this->number=$number;
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

    public function getNumber()
    {
        return $this->number;
    }

    public function getOwner()
    {
        return $this->owner;
    }


    /************FUNCTIONS******************/
    public function register()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("INSERT INTO contact(nom, numero, id_user) VALUES (:nom, :numero, :id_user)");
        $requete->bindValue(":nom",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":numero",$this->getNumber(),PDO::PARAM_STR);
        $requete->bindValue(":id_user",$this->getOwner(),PDO::PARAM_INT);
        $requete->execute();
        $this->setId($connexion->lastInsertId());
    }


    public function update()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("UPDATE contact SET nom=:nom, numero=:numero WHERE id_contact=:id_contact");
        $requete->bindValue(":nom",$this->getName(),PDO::PARAM_STR);
        $requete->bindValue(":numero",$this->getNumber(),PDO::PARAM_STR);
        $requete->bindValue(":id_contact",$this->getId(),PDO::PARAM_INT);
        $requete->execute();
    }




    public function delete()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("DELETE FROM contact WHERE id_contact=:id_contact");
        $requete->bindValue(":id_contact",$this->getId(),PDO::PARAM_INT);
        $requete->execute();

        $requete=$connexion->prepare("DELETE FROM contact_groupe WHERE id_contact=:id_contact");
        $requete->bindValue(":id_contact",$this->getId(),PDO::PARAM_INT);
        $requete->execute();


    }



    public static function getContactFromNumberOrName($texte)
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("(SELECT * FROM contact WHERE numero=:numero) UNION(SELECT * FROM contact WHERE nom=:nom)");
        $requete->bindValue(":numero",$texte,PDO::PARAM_STR);
        $requete->bindValue(":nom",$texte,PDO::PARAM_STR);
        $requete->execute();

        if($reponse=$requete->fetch())
        {
            $contact=new Contact($reponse['nom'],$reponse['numero'],$reponse['id_user']);
        }
        else
        {
            $contact=new Contact($texte,$texte,0);
        }
        return $contact;

    }







}