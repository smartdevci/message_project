<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");

$_SESSION['page'] = "envoi";
require_once 'modele/modele_envoi.php';
$tableau_contact=$liste_contact;


?>


<!DOCTYPE html>
<html class="no-js">

<head>
    <?php
    //  FICHIER CSS ET JS
    require_once 'Inc/head.php';
    ?>


<!--    -->
    <style>
    /*    POPUP CONTAINER    */
        .popup{
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }


        /* ACTUEL POPUP */
        .popup .popupText{
            visibility: hidden;
            width: 800px;
            /*min-height: 400px;*/
            background-color: #555555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 10px;
            position: absolute;
            z-index: 10;
            bottom: 125%;
            left: 5%;
            margin-left: -80px;
        }


        /* POPUP ARROW */
        .popup .popupText::after{
            content: '';
            position: absolute;
            top: 100%;
            left: 10%;
            margin-left: 5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }


        /* AFFICHER ET CACHER LE POPUP */
        .popup .show{
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            -o-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }


        /* AJOUTER L'ANIMATION AU POPUP */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
    </style>

</head>

<body>
<?php
// BARRE DE NAVIGATION
include_once 'Inc/navbar.php';
?>
<div class="container-fluid">
    <div class="row-fluid">

        <?php
        //  MENU LATTERAL
        include_once 'Inc/sidebar.php';
        ?>
        <!--/span-->
        <div class="span9" id="content">

            <?php
            // REDUIRE / AGRANDIR
            include_once 'Inc/reduire.php';
            ?>
            <div class="hidden">
                <?php  var_dump($tableau_contact);?>
            </div>


            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Envoyez vos sms ici</div>
                    </div>

                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" method="get" action="authsms.php">
                                <fieldset>
                                    <legend class="text-center" style="color: #006dcc; font-weight: 600;margin-bottom: 40px;">SMS-Notifier garantit la transmission de vos SMS</legend>
                                    <div class="clearfix"></div>
                                    <!-- NUMERO ET MESSAGES -->
                                    <div class="row">
                                        <div class="span8">
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Nom Expéditeur </label>
                                                <div class="controls">
                                                    <input type="text" name="sender" class="span6 sender" value="<?php echo $expeditor_name ?>"  readonly id="typeahead" placeholder="Nom de l'expéditeur"  data-provide="typeahead" data-items="4" style="height: 40px">





                                                    <!------------------------------------------------------------------------------------------>
                                                                     <!---  MODAL DE SELECTION DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>

                                                    <div class="row modal fade" role="dialog" id="ajouter_contact">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"> Selectionner les contacts</h4>
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

                                                    <!------------------------------------------------------------------------------------------>
                                                                        <!---  FIN MODAL DE SELECTION DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>





                                                    <!------------------------------------------------------------------------------------------>
                                                                        <!---  MODAL DE SELECTION DE GROUPE DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>

                                                    <div class="row modal fade" role="dialog" id="ajouter_groupe">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"> Selectionner les groupe <a class="test"></a> </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <center class="row">
                                                                                <p class="contenu_gestion_groupe_groupe">

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

                                                    <!------------------------------------------------------------------------------------------>
                                                                            <!---  FIN MODAL DE SELECTION DE GROUPE DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>




                                                    <!------------------------------------------------------------------------------------------>
                                                                            <!---  MODAL TUTORIEL D'UTILISATION  -->
                                                    <!------------------------------------------------------------------------------------------>



                                                </div>
                                                <div class="controls">
<!--                                                    <input type="text" name="sender" class="span6 sender" value="--><?php //echo $expeditor_name ?><!--"  readonly id="typeahead" placeholder="Nom de l'expéditeur"  data-provide="typeahead" data-items="4" style="height: 40px">-->





                                                    <!------------------------------------------------------------------------------------------>
                                                                     <!---  MODAL DE SELECTION DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>

                                                    <div class="row modal fade" role="dialog" id="ajouter_contact">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"> Selectionner les contacts</h4>
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

                                                    <!------------------------------------------------------------------------------------------>
                                                                        <!---  FIN MODAL DE SELECTION DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>





                                                    <!------------------------------------------------------------------------------------------>
                                                                        <!---  MODAL DE SELECTION DE GROUPE DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>

                                                    <div class="row modal fade" role="dialog" id="ajouter_groupe">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"> Selectionner les groupe <a class="test"></a> </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <center class="row">
                                                                                <p class="contenu_gestion_groupe_groupe">

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

                                                    <!------------------------------------------------------------------------------------------>
                                                                            <!---  FIN MODAL DE SELECTION DE GROUPE DE CONTACT  -->
                                                    <!------------------------------------------------------------------------------------------>




                                                    <!------------------------------------------------------------------------------------------>
                                                                            <!---  MODAL TUTORIEL D'UTILISATION  -->
                                                    <!------------------------------------------------------------------------------------------>



                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="date01">No Destinataire(s)</label>
                                                <div class="controls">
                                                    <div class="popup">
                                                    <input type="text" id="contacts" list="liste_contact" name="recipient" class="span6 recipient controls" style="min-height: 40px; width: 200px;" onfocus="showPopup()"  placeholder="Saisir le nom ou numero et appuyer sur Entrer">
<!--                                                    style="width: 300px; min-height: 40px; position: relative; left: -160px; margin-right: -150px">&emsp;-->

                                                    <!------------------------------------------------------------------------------------------>
                                                    <!---  MODAL TUTORIEL D'UTILISATION  -->
                                                    <!------------------------------------------------------------------------------------------>

                                                    <span class="popupText" id="myTuto" style="">
                                                        Saisir l'indicatif téléphonique du pays de votre destinataire <b>(NB: sans le "+")</b> suivi du numéro de téléphone, Ex: 22501020304 pour Côte d'Ivoire.
                                                        Pour ajouter un second numéro, vous n'avez qu'à taper la touche <b>&laquo;Entrer&raquo;</b> du clavier de votre appareil après avoir saisi le premier numéro
                                                        tel qu'indiqué plus haut. Vos destinataires peuvent être dans différents pays.<br>
                                                        Pour supprimer un des numéros ajoutés, veuillez cliquer sur le numéro en question. Si vous avez déjà des contacts enregistrés, saisir simplement le nom du cantact
                                                        ou quelques chiffres du numéro et son nom s'affichera.
                                                    </span>

                                                    <!------------------------------------------------------------------------------------------>
                                                    <!---  FIN MODAL TUTORIEL D'UTILISATION  -->
                                                    <!------------------------------------------------------------------------------------------>


                                                    <span data-toggle="modal" data-target="#ajouter_contact" class="voir_groupe ajouter_contact_envoi_msg fa fa-user fa-2x" style="cursor: pointer; " title="Selectionner des contacts" data-id="1"></span>&emsp;
                                                    <span data-toggle="modal" data-target="#ajouter_groupe" class="voir_groupe  ajouter_groupe_envoi_msg  fa fa-users fa-2x" style="cursor: pointer; font-size: 1.8em;" title="Selectionner des groupes" data-id="1"></span>

                                                    <!-- <input type="button" class="ajouter_numero" value="Ajouter un contact" title="Ajouter à partir des contacts" />
                                                    <input type="button" class="hidden" value="Ajouter numero" title="Ajouter à partir des contacts" />-->

                                                    <div class="bouton_cacher_utilise hidden">
                                                        <button type="button" class="btn btn-primary texte_a_afficher les_contacts" data-nom="" data-toggle="button">Single toggle..</button>
                                                    </div>

                                                    <div>

                                                        <div class="liste_contacts_vue">
                                                            <!--LES NUMERO SONT VUE ICI -->
                                                        </div>

                                                        <div class="liste_groupes_vue">
                                                            <!--LES GROUPES SONT VUE ICI -->
                                                        </div>


                                                    </div>

                                                    <datalist id="liste_contact" class="liste_des_contact">
                                                        <?php
                                                        foreach ($liste_contact as $contact)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $contact['nom'] ?>"> <?php echo $contact['nom'] ?> : <?php echo $contact['numero'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </datalist>


                                                    <!--<textarea name="recipient"  class="input-xlarge textarea form-control recipient" id="date01" style="width: 85%; height: 70px" placeholder="Ex : 22507001122,22505667788,22541223355,..."></textarea>-->
        <!--                                            <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
                                                </div>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="textarea2">Message</label>
                                                <div class="controls">
                                                    <textarea name="message" class="input-xlarge textarea message_sms" placeholder="Entrer votre texte ..." style="width: 85%; height: 150px"></textarea>
                                                    <label style="margin-top: 10px;">Nombre de SMS : <span class="nombre_message"></span> &DoubleLongLeftRightArrow; Nombre de caractères : <span class="nombre_caractere"></span>
                                                    </label>
                                                    <div class="text-danger nombre_message_insuffisant " style="color:red">Le nombre de message que vous disposez est insuffisant pour envoyer ce(s) message(s)</div>
                                                    <div class="text-danger nombre_message_expiration " style="color:red">Vos messages ont expiré, veuillez recharger votre compte SMS pour envoyer des message(s)</div>

                                                </div>
                                            </div>
                                        </div>





                                        <!------------------------------------------------------------------------------------------>
                                        <!--- TABLEAU DETAIL SMS ENVOYES  -->
                                        <!------------------------------------------------------------------------------------------>

                                        <div class="span4">
                                            <div class="block">
                                                <div class="navbar navbar-inner block-header">
                                                    <div class="muted pull-left">Détails SMS envoyés</div>
                                                    <div class="pull-right"><span class="badge badge-info">1,234</span>

                                                    </div>
                                                </div>
                                                <div class="block-content collapse in">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>SMS envoyé</th>
                                                            <th>Expéditeur</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>15/08/2017</td>
                                                            <td>28</td>
                                                            <td>SmartDev</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>15/08/2017</td>
                                                            <td>57</td>
                                                            <td>SmartDev</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>02/08/2017</td>
                                                            <td>820</td>
                                                            <td>SmartDev</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!------------------------------------------------------------------------------------------>
                                        <!---  FIN TABLEAU DETAIL SMS ENVOYE  -->
                                        <!------------------------------------------------------------------------------------------>




                                        <input type="hidden" class="m" value="<?php echo $user->remaining_message ?>">
                                        <!--<div class="clearfix"></div>-->






                                        <!-- CONTACT ET GROUPE DE CONTACT -->
                                        <div class="span4 hidden sr-only">
                                            <ul class="nav nav-tabs">
                                                <li class=""><a data-toggle="tab" href="#"></a></li>
                                                <li class="active"><a data-toggle="tab" href="#contact">Contacts</a></li>
                                                <li><a data-toggle="tab" href="#groupeContact">Groupe de contacts</a></li>
                                            </ul>

                                            <!-- CONTACTS -->
                                            <div class="tab-content">
                                                <div id="contact" class="tab-pane fade in active" style="height: 200px; overflow: auto;">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nom & Prénom</th>
                                                                <th>No Téléphone</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Boué Melaine</td>
                                                                <td>22577105410</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Yao Sylvère</td>
                                                                <td>22507716971</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Lael Deboue</td>
                                                                <td>22546367314</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Boué Melaine</td>
                                                                <td>22577105410</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Yao Sylvère</td>
                                                                <td>22507716971</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" class="checkbox"></td>
                                                                <td>Lael Deboue</td>
                                                                <td>22546367314</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>                                                
                                                </div>

                                                <!-- GROUPE DE CONTACT -->
                                                <div id="groupeContact" class="tab-pane fade">
                                                    <div id="contact" class="tab-pane fade in active" style="height: 200px; overflow: auto;">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Groupe</th>
                                                                    <th>Nombre de contact</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Croix Rouge</td>
                                                                    <td>256</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Honda</td>
                                                                    <td>1200</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Coopérative</td>
                                                                    <td>872</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Assurace</td>
                                                                    <td>28</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Banque</td>
                                                                    <td>1021</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox"></td>
                                                                    <td>Sport</td>
                                                                    <td>103</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                                
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div> 
<!--                                        <div class="clearfix"></div>-->






                                    </div>    
                                    <div class="form-actions">
                                        <input type="button" class="btn btn-primary bouton_envoyer_message" value="Envoyer SMS" />
                                        <button type="reset" class="btn">Cancel</button>
                                    </div>
                                    
                                </fieldset>
                          </form>

                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>


        </div>
    </div>
    <div class="clearfix"></div>

    <hr>
    <?php
        include 'Inc/footer.php';
    ?>
</div>
<!--/.fluid-container-->

<?php
//  FICHIER JS
include_once 'Inc/scriptJS.php';
?>

<script src="bootstrap/js/jquery.js"></script>
<script src="../js/envoi_msg.js"></script>

<script>
    function showPopup() {
        var popup = document.getElementById('myTuto');
        popup.classList.toggle('show');
    }
</script>

</body>

</html>

