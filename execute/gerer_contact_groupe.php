<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 23:20
 */


require_once '../dashboard/modele/modele_gerer_contact_groupe.php';
//Total des contact##nom du groupe##données
?>


<table>

    <thead>
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Numero</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($liste_contact as $contact)
    {
        ?>
        <tr class="ligne_contact<?php echo $contact['id_contact'] ?>">
            <td>
                <input type="checkbox" <?php echo (in_array($contact['id_contact'],$liste_contact_id_groupe)?"checked":"") ?>
                    data-id_contact="<?php echo $contact['id_contact'] ?>"
                    data-id_groupe="<?php echo $groupe ?>"
                    class="contact_dans_groupe"
                />

            </td>
            <td class="nom"><?php echo htmlspecialchars($contact['nom']) ?></td>
            <td class="numero"> <?php echo htmlspecialchars($contact['numero']) ?></td>
            <td>
                <span class="modifier_contact modifier_contact<?php echo $contact['id_contact'] ?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                <span class="hidden icon-ok validate_modification validate_modification<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                <span class="hidden icon-remove cancel_modification cancel_modification<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                <span class="icon-trash delete_contact delete_contact<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>

            </td>
        </tr>
        <?php
        $i++;
    }
    ?>


    </tbody>

</table>

