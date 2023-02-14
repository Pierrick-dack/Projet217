<?php

require_once'config.php';

if(isset($_POST['enregistrer']))
{
    if(!empty($_POST['ident']) AND !empty($_POST['mdp']))
    {   
        
        $ident = $_POST['ident']; 
        $password = sha1($_POST['mdp']);
        $nom = $_POST['name'];
        
        $ident_length=strlen($ident);
        if($ident_length<=11)
        {
            if(filter_var($ident,FILTER_VALIDATE_INT))
            {
                $verifident = $bdd->prepare("SELECT * FROM utilisateur WHERE ID_UTILISATEUR = ? AND PASSWORD =?");
                $verifident->execute(array($ident,$password));
                $identexist = $verifident->rowCount();
                if($identexist == 1)
                {
                    
                    
                    $userinfo = $verifident->fetch();

                    // $_SESSION['id_prof']=$userinfo['id_prof'];
                    // $_SESSION['ident_prof']=$userinfo['ident_prof'];
                    // $_SESSION['mdp']=$userinfo['mdp'];
                    $_SESSION['user']=$nom;
                    header('Location: index.php?reg_err=success');
                
                   
                }
                else
                {
                    header('Location: connection.php?reg_err=already');
                }
            }
            else
            {
                header('Location: connection.php?reg_err=ident');
            }
        }
        else
        {
            header('Location: connection.php?reg_err=ident_length');
        }
    }
    else
    {
        header('Location: connection.php?reg_err=remplir'); 
    }
}


?>  












<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Services facturing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Personal - v4.8.1
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<div class="row">
      <div class="col-md-4"></div>
      <div  class="col-md-4 form-group text-center ">
        <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {

                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'ident':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> identifiant non valide
                            </div>
                        <?php
                        break;

                        case 'ident_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> ident trop long
                            </div>
                        <?php 
                        break;
                        
                        
                        case 'remplir':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> remplissez tous les champs
                            </div>
                        <?php
                        break;


                        case 'nom_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> nom trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> identifiant ou mot de passe incorrect
                            </div>
                        <?php 

                    }
                }
        ?>
      </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <h1><a href="index.html">Facturing Apps</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>This app is used to <span>Desgin a bill</span> for any service</h2>

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a class="nav-link" href="#contact">Se connecter</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div> 

    </div>
  </header><!-- End Header -->

  

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Connexion</h2>
        <p>Connecter vous</p>
      </div>

      

        

      <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
        <div class="columns">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <br><br>
          <div class="col-md-6 form-group">
            <input type="text" name="ident" class="form-control" id="ident" placeholder="Your identifiant" required>
          </div>
          <br><br>
          <div class="col-md-6 form-group ">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
          <br><br>
        </div>
        <div class="col-md-6 form-group ">
          <input type="text" class="form-control" name="mdp" id="mdp" placeholder="Password" required>
        </div>
        
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <br><br>
        <div class="text-left"><button type="submit">Send Message</button></div>
        <div class="text-center">
       Pas encore inscrit ? <a href="inscription.php">Inscrivez vous</a>
       </div>
      </form>
     

    </div>
  </section><!-- End Contact Section -->

  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
    Designed by <a href="https://bootstrapmade.com/">Kamela Pierrick</a>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>