<?php

session_start();
$_SESSION["index"] = 'index.php';
/**
 * Created by IntelliJ IDEA.
 * User: LAEL
 * Date: 30/04/2017
 * Time: 16:21
 */
?>


<!DOCTYPE html>
<html lang="fr">
<!-- Balise head -->
<?php
    include 'Inc/head.php';
?>
<!-- Fin Balise head -->
<body>

<!-- BARRE DE NAVIGATION -->
<?php
    include 'Inc/nav-bar.php';
?>
<!-- FIN BARRE DE NAVIGATION -->

<div class="clearfix"></div>

<div class="container">

<!--    <section class="row slideshow">
        <figure class="slider text-center form-group">
            <img src="medias/static/slider/1.jpg" width="1180" height="460" class="form-group"><br>
        </figure>
    </section>
-->

    <?php
    // SLIDER
        include "Inc/slider.php";



    // COSTUM
        include "Inc/costum.php";
    ?>


    <div class="clearfix"></div>

    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <div class="text-center">
            <h2 class="text-primary">Accès au service</h2>
            <div class="">
                <p class="texte form-group" style="margin-bottom: 30px;"><a href="#">Créer un compte</a> pour bénéficier de tous les services
                    <span class="text-danger bold">SMS Notifier</span> en ligne.
                </p>
                <hr>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php
    // CONTACT FORM
        include "Inc/contact-form.php";
    ?>


</div>

<?php
    include "Inc/footer.php";
?>


<script type="text/javascript" src="slideshow/engine/wowslider.js"></script>
<script type="text/javascript" src="slideshow/engine/script.js"></script>

</body>
</html>


<?php
session_destroy();
?>