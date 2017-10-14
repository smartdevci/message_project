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
                            <button type="button" class="btn btn-default bouton_add_groupe" data-dismiss="modal">VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>





            <!--            <div class="block">-->
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Souscriptions en cours
                        &emsp;</b> <!--<span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span>--></div>
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format(sizeof($liste_souscription_en_cours),0,","," ") ?></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped tableau_groupe" style="cursor: pointer">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Offres</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=1;
                    foreach ($liste_souscription_en_cours as $souscription_en_cours)
                    {
                        ?>
                        <tr >
                            <td >
                                <?php echo $j ?>
                            </td>
                            <td >
                                <?php echo $souscription_en_cours['la_date'] ?>
                            </td>
                            <td >
                                <?php echo $souscription_en_cours['nom'] ?>
                            </td>
                            <td >
                                <?php echo $souscription_en_cours['email'] ?>
                            </td>
                            <td title="<?php echo $souscription_en_cours['nombre_sms'] ?>">
                                <?php echo $souscription_en_cours['nom_offre'] ?>
                            </td>
                           <td >
                                <?php echo $souscription_en_cours['prix'] ?>
                            </td>

                            <td>
                                <button
                                        class="btn btn-success valider_souscription"
                                        title="Valider souscription"
                                        style="cursor: pointer"
                                        data-id="<?php echo $souscription_en_cours['id_rechargement'] ?>"
                                        data-pack="<?php echo $souscription_en_cours['nombre_sms'] ?>"
                                >
                                    <span> Valider</span>
                                </button>
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
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Offres</th>
                        <th>Prix</th>

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
                                <?php echo $souscription['nom'] ?>
                            </td>
                            <td >
                                <?php echo $souscription['email'] ?>
                            </td>
                            <td title="<?php echo $souscription['nombre_sms'] ?> SMS" >
                                <?php echo $souscription['nom_offre'] ?>
                            </td>
                            <td >
                                <?php echo $souscription['prix'] ?>
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
