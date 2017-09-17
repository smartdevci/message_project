<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 17/09/2017
 * Time: 16:51
 */
class Fonctions
{

    /*********************************************TABLEAU**************************************************************/
    /*********************************************TABLEAU**************************************************************/
    /*********************************************TABLEAU**************************************************************/
    /**
     *
     */
    public static function searchInArray($array,$value)
    {
        $position=trim((string)array_search($value, $array));
       // echo " / position : '".$value."' = ".$position." retour = ".((empty($position))?-1:$position)."<br/><br/>";
        return ($position=="")?-1:$position;
    }


    /**
     * Fusionner un tableau sans doublon
     */
    public static function mergeNotDuplicate(array $array1,array $array2)
    {
        $array_result=array();

        foreach ($array1 as $val)
        {
            array_push($array_result,$val);
        }

        foreach ($array2 as $val)
        {
            $recherche=Fonctions::searchInArray($array_result,$val);

            $boolean=$recherche=="-1";
            if($boolean)
            {
                array_push($array_result,$val);
            }
        }

        return $array_result;

    }

}