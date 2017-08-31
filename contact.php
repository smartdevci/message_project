<?php
//session_start();
$_SESSION['contact'] = 'contact.php';
?>

<!DOCTYPE html>
<html lang="fr">
<!-- Balise head -->
<?php
    include 'Inc/head.php';
?>
<!-- Fin Balise head -->

<body>

<section class="container">
    <!-- BARRE DE NAVIGATION -->
    <?php
        include 'Inc/nav-bar.php';
    ?>
    <!-- FIN BARRE DE NAVIGATION -->
    <div class="clearfix" style="margin-top: 100px;"></div>

    <div class="row">
        <div class="col-lg-6 col-sm-12 coordonnees">
            <h3>Nos coordonnées</h3><hr>
            <p style=" font-size: 1.2em;"><span class="fa fa-phone-square fa-2x text-primary" style="position: relative; bottom: -3px;"></span> : +225 49 50 48 58<br>
                <span style="margin-left: 38px;">+225 07 71 69 71</span><br> <span style="margin-left: 38px;">+33 751 813 849</span>
            </p>
            <p style=" font-size: 1.2em;"><span class="fa fa-envelope-square fa-2x text-primary" style="position: relative; bottom: -3px;"></span> : info@appsmartdev.com</p><hr>
        </div>

        <div class="col-lg-6 col-sm-12 social">
            <h3>Suivez-nous</h3><hr>
            <ul class="list-inline" style="font-size: 1.2em;">
                <li><span class="fa fa-facebook-official fa-2x form-group" style="position: relative; bottom: -3px; color: #337ab7"></span> <a href="#">Facebook</a></li><br>
                <li><span class="fa fa-youtube-play fa-2x form-group" style="position: relative; bottom: -3px; color: #b80011;"></span> <a href="#">Youtube</a></li><br>
                <li><span class="fa fa-twitter-square fa-2x form-group" style="position: relative; bottom: -3px; color: #54d3e8"></span> <a href="#">Twitter</a></li><hr>
            </ul>
        </div>
    </div>
    <?php
        include 'Inc/contact-form.php';
    ?>
</section>

<?php
    include 'Inc/footer.php';
?>
</body>
</html>

