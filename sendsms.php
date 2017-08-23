<?php
    session_start();
    $_SESSION['account'] = 'index.php';
?>

<!DOCTYPE html>
<html lang="fr">
<!-- Balise head -->

<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Envoi de SMS personnalisés en ligne">
<meta name="author" content="smartdev">
<meta charset="utf-8">
<title>Smart Texto</title>

<!-- CSS -->
<link href="css/style-slider.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">


<!-- SLIDER -->
<link rel="stylesheet" type="text/css" href="slideshow/engine/style.css" />
<script type="text/javascript" src="slideshow/engine/jquery.js"></script>
<!-- FIN SLIDER -->


<!-- SCRIPT JS -->
<script type="text/javascript" src="js/jquery.js" rel="script"></script>
<script type="text/javascript" src="js/bootstrap.js" rel="script"></script>
<script type="text/javascript" src="jquery-ui/jquery-ui.js" rel="script"></script>



<style type="text/css">
    /*Contact sectiom*/
    .content-header{
        font-family: 'Oleo Script', cursive;
        color:#fcc500;
        font-size: 45px;
    }

    .section-content{
        text-align: center;

    }
    #contact{

        font-family: 'Teko', sans-serif;
        padding-top: 60px;
        width: 100%;
        /*width: 100vw;*/
        height: 550px;
        background: #3a6186; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color : #fff;
    }
    .contact-section{
        padding-top: 40px;
    }
    .contact-section .col-md-6{
        width: 50%;
    }

    .form-line{
        border-right: 1px solid #B29999;
    }

    .form-group{
        margin-top: 10px;
    }
    label{
        font-size: 1.3em;
        line-height: 1em;
        font-weight: normal;
    }
    .form-control{
        font-size: 1.3em;
        color: #080808;
    }
    textarea.form-control {
        height: 135px;
        /* margin-top: px;*/
    }

    .submit{
        font-size: 1.1em;
        float: right;
        width: 150px;
        background-color: transparent;
        color: #fff;

    }

</style>

<body>
    <div class="container">
        <!-- BARRE DE NAVIGATION -->
        <?php
            include 'Inc/nav-bar.php';
        ?>
        <!-- FIN BARRE DE NAVIGATION -->
        <div class="clearfix" style="margin-top: 100px;"></div>


        <section id="contact" class="">
            <div class="section-content">
                <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Envoyez vos sms ici</span></h1>
                <h3>SMS-Notifier garantit la transmission de vos SMS</h3>
            </div>
            <div class="contact-section">
                <div class="container">
                    <form method="get" action="authsms_.php">
                        <div class="col-md-6 form-line">
                            <div class="form-group">
                                <label for="exampleInputUsername">Nom Expéditeur</label>
                                <input type="text" name="sender" class="form-control sender" id="sender" placeholder=" Nom de l'expéditeur">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">No Destinataire(s)</label>
                                <input type="tel" name="recipient" class="form-control recipient" id="exampleInputEmail" placeholder=" Numéro(s) du destinataire">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Mobile No.</label>
                                <input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no." disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for ="description"> Message</label>

                                <span class="message_envoye pull-right hidden">
                                    Message envoyé !!!
                                </span>
                                <textarea name="message" class="form-control message" id="description" placeholder="Entrer votre Message" rows="6"></textarea>
                            </div>

                            <div>

                                <input type="button" class="btn btn-default bouton_envoyer_message" value="Envoyer Message" />
                                <!--<i class="fa fa-paper-plane" aria-hidden="true"  />-->
                            </div>




                        </div>

                        <div class="clearfix"></div>



                    </form>
                </div>
        </section>

    </div>

    <div class="clearfix"></div>

    <div class="navbar-fixed-bottom" style="margin: 0; padding: 0;">
        <?php
            include 'Inc/footer.php';
        ?>
    </div>


    <script src="js/jquery.js"></script>
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
                       $('.message_envoye').show(2000);

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
$_SESSION['login']="sylvere18";
$_SESSION['pwd'] = "web43947";
//session_destroy();
?>
