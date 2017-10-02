<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
//var_dump($_SESSION);
require_once '../_class/all_class.php';
$nom_offre=$_GET['nom_offre'];
$nombre_sms=$_GET['nombre_sms'];
$prix=$_GET['prix'];
$delai_jour=$_GET['delai'];

$offre=new Offre($nom_offre,$prix,$nombre_sms,$delai_jour);
/*echo "no : ".$offre->validate_nbre_jour."===/".$offre->getValidateJour()."/===";
echo "ouiiiiiiiiiiiiii";
echo "/".$offre->getName()."/";
echo "/".$offre->getPrice()."/";
echo "/".$offre->getNumberMsg()."/";
echo "/".$offre->validate_nbre_jour."/";
echo "/".$offre->getId()."/";

var_dump($offre);
*/
$offre->register();

?>

<tr class="ligne_contact<?php echo $offre->getId() ?>">
    <td>*</td>
    <td class="nom"><?php echo htmlspecialchars($offre->getName()) ?></td>
    <td class="nombre_sms"><?php echo $offre->getNumberMsg() ?></td>
    <td class="prix"><?php echo htmlspecialchars($offre->getPrice()) ?></td>
    <td>
        <!--<span class="modifier_contact modifier_contact<?php echo $groupe->getId() ?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class=" icon-ok validate_modification validate_modification<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class=" icon-remove cancel_modification cancel_modification<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class="icon-trash delete_contact delete_contact<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php echo $groupe->getId() ?>"></span>-->

    </td>
</tr>