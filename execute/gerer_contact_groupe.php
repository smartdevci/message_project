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
        <th>#</th>
        <th>Nom</th>
        <th>Numero</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($liste_contact as $contact)
    {
        ?>
        <tr class="ligne_contact<?php echo $contact['id_contact'] ?>">
            <td></td>
            <td>
                <input type="checkbox" <?php echo (in_array($contact['id_contact'],$liste_contact_id_groupe)?"checked":"") ?>
                    data-id_contact="<?php echo $contact['id_contact'] ?>"
                    data-id_groupe="<?php echo $groupe ?>"
                    class="contact_dans_groupe"
                />

            </td>
            <td class="nom"><?php echo htmlspecialchars($contact['nom']) ?></td>
            <td class="numero"> <?php echo htmlspecialchars($contact['numero']) ?></td>

        </tr>
        <?php
        $i++;
    }
    ?>


    </tbody>

</table>

