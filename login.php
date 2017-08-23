<?php
session_start();
$_SESSION['account'] = 'index.php';


//DEFINITION DES VARIABLES
    $loginErr = $passwdErr = "";
    $login = $password = "";


    // VERIFICATION SI LA METHODE EST "POST"
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["login"]))
        {
            $loginErr = "Le login est requis";
        }else{
            $login = check_values($_POST['login']);
        }

        if(empty($_POST['mot-de-passe']))
        {
            $passwdErr = "Entrer un mot de passe !";
        }else{
            $password = check_values($_POST["mot-de-passe"]);
        }

        if(isset($login) && isset($password))
        {
            if(!empty($login) && !empty($password)){
                header('location:index.php');
            }
        }
    }



    // Fonction de vérification des valeurs envoyées au formulaire
    function check_values($dataInput)
    {
        $dataInput = trim("$dataInput");                // Supprime tout espace blanc autour
        $dataInput = stripcslashes("$dataInput");       // Supprime les antislash
        $dataInput = htmlspecialchars("$dataInput");    // Transforme les balises en entité HTML

        return $dataInput;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<!-- Balise head -->
<?php
include 'Inc/head.php';
?>
<!-- Fin Balise head -->

<!--    PAGE AYANT LA MEME TAILLE QUE LE NAVIGATION
<head>
    <style>
        html,
        body{
            padding: 0;
            margin: 0;
            outline: 0;
            height: 100%;
            background-color: yellow;
        }

        #page{
            background-color: red;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
-->
<body>
    <section class="container">
        <!-- BARRE DE NAVIGATION -->
        <?php
        include 'Inc/nav-bar.php';
        ?>
        <!-- FIN BARRE DE NAVIGATION -->
        <div class="clearfix" style="margin-top: 100px;"></div>

        <div class="row">
            <div class="col-sm-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4" >
                <div class="panel panel-primary" style="box-shadow: 0 0 15px #c7c7c7" ;>
                    <div class="panel-heading">
                        <h4>Connectez-vous !</h4>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                            <div>
                                <label style="text-align: left; position: relative; color: #777">Login</label>
                                <div class="input-group form-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control input-lg email" name="login" placeholder="Nom Utilisateur / Email">
                                </div>
                                <!--<p class="text-danger text-right" style="margin-top: -8px; text-blink: 2;"><?php echo $loginErr;?></p>-->
                            </div>



                            <div style="position: relative; top: 20px;">
                                <label style="text-align: left; position: relative; color: #777;">Mot de passe</label>
                                <div class="input-group form-group">
                                    <span class="input-group-addon"><span class="fa fa-key"></span></span>
                                    <input class="form-control input-lg password" type="password" name="mot-de-passe" placeholder="Mot de passe">
                                </div>
                                <p class="text-danger login_message_erreur text-right hidden" style="margin-top: -8px">Login/Email ou password incorrecte<?php echo $passwdErr;?></p>
                                <br>
                            </div>

                            <hr>
                            <div class="form-group">
                                <input class="btn btn-primary btn-lg pull-left bouton_valider_connexion" type="button" style="width: 160px;" value="Entrer" />
                                <button class="btn btn-default btn-lg pull-right" type="reset">Annuler</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-footer text-center">
                        <div style="height: 25px; font-size: 1.2em;">
                            <p>
                                <a href="#" class="text-danger">Mot de passe oublié ?</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="text-center">
        <h3 class="">
            <p>
                Pour ouvrir un compte <a href="register.php">inscrivez-vous</a> ici !
            </p>
        </h3>
    </section>

    <div class="navbar-fixed-bottom" style="margin: 0; padding: 0;">
        <?php
            include 'Inc/footer.php';
        ?>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/connexion.js"></script>

</body>
</html>

<?php
session_destroy();
?>
