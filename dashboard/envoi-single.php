<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");

$_SESSION['send-single'] = "envoi-single.php";
?>


<!DOCTYPE html>
<html class="no-js">

<head>
    <?php
    //  FICHIER CSS ET JS
    require_once 'Inc/head.php';
    ?>
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
                                    <legend class="text-center" style="color: #006dcc; font-weight: 600;">SMS-Notifier garantit la transmission de vos SMS</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Nom Expéditeur </label>
                                        <div class="controls">
                                            <input type="text" name="sender" class="span6 " id="typeahead" placeholder="Nom de l'expéditeur"  data-provide="typeahead" data-items="4" style="height: 40px">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="date01">No Destinataire(s)</label>
                                        <div class="controls">
                                            <input type="text" name="recipient"  class="span6 input-xlarge form-control" id="date01"  placeholder=" Numéro(s) du destinataire" style="height: 40px">
<!--                                            <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Message</label>
                                        <div class="controls">
                                            <textarea name="message" class="input-xlarge textarea" placeholder="Entrer votre texte ..." style="width: 600px; height: 150px"></textarea>
                                            <label>Nombre de SMS : 1 &DoubleLongLeftRightArrow; Nombre de caractères : 56</label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary bouton_envoyer_message">Envoyer SMS</button>
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
<script>
    $('.message_envoye').hide();
    $('.message_envoye').removeClass('hidden');

    $('.bouton_envoyer_message').click(function(){


        var url='authsms.php?sender='+$('.sender').val()+'&recipient='+$('.recipient').val()+'&message='+$('.message').val();
        //alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success: function(reponse, statut){

                if(reponse=='non')
                {

                }
                else
                {
                    //alert('ok');
                    $('.message_envoye').hide();
                    $('.message_envoye').show(500);

                    $('.sender').val('');
                    $('.recipient').val('');
                    $('.message').val('');

                    //alert(reponse);
                    $.ajax({
                        url : reponse,
                        type : 'GET',
                        dataType : 'html',
                        success: function(resultat, statut2){},
                        error: function(resultat, statut){}
                    });
                }


            },
            error: function(resultat, statut){

            }


        });
    });


</script>

</body>

</html>


<?php
session_destroy();
?>
