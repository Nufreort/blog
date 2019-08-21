<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    		<link rel="stylesheet" href="public/css/style.css">
    		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="public/css/materialize.css"  media="screen,projection"/>
    </head>

    <body>
		<header class="bloc">
			<?php
			if (isset($_SESSION['id']) AND isset($_SESSION['first_name']))
			{
				echo '<p>Vous êtes connecté en tant que ' . $_SESSION['first_name'] . ' !</p><p>Votre id de session est :' . $_SESSION['id'] . '</p>';
			}

			?>
      <nav class="nav-perso">
        <div class="nav-wrapper black nav-perso">
          <div class="container">
            <a href="index.php" class="brand-logo"><img class="responsive-img logo-v" src="public/images/logo ldx2.png"/></a>
          </div>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=listPosts">Le blog</a></li>
            <li><a href="index.php?action=signIn" class="waves-effect waves-light btn-small white black-text">Inscription</a></li>
  					<li><a href="index.php?action=signUp" class="waves-effect waves-light btn-small white black-text">Connexion</a></li>
  					<li><a href="index.php?action=leave" class="waves-effect waves-light btn-small red black-text"><i class="small material-icons">power_settings_new</i></a></li>
          </ul>

<!-------------- MOBILE MENU
          <a href="#" data-activates="mobile-menu" class="button-collapse right"><i class="material-icons">menu</i></a>
          <ul id="side-nave" id="mobile-menu" class="right">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=listPosts">Le blog</a></li>
            <li><a href="index.php?action=signIn" class="waves-effect waves-light btn-small white black-text">Inscription</a></li>
  					<li><a href="index.php?action=signUp" class="waves-effect waves-light btn-small white black-text">Connexion</a></li>
  					<li><a href="index.php?action=leave" class="waves-effect waves-light btn-small red black-text"><i class="small material-icons">power_settings_new</i></a></li>
          </ul>


            <ul id="slide-out" class="sidenav">
            <li><div class="user-view">
              <div class="background">
                <img src="images/office.jpg">
              </div>
              <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
              <a href="#name"><span class="white-text name">John Doe</span></a>
              <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div></li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
          </ul>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
-->
        </div>
      </nav>
		</header>

		<?php
            require($page);
    ?>

		<footer class="page-footer black">
          <div class="container">
            <h5 class="white-text">Et si on gardait contact ?
              <a href="https://www.linkedin.com/in/ldx/">
					    <img src="public/images/in.png" alt="icone linkedin" class="icone-perso"/></a>
            </h5>
          </div>

          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright LDX Corp.
            <a class="waves-effect waves-light btn right" href="index.php?action=admin">Admin</a>
            </div>
          </div>
        </footer>

		<script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascrpt" src="public/js/script.js"></script>
    </body>
</html>
