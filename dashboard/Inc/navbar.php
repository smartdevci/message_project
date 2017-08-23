<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="./"> SMS-Notifier</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">

                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $user->nom ?> <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="editor.php">Editer Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="logout.php">Déconnexion</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <!--<li class="active">
                        <a href="#">Tableau de bord</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">SMS <b class="caret"></b>

                                                    </a>
                                                    <ul class="dropdown-menu" id="menu1">
                                                        <li>
                                                            <a href="envoi-single.php">Envoi SMS simple</a>
                                                        </li>
                                                        <li>
                                                            <a href="envoi-multiple.php">Envoi SMS groupé</a>
                                                        </li>
                                                        <li>
                                                            <a href="reports.php">Rapport d'envoi</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                    <li>
                                                            <a href="reloadsms.php">Récharger SMS</a>
                                                        </li>
                                                        <li>
                                                            <a href="story-reload.php">Hist. de réchargement</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!--<li class="dropdown">
                                                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Contacts <i class="caret"></i>

                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a tabindex="-1" href="my-contact.php">Créer contact</a>
                                                        </li>
                                                        <li>
                                                            <a tabindex="-1" href="my-contact.php">Mes contacts</a>
                                                        </li>
                                                        <li>
                                                            <a tabindex="-1" href="contact-group.php">Créer un groupe de contacts</a>
                                                        </li>

                                                    </ul>
                                                </li>-->

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
