<?php
/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 22/08/2017
 * Time: 23:20
 */


require_once '../dashboard/modele/modele_gerer_groupe_groupe.php';
//Total des groupe##nom du groupe##données
?>


<table class="table table-striped">

    <thead>
    <tr>
        <th></th>
        <th></th>
        <th><input type="checkbox" data-id_groupe="tout" class="selectionner_tout_groupe"/></th>
        <th><span class="status_groupe">Selectionner</span> tous les groupe</th>
        <th></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach($liste_groupe as $groupe)
    {
        ?>
        <tr class="ligne_groupe<?php echo $groupe['id_groupe'] ?>">
            <td></td>
            <td></td>
            <td>
                <input type="checkbox" data-groupe="<?php echo $groupe['nom_groupe'] ?>"  data-id="<?php echo $groupe['id_groupe'] ?>" class="boutonCocherGroupe" />
            </td>
            <td class="nom"><?php echo trim(htmlspecialchars($groupe['nom_groupe'])) ?></td>
            <td class="numero"> <?php // echo trim(htmlspecialchars($groupe['numero'])) ?></td>

        </tr>
        <?php
        $i++;
    }
    ?>


    </tbody>

</table>

