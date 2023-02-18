<?php
require_once'config.php';





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style3.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Invoice</title>
    <style>
      table {
          font-size: 12px;
          color: #444;
          background-color: #f2f2f2;
          border-collapse: collapse;
      }

      th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
      }
    </style>
</head>
<body>
<div class="table-responsive" id="tableres">
        <div class="row pt-5">
							<div class="col-xl-3 col-lg-4">
								<p class=" m-2">From:</p>
								<address>
									<?php echo $_SESSION['entrep'];?>
								</address>
							</div>
							<div class="col-xl-3 col-lg-4">
								<p class=" mb-2">To:</p>
								<address>
                <?php echo $_SESSION['client'];?>
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
        <table border=1 style="width:70%;font-weight:bold;background-color:<?php echo $_SESSION['color']; ?>;">
            <thead>
                <tr>
                <?php
                          
                          for($n=1; $n<= $_SESSION['champ'] ; $n++) 
                          { 
                            
                              ?>
                              <th><?php echo $_POST['text'.$n] ;?></th>
                              <?php ;
                          } 
                      
                    ?>
                    
                    <th>prix total</th>
                </tr>
            </thead>
            <tbody>
            <?php
                  for($i=0; $i<$_SESSION['nb'] ; $i++){ 
                    ?>
                    <tr>
                                
                      <?php
                            for($n=1; $n<= $_SESSION['champ'] ; $n++) 
                            { 
                                ?>
                                <td><?php echo $_POST['text'.$i.$n] ;?></td>
                                <?php ;
                            } 
                      ?>
                      <td><?php echo $_POST['pt'.$i] ;?></td>
                    </tr>
                    <?php ;
                    }
                  ?>
                  <tr>
                 <td>total</td>
                 <?php
                            for($n=1; $n<= $_SESSION['champ']-1 ; $n++) 
                            { 
                                ?>
                                <td></td>
                                <?php ;
                            } 
                      ?>
                      <td><?php echo $_POST['totaux'] ;?></td>
                  </tr>
                  <tr>
                  <td>remise</td>
                  <?php
                            for($n=1; $n<= $_SESSION['champ']-1 ; $n++) 
                            { 
                                ?>
                                <td></td>
                                <?php ;
                            } 
                      ?>
                      <td><?php echo $_POST['rem'] ;?></td>
                  </tr>
                  <tr>
                  <td>TotalFinal</td>
                  <?php
                            for($n=1; $n<= $_SESSION['champ']-1 ; $n++) 
                            { 
                                ?>
                                <td></td>
                                <?php ;
                            } 
                      ?>
                      <td><?php echo $_POST['totalf'] ;?></td>
                  </tr>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-outline-info" id="moins" OnClick="javascript:window.print()">Imprimer</button>
        <script src="assets/js/ajoutpdf.js"></script>
</body>
</html>