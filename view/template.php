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

<!-- MOBILE MENU -
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

<!-- TEST tuto
      <nav class="nav-wraper blue">
        <div class="container">
          <a href="index.php" class="brand-logo"><img class="responsive-img logo-v" src="public/images/logo ldx2.png"/></a>
          <a href="#" class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
          </ul>
        </div>
      </nav>

      <ul class="sidenav" id="mobile-links">
        <li><a href="">Home</a></li>
        <li><a href="">Page 1</a></li>
        <li><a href="">Page 2</a></li>
      </ul>
-->

<nav class="nav-wraper blue">
    <input type="checkbox" id="res-menu">
    <label for="res-menu">
      <i class="fa fa-bars"></i>
      <i class="fa fa-times"></i>
    </label>
    <h1>Héritage</h1>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
</nav>

<div class="banner-area">
  <div class=""
</div>
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascript" src="public/js/script.js"></script>
    <script>
      $(document).ready(function(){
        $(.'sidenav').sidenav();
      })
    </script>
    </body>
</html>
