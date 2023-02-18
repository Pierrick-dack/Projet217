<?php

require_once'config.php';


if(!isset($_SESSION['user'])){
    header('Location:inscription.php');
    die();
}

if(isset($_POST['enregistrer']))
{
        
        $nb = $_POST['nb']; 
        $color = $_POST['color'];
        $entrep = $_POST['entrep'];
        $client = $_POST['client'];
        $c=intval($_POST['cmp']);
        $_SESSION['nb']=$nb;
        $_SESSION['champ']=$c;
        $_SESSION['color']=$color;
        $_SESSION['client']=$client;
        $_SESSION['entrep']=$entrep;

        
        for($n=1; $n<= intval($_POST['cmp']) ; $n++)
        {
             ?><p><?php $_POST['txt'.$n].'<br />';?></p><?php
        }
                  for($n=1; $n<= intval($_POST['cmp']) ; $n++)
                  {
                    $champ = $_POST['txt'.$n];
                    $insert = $bdd->prepare('INSERT INTO champ(NOM_CHAMP)VALUES(:nom)');
                    $insert->execute(array(
                        
                        'nom' => $champ       
                    ));

                  }
                  $insert = $bdd->prepare('INSERT INTO template(NOM_TEMPLATE,COULEUR,NB_LIGNE)VALUES(:nom,:color,:nb)');
                  $insert->execute(array(
                  'nom' => $_SESSION['ident'],
                   'color' => $color,
                   'nb' => $nb
                         
                  ));


                  
              
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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

      <h1><a href="index.php">Facturing Apps</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>This app is used to <span>Desgin a bill</span> for any service</h2>

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a class="nav-link" href="#contact">Enregistrer les champs</a></li>
          
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
        <h2>Enregistrement</h2>
        <p>Enregistrer les informations de vos differrents champs</p>
      </div>

      

        

      <form action="pdf.php" method="post" role="form" class="php-email-form mt-4">
        <div class="columns">
        <!-- <div class="col-md-6 form-group"> -->
          <!-- <label for="id" class="form-label mt-4">numero</label>
              <input type="text" class="form-control" name="nb" id="nb" placeholder="numero du champ " required>
          </div><br><br>

          
           <div class="col-md-6 form-group">
           <label for="id" class="form-label mt-4">Quantite</label>
              <input type="text" class="form-control" name="qte" id="qte" placeholder="Quantite du produit" required>
          </div><br><br>

          <div class="col-md-6 form-group">
          <label for="id" class="form-label mt-4">prix unitaire</label>
              <input type="text" class="form-control" name="pu" id="pu" placeholder="prix unitaire" required>
          </div><br><br>
          <div class="col-md-6 form-group">
          <label for="id" class="form-label mt-4">prix total</label>
              <input type="text" class="form-control" name="pt" id="pt" placeholder="prix total" required>
          </div><br><br> -->

          <!-- <div class="col-md-6 form-group">
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
          <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Password" required>
        </div> -->
        
        <div class="text-right"><button type="submit" name="enregistrer" style="font-weight:bold;text-align:center;">Valider</button></div><br><br>
        
       
        <div class="table-responsive" id="tableres">
        <div class="row pt-5">
							<div class="col-xl-3 col-lg-4">
								<p class=" m-2">From:</p>
								<address>
									<?php echo "$entrep";?>
								</address>
							</div>
							<div class="col-xl-3 col-lg-4">
								<p class=" mb-2">To:</p>
								<address>
                <?php echo "$client";?>
								</address>
							</div>
							<div class="col-xl-3 col-lg-4">
								<p class=" mb-2">Details</p>
								<address>
									Invoice ID:
									<span class="">#2365546</span>
									<br>Le  <span id="copy-jour"></span>/<span id="copy-mois"></span>/<span id="copy-year"></span>
									<br> A <span id="copy-heure"></span>H<span id="copy-minute"></span>min
									<script>
                        var now =new Date();
                        var annee   = now.getFullYear();
                        var mois    = now.getMonth() + 1;
                        var jour    = now.getDate();
                        var heure   = now.getHours();
                        var minute  = now.getMinutes();
                        var seconde = now.getSeconds();
                        document.getElementById("copy-mois").innerHTML = mois;
                        document.getElementById("copy-jour").innerHTML = jour;
                        document.getElementById("copy-year").innerHTML = annee;
                        document.getElementById("copy-heure").innerHTML = heure;
                        document.getElementById("copy-minute").innerHTML = minute;
                  </script>
								</address>
							</div>
            </div>
          
              <table class="table mt-3 table-striped" id="table" style="border-color:<?php echo "$color"; ?>;width:100%;font-weight:bold;color:white;">
                <thead style="width:100%;font-weight:bold;color:white;">
                  <tr style="width:100%;font-weight:bold;color:white;">
                    <!-- <th>supprimer</th> -->
                    <!-- <th>#</th> -->
                      <?php
                            
                            for($n=1; $n<= intval($_POST['cmp']) ; $n++) 
                            { 
                                ?>
                                <th><input type="text" name="<?php echo 'text'.$n ;?>" placeholder="<?php echo $_POST['txt'.$n] ;?>"></th>
                                <?php ;
                            } 
                        
                      ?>
                      
                      <th>prix total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for($i=0; $i<$nb ; $i++){ 
                    ?>
                    <tr>
                      <!-- <td><button type="button" class="btn btn-outline-danger" id="plus">x</button></td> -->
                      <!-- <td><input type="text" ></td> -->
                      <?php
                            for($n=1; $n<= intval($_POST['cmp']) ; $n++) 
                            { 
                                ?>
                                <td><input name="<?php echo 'text'.$i.$n ;?>" id="<?php echo 'text'.$i.$n ;?>" type="text"></td>
                                <?php ;
                            } 
                      ?>
                      <td><input type="text" name="<?php echo 'pt'.$i ;?>" class="prix"  id="<?php echo 'pt'.$i ;?>"></td>
                    </tr>
                    <?php ;
                    }
                  ?>
                  
                </tbody>
              </table>
              <div class="row justify-content-end">
							<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                   <label for=""> Totaux</label><input type="text" name="totaux" id="totaux"><br><br>
                   <label for="">remise</label><input type="text"  name="rem" id="rem"><br><br>
                   <label for="">TotalF  </label><input type="text" name="totalf" id="totalf">
                   
							</div>
						</div>
            </div>
            
        
            
      </form>
      <!-- <script>

        function somme(){
            var id=this.getAttribute("id");
            var numero=id.substring(id.length-1,id.length);
            console.log(numero);
            var prix1=document.getElementById("pt"+numero);
            prixx=document.getElementsByClassName("prix");
            var prixtotal=0;
            for (var i=0;i<prixx.length;i++){
              if (!isNaN(parseInt(prixx[i].value)))
                prixtotal=prixtotal+parseInt(prixx[i].value);
            }
            var total = document.getElementById("totaux");
            total.value=prixtotal;
        }
       


        var element=document.getElementsByClassName("prix");
        for(var i=0;i<element.length;i++){
            element[i].addEventListener("change", somme, false);
        }
        var index, table = document.getElementById("table");
            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].cells[0].onclick = function()
                {
                    var c = confirm("do you want to delete this row");
                    if(c === true)
                    {
                        index = this.parentElement.rowIndex;
                        table.deleteRow(index);
                    }
                    
                    //console.log(index);
                };
                
            }
            
            
             

        var plus = document.getElementById("plus");
        plus.addEventListener('click',ajoutLigne,false);


        function creationLigne(name,id,tr,table){
            var td=document.createElement("td");
            var input=document.createElement("input");
            input.setAttribute("type","text");
            input.setAttribute("name",name);
            input.setAttribute("id",id);
            table.appendChild(tr);


        }

        function ajoutLigne(){
            var table=document.getElementById("table");
            var tr=document.createElement("tr");
            creationLigne("num[]","num1",tr,table);
            creationLigne("pt[]","pt1",tr,table);
        }

        function generatepdf(){
            const element = document.getElementById("tableres");

            html2pdf(){
            from(element),save();
            }
            
         }

        </script> -->
     

      
          

            

    </div>
  </section>
  <!-- End Contact Section -->

  
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
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/ajoutpdf.js"></script>
  <script src="assets/js/facturation.js"></script>


</body>

</html>