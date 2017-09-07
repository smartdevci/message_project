<div class="row-fluid">

    <div class="span6">
        <!-- block -->


        <div class="block">
           <!-- <div class="text-right">
                <span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" style="cursor:pointer">Ajouter groupe
                </span>

            </div>-->





            <div class="row modal fade" role="dialog" id="add_groupe">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajout de nouveau groupe</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <center class="row">
                                        <input class="nom_groupe_ajouter" type="text" name="nom_groupe" placeholder="Nom" />
                                    </center>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_add_groupe" data-dismiss="modal" " >VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>





<!--            <div class="block">-->
            <div class="navbar navbar-inner block-header">
               <div class="muted pull-left"><b>Offres&emsp;</b> <!--<span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span>--></div>
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format(sizeof($liste_offre),0,","," ") ?></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped tableau_groupe" style="cursor: pointer">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Offres</th>
                        <th>Nombre de sms</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=1;
                    foreach ($liste_offre as $offre)
                    {
                        ?>
                        <tr class="ligne_offre<?php echo $offre['id_offre'] ?>" data-id="<?php echo $offre['id_offre'] ?>" title="Cliquez pour ">
                            <td class="colonne" data-id="<?php echo $offre['id_offre'] ?>" data-name="<?php echo $offre['nom_offre'] ?>">
                                <?php echo $j ?>
                            </td>
                            <td class="nom_offre colonne" data-id="<?php echo $offre['id_offre'] ?>" data-name="<?php echo $offre['nom_offre'] ?>">
                                <?php echo $offre['nom_offre'] ?>
                            </td>
                            <td class="nombre_sms colonne" data-id="<?php echo $offre['id_offre'] ?>" data-name="<?php echo $offre['nom_offre'] ?>">
                                <?php echo number_format($offre['nombre_sms'],0,","," ") ?>
                            </td>
                            <td class="prix colonne" data-id="<?php echo $offre['id_offre'] ?>" data-name="<?php echo $offre['nom_offre'] ?>">
                                <?php echo number_format($offre['prix'],0,","," ") ?>
                            </td>
                            <td>
                                <!--<span  data-toggle="modal" data-target="#gerer_groupe" class="voir_groupe voir_groupe<?php echo $offre['id_offre'] ?> icon-user" style="cursor: pointer" title="Gerer les contacts du groupe <?php echo $offre['nom_offre'] ?>"  data-id="<?php echo $offre['id_offre'] ?>"></span>-->
                                <span
                                        data-toggle="modal"
                                        data-target="#souscription<?php echo $offre['id_offre'] ?>"
                                        class="commander commander<?php echo $offre['id_offre'] ?> icon-arrow-right"
                                        style="cursor: pointer" title="Souscrire à  l'offre <?php echo $offre['nom_offre'] ?>"
                                        data-id="<?php echo $offre['id_offre'] ?>"
                                        data-pack="<?php echo $offre['nombre_sms'] ?>"
                                ></span>
                            </td>
                        </tr>





                        <div class="row modal fade" role="dialog" id="souscription<?php echo $offre['id_offre'] ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Souscription à l'offre <?php echo $offre['nom_offre'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <center class="row">
                                                    Votre demande de souscription a été envoyé,
                                                    <br/>
                                                    Le service commercial vous contactera pour la confirmation
                                                </center>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location="">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $j++;
                    }
                    ?>










                    <div class="row modal fade" role="dialog" id="gerer_groupe">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Gerer les contact du groupe <?php echo $offre['nom_offre'] ?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <center class="row">
                                                <p class="contenu_gestion_groupe">

                                                </p>
                                            </center>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                   <button type="button" class="btn btn-default actualiser_page" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </tbody>
                </table>
            </div>
<!--        </div>-->
        <!-- /block -->
    </div>
</div>









    <div class="span6">
        <!-- block -->


        <div class="block">
            <!-- <div class="text-right">
                 <span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" style="cursor:pointer">Ajouter groupe
                 </span>

             </div>-->





            <div class="row modal fade" role="dialog" id="add_groupe">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajout de nouveau groupe</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <center class="row">
                                        <input class="nom_groupe_ajouter" type="text" name="nom_groupe" placeholder="Nom" />
                                    </center>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_add_groupe" data-dismiss="modal" " >VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>





            <!--            <div class="block">-->
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Souscriptions anterieures
                        &emsp;</b> <!--<span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span>--></div>
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format(sizeof($liste_souscription),0,","," ") ?></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped tableau_groupe" style="cursor: pointer">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Offres</th>
                        <th>Nombre de sms</th>
                        <th>Prix</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=1;
                    foreach ($liste_souscription as $souscription)
                    {
                        ?>
                        <tr >
                            <td >
                                <?php echo $j ?>
                            </td>
                            <td >
                                <?php echo $souscription['la_date'] ?>
                            </td>
                            <td >
                                <?php echo $souscription['nom_offre'] ?>
                            </td>
                            <td >
                                <?php echo $souscription['nombre_sms'] ?>
                            </td>
                            <td >
                                <?php echo $souscription['prix'] ?>
                            </td>
                            <td >
                                <?php echo ($souscription['valide']==0)?"Attente de validation":"Validé" ?>
                            </td>


                        </tr>


                        <?php
                        $j++;
                    }
                    ?>




                    </tbody>
                </table>
            </div>
            <!--        </div>-->
            <!-- /block -->
        </div>
    </div>


</div>
