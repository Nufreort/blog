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
      <header>
        <nav class="black lighten-1" role="navigation">
          <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img class="responsive-img logo-v" src="public/images/logo ldx2.png"/></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="index.php?action=listPosts">Le blog</a></li>
              <li><a href="index.php?action=signIn" class="waves-effect waves-light btn-small white black-text">Inscription</a></li>
          		<li><a href="index.php?action=signUp" class="waves-effect waves-light btn-small white black-text">Connexion</a></li>
          		<li><a href="index.php?action=leave" class="waves-effect waves-light btn-small red black-text"><i class="small material-icons">power_settings_new</i></a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="index.php?action=listPosts">Le blog</a></li>
              <li><a href="index.php?action=signIn" class="waves-effect waves-light btn-small white black-text">Inscription</a></li>
        			<li><a href="index.php?action=signUp" class="waves-effect waves-light btn-small white black-text">Connexion</a></li>
        			<li><a href="index.php?action=leave" class="waves-effect waves-light btn-small red black-text"><i class="small material-icons">power_settings_new</i></a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
        </nav>

        <div class="lime lighten-5">
          <?php
            if (isset($_SESSION['role']) AND isset($_SESSION['first_name']))
            {
              echo 'Vous êtes connecté en tant que ' . $_SESSION['first_name'] . ' ! Votre rôle est : ' . $_SESSION['role'];
            }
          ?>
        </div>
      </header>


    <?php
      require($page);
    ?>

    <footer class="page-footer black">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Et si on gardait contact ?</h5>
          </div>

          <div class="col l4 offset-l2 s12">
            <a href="https://www.linkedin.com/in/ldx/">
      	    <img src="public/images/in.png" alt="icone linkedin" class="icone-perso right"/></a>
          </div>
        </div>
      </div>

      <div class="footer-copyright grey center-align lighten-1">
        <div class="container">
          <p class="center-align">
            © 2019 Copyright LDX Corp.
          </p>
        </div>
      </div>

      <div class="center-align lime lighten-5">
        <?php
          if(isset($_SESSION['role']) AND $_SESSION['role']=='admin')
          {
            ?>
            <a class="waves-effect waves-light btn" href="index.php?action=admin">Admin</a>
            <?php
          }
        ?>
      </div>
    </footer>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="public/js/materialize.js"></script>
  <script src="public/js/init.js"></script>
  <script type="text/javascript" src="public/js/dashbord.func.js"></script>

    </body>
</html>
