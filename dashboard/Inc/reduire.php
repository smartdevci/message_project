<div class="row-fluid">
    <div class="alert alert-success message_envoye hidden">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Message envoyé !!! </h4>
        Le message a été envoyé avec succès !!!
    </div>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="breadcrumb">
                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>

                <?php
                if(isset($_SESSION['send-single']))
                {
                ?>
                    <li>
                        <a href="#">Envoi de SMS</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <?php
                if(isset($_SESSION['contact']))
                {
                ?>
                    <li>
                        <a href="#">Tous mes contacts</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <?php
                if(isset($_SESSION['contactGroup']))
                {
                ?>
                    <li>
                        <a href="#">Enregistrer un groupe de contacts</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <?php
                if(isset($_SESSION['story']))
                {
                ?>
                    <li>
                        <a href="#">Historique de réchargement</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <?php if(isset($_SESSION['report']))
                {
                ?>
                    <li>
                        <a href="#">Rapport de SMS</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['editor']))
                {
                ?>
                    <li>
                        <a href="#">Editer vos coordonnées</a> <span class="divider">/</span>
                    </li>
                <?php
                }
                ?>

                <!--<li>
                    <a href="#">Settings</a> <span class="divider">/</span>
                </li>
                <li class="active">Tools</li>
            </ul>-->
        </div>
    </div>
</div>
