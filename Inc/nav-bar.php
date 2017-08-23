<nav class="navbar navbar-inverse navbar-fixed-top bg-color" id="navigation" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="position: relative; top: -30px;">
            <img src="medias/image/logo.png" width="100">
            <span style="color: #fff; position: relative; top: -45px; left: 90px;">SMS Notifier</span>
        </a>
    </div>
    <div class="navbar-collapse collapse" id="my-navbar">
        <ul class="nav navbar-nav navbar-right menu-lien">
            <li <?php echo(isset($_SESSION["index"])) ? 'class="page-active"':''; ?>>
                <a href="index.php">Accueil</a>
            </li>
            <li <?php echo(isset($_SESSION["presentation"])) ? 'class="page-active"':''; ?>>
                <a href="presentation.php">Présentation</a>
            </li>
            <li <?php echo(isset($_SESSION["account"])) ? 'class="page-active"':''; ?> class="dropdown lien">
                <a href="account.php" class="dropdown-toggle" data-toggle="dropdown">Mon compte
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li <?php echo(isset($_SESSION["account"])) ? 'class="page-active"':''; ?>><a href="register.php">Inscription</a></li>
                    <li <?php echo(isset($_SESSION["account"])) ? 'class="page-active"':''; ?>><a href="login.php">Connexion</a></li>
                </ul>
            </li>
            <li  <?php echo(isset($_SESSION["price"])) ? 'class="page-active"':''; ?>><a href="price.php">Tarifs</a></li>
            <li <?php echo(isset($_SESSION["contact"])) ? 'class="page-active"':''; ?>><a href="contact.php">Contacts</a></li>
        </ul>
    </div>
</nav>
