<?php
session_start();
$_SESSION['account'] = 'register.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">


<!--    <title>Admin</title>-->

    <?php
        include 'Inc/head.php';
    ?>

</head>
<body>

<section class="container">
    <!-- BARRE DE NAVIGATION -->
    <?php
        include 'Inc/nav-bar.php';
    ?>
    <!-- FIN BARRE DE NAVIGATION -->
    <div class="clearfix" style="margin-top: 100px;"></div>
</section>



<div class="container">
    <div class="row main" >
        <div class="main-login main-center col-lg-8 col-md-8 col-sm-12 col-md-offset-2 col-lg-offset-2">
            <h2 style="text-align: center; padding-top: -10px;">Inscrivez-vous au service SMS-Notifier</h2>
            <hr>
            <form class="formulaire_user" method="post" action="">

                <div class="form-group">
                    <label for="name" class="cols-sm-2"><!--Votre nom *--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-lg nom" name="name" id="name"  placeholder="Entrez votre nom" required />
                        </div>
                        <span class="required_name">Veuillez saisir votre nom</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label"><!--Votre adresse Email *--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-lg email" name="email" id="email"  placeholder="Entrez votre e-mail" required />
                        </div>
                        <span class="required_email">Veuillez saisir votre email</span>
                        <span class="email_used">Email déjà utilisé</span>
                        <span class="email_non_valide hidden">L'email n'est pas valide</span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label"><!--Votre adresse Email *--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-lg expediteur" name="expediteur" id="expediteur"  placeholder="Entrez votre nom de l'expediteur des sms" title="Ce nom va s'afficher comme expediteur des messages que vous envoyez" required />
                        </div>
                        <span class="required_name_messenger hidden">Vous devez renseigner le nom d'expediteur</span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label"> <!--Nom utilisateur *--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-lg username" name="username" id="username"  placeholder="Entrez votre nom utilisateur" required />
                        </div>
                        <span class="username_already_used hidden" >Nom d'utilisateur est déjà utilisé</span>
                        <span class="required_username">Veuillez saisir votre nom d'utilisateur</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label"><!--Mot de passe--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control input-lg password" name="password" id="password"  placeholder="Entrez votre mot de passe"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label"><!--Confirmez mot de passe--></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control input-lg confirm" name="confirm" id="confirm"  placeholder="Confirmez votre de passe"/>
                        </div>
                    </div>
                    <span class="password_non_conform hidden">Les 2 mots de passe sont pas conformes</span>
                </div>

                <div class="form-group ">
                    <input  type="button" id="button" class="btn btn-primary btn-lg btn-block login-button bouton_register_user" value="Register" />
                </div>



            </form>

            <div class="alert alert-success message_compte_cree hidden">
                Votre compte a été, vous serez redirigé dans <span class="seconde_redirection">4</span> s
            </div>

        </div>
    </div>
</div>


<div class="navbar-fixed-bottom" style="margin: 0; padding: 0;">
    <?php
    include 'Inc/footer.php';
    ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/register_user.js"></script>
</body>
</html>


<?php
    session_destroy();
?>

