<?php 
session_start(); 
require_once('functions/user.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>TODO - <?php echo $page; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

    <link href="style/css/bootstrap.css" rel="stylesheet">
    <link href="style/css/style.css" rel="stylesheet">

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
    <link href="style/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="style/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="style/ico/apple-touch-icon-144-precomposed.png">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="style/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="style/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="style/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="style/ico/favicon.png">
    <script src="style//js/jquery.js"></script>
    <script src="style//js/bootstrap.min.js"></script>

</head>
    <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="index.php">CHANGEME</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
						<li <?php if($page == "Accueil") echo 'class="active"'; ?>>
						<a href="index.php">Accueil</a></li>
						<li class="dropdown"  
							<?php if($page == "Création de la base de données" || $page == "Suppression de la base de données"){ echo 'class="active"';}?>> 
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Base de données <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="creabase.php">Création de la base</a></li>
							<li><a href="deleteBase.php">Suppression de la base</a></li>
						</ul>
						</li>
						<?php
						echo '<li '.($page == "Lister les documents" ? 'class="active"' : '' ).'><a href="documentsList.php">Liste des documents</a></li>';
						if(isConnect()) {	
							echo '<li '.($page == "Saisir un document" ? 'class="active"' : '' ).'><a href="documentInsert.php">Enregistrer un document</a></li>';
						}

				if(isset($_SESSION['pseudo']) && $_SESSION['connect']) {
					echo '<li><a href="savedDocument.php">Mes documents</a></li>';
					echo '<li><a href="deconnexion.php">Déconnexion ('.$_SESSION['pseudo'].')</a></li>';
				} else {
					echo '	<li '; if($page == "Inscription") echo 'class="active"';
						echo '><a href="register.php">Inscription</a></li>';
				}

				?>
					</ul>
				<?php 		
				if(!(isset($_SESSION['pseudo']) && $_SESSION['connect'])) {
					echo '
                 <form class="navbar-form pull-right" action="index.php?p=connect" method="post">
                        <input class="input-medium" type="text" name="user" placeholder="Utilisateur">
                        <input class="input-medium" type="password" name="mdp" placeholder="Password">
						<button class="btn btn-primary" type="submit"><i class="icon-white icon-user"></i> Se connecter</button>
                    </form> 
					';
				}
?>
				</div><!--/.nav-collapse -->

            </div>
        </div>
    </div>

