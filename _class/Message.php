<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 12:28
 */
class Message
{

    public $contenu;
    public $destinataire;
    public $id_user;
    public $expediteur_nom;
    public $date;


    public function __construct($contenu,$destinataire,$date)
    {
        $this->setContenu($contenu);
        $this->setDestinataire($destinataire);
        $this->setDate($date);
    }

    /**********GETTER**************/
    public function getContenu()
    {
        return $this->contenu;
    }

    public function getDestinataire()
    {
        return $this->destinataire;
    }


    public function getDate()
    {
        return $this->date;
    }



    /***************SETTER*************/
    public function setContenu($contenu)
    {
        $this->contenu=$contenu;
    }

    public function setDestinataire($destinataire)
    {
        $this->destinataire=$destinataire;
    }


    public function setDate($date)
    {
        $this->date=$date;
    }



    public function show()
    {
        print(htmlspecialchars($this->contenu));
    }



}