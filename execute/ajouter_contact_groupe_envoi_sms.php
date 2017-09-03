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


<table class="table table-striped">

    <thead>
    <tr>
        <th></th>
        <th></th>
        <th><input type="checkbox" data-id_contact="tout" class="selectionner_tout_contact"/></th>
        <th><span class="status_contact">Selectionner</span> tous les contacts</th>
        <th></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach($liste_contact as $contact)
    {
        ?>
        <tr class="ligne_contact<?php echo $contact['id_contact'] ?>">
            <td></td>
            <td></td>
            <td>
                <input type="checkbox" data-contact="<?php echo $contact['nom'] ?>"  data-numero="<?php echo $contact['numero'] ?>" class="boutonCocher" />
            </td>
            <td class="nom"><?php echo trim(htmlspecialchars($contact['nom'])) ?></td>
            <td class="numero"> <?php echo trim(htmlspecialchars($contact['numero'])) ?></td>

        </tr>
        <?php
        $i++;
    }
    ?>


    </tbody>

</table>

