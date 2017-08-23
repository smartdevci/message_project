<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 13:25
 */
session_start();
var_dump($_SESSION);
require_once '../_class/all_class.php';
$nom=$_GET['nom'];
$owner=$_SESSION['com_message__id'];
$groupe=new Groupe($nom,$owner);
$groupe->register();

?>

<tr class="ligne_contact<?php echo $groupe->getId() ?>">
    <td>*</td>
    <td class="nom"><?php echo htmlspecialchars($groupe->getName()) ?></td>
    <td class="numero">0</td>
    <td>
        <!--<span class="modifier_contact modifier_contact<?php echo $groupe->getId() ?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class=" icon-ok validate_modification validate_modification<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class=" icon-remove cancel_modification cancel_modification<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php echo $groupe->getId() ?>"></span>
        <span class="icon-trash delete_contact delete_contact<?php echo $groupe->getId() ?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php echo $groupe->getId() ?>"></span>-->

    </td>
</tr>