<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");

$_SESSION['page'] = "recharger";
require_once 'modele/modele_recharger.php';

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

            // STATISTIQUES
            //            include_once 'Inc/stats.php';

            // DETAILS SMS ENVOYES
                        include_once 'Inc/details_recharger.php';
            ?>

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

<script src="../js/recharger.js"></script>
</body>

</html>