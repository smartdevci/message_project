<div class="row-fluid">

    <div class="span12">
        <!-- block -->


        <div class="block">
           <!-- <div class="text-right">
                <span  data-toggle="modal" data-target="#add_offre" title="Ajouter nouveau offre" style="cursor:pointer">Ajouter offre
                </span>

            </div>-->





            <div class="row modal fade" role="dialog" id="add_offre">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajout de nouvelle offre</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <center class="row">
                                        <input class="nom_offre_ajouter" type="text" name="nom_offre" placeholder="Nom Offre" />
                                        <br/>
                                        <input class="nombre_sms_ajouter" type="text" name="nombre_sms" placeholder="Nombre SMS" />
                                        <br/>
                                        <input class="prix_ajouter" type="text" name="prix" placeholder="Prix" />
                                    </center>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_add_offre" data-dismiss="modal" " >VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>





<!--            <div class="block">-->
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>NOS OFFRES&emsp;</b><span  data-toggle="modal" data-target="#add_offre" title="Ajouter nouveau offre" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span></div>
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format(sizeof($liste_offres),0,","," ") ?></span></div>
            </div>

            <div class="block-content collapse in">

                <div class="row">

                    <?php
                    $j=1;
                    foreach ($liste_offres as $offres)
                    {
                    ?>

                    <div class="span3 ligne_offre<?php echo $offres['id_offre'] ?>" data-id="<?php echo $offres['id_offre'] ?>">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted text-center nom_offre colonne" style="font-size: 20px" data-id="<?php echo $offres['id_offre'] ?>" data-name="<?php echo $offres['nom_offre'] ?>">
                                <span class="pull-left modifier_offre modifier_offre<?php //echo $offres['id_offre'] ?> icon-pencil" style="cursor: pointer" title="Modifier le pack"  data-id="<?php // echo $offres['id_offre'] ?>"></span>
                                <span class="pull-left hidden icon-ok validate_modification_offre validate_modification_offre<?php //echo $offres['id_offre'] ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php// echo $offres['id_offre'] ?>"></span>

                                <?php echo $offres['nom_offre']; ?>

                                <span class="pull-right icon-trash delete_offre delete_offre<?php// echo $offres['id_offre'] ?>" style="cursor: pointer" title="Supprimer le pack"  data-id="<?php //echo $offres['id_offre'] ?>"></span>
                                <span class="pull-right hidden icon-remove cancel_modification_offre cancel_modification_offre<?php //echo $offres['id_offre'] ?>" style="cursor: pointer; margin-right: 10px" title="Annuler la modification"  data-id="<?php// echo $offres['id_offre'] ?>"></span>
                            </div>
                        </div>

                        <table class="tableau_offre table table-striped table-responsive text-center offre">
                            <tr>
                                <td class="nbsms nombre_sms colonne" data-id="<?php echo $offres['id_offre'] ?>" data-name="<?php echo $offres['nom_offre'] ?>">
                                    <?php echo number_format($offres['nombre_sms'],0,","," "); ?> SMS
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px">
                                    <?php echo number_format($offres['prix']/$offres['nombre_sms'],0,","," ") ?> Fcfa/SMS
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px">Validité : 3 mois</td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px">Couverture internationale</td>
                            </tr>
                            <tr>
                                <td class="cmd prix colonne" data-id="<?php echo $offres['id_offre'] ?>" data-name="<?php echo $offres['nom_offre'] ?>" style="color: #10adb9; font-size: 20px; font-weight: bold">
                                    <?php echo number_format($offres['prix'],0,","," ") ?> FCFA
                                </td>
                            </tr>
                        </table>

                    </div>

                    <?php
                        $j++;
                    }
                    ?>


<!--
                <table class="table table-striped tableau_offre col-lg-12 col-xs-12" style="cursor: pointer"  >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom offre</th>
                        <th>Nombre de sms</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
/*                    $j=1;
                    foreach ($liste_offres as $offres)
                    {
                        */?>
                        <tr class="ligne_offre<?php /*echo $offres['id_offre'] */?>" data-id="<?php /*echo $offres['id_offre'] */?>">

                            <td class="colonne" data-id="<?php /*echo $offres['id_offre'] */?>" data-name="<?php /*echo $offres['nom_offre'] */?>">
                                <?php /*echo $j */?>
                            </td>
                            <td class="nom_offre colonne" data-id="<?php /*echo $offres['id_offre'] */?>" data-name="<?php /*echo $offres['nom_offre'] */?>">
                                <?php /*echo $offres['nom_offre'] */?>
                            </td>
                            <td class="nombre_sms colonne" data-id="<?php /*echo $offres['id_offre'] */?>" data-name="<?php /*echo $offres['nom_offre'] */?>">
                                <?php /*echo number_format($offres['nombre_sms'],0,","," ") */?>
                            </td>
                            <td class="prix colonne" data-id="<?php /*echo $offres['id_offre'] */?>" data-name="<?php /*echo $offres['nom_offre'] */?>">
                                <?php /*echo number_format($offres['prix'],0,","," ") */?>
                            </td>
                            <td>
                                <span class="modifier_offre modifier_offre<?php /*echo $offres['id_offre'] */?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php /*echo $offres['id_offre'] */?>"></span>
                                <span class="hidden icon-ok validate_modification_offre validate_modification_offre<?php /*echo $offres['id_offre'] */?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php /*echo $offres['id_offre'] */?>"></span>
                                <span class="hidden icon-remove cancel_modification_offre cancel_modification_offre<?php /*echo $offres['id_offre'] */?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php /*echo $offres['id_offre'] */?>"></span>
                                <span class="icon-trash delete_offre delete_offre<?php /*echo $offres['id_offre'] */?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php /*echo $offres['id_offre'] */?>"></span>
                            </td>

                        </tr>
                        <?php
/*                        $j++;
                    }
                    */?>

-->








                </div>

            </div>
<!--        </div>-->
        <!-- /block -->
    </div>
</div>


</div>



















