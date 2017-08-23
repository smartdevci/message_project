<?php
session_start();
$_SESSION['presentation'] = 'presentation.php';
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
</section>

<?php
include 'Inc/footer.php';
?>
</body>
</html>

<?php
session_destroy();
?>
