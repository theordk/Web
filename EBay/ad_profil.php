<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 ?>

<!DOCTYPE html>
<html>

  <head>
     <title>Profil Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
  </head>

  <body>

      <?php include("ad_entete.php"); ?>
      <?php include("ad_menu.php"); ?>
  
          <div class="card text-white">
            <img src="falaise.jpg" class="card-img" alt="...">
            <div class="card-img-overlay">
              <h1 class="card-title">Profil Admin</h1>
              <img src="ad_pp.jpg" alt="ad_pp" class="responsive">      
              <h3 class="card-text text-white">Prenom : Admin <br> Nom : SuperAdmin</h3> <br>
              <!--<h4 class="card-text"></h4>-->
              <h5 class="text-center"><a href="ad_vente.php">Mes items en vente</a></h5>
              <h5 class="text-center"><a href="ad_vendu.php">Mes items en vendus</a></h5>
              <br><br>
              <h5 class="text-center"><a href="gerer_item.php">Gérer les items</a></h5>
              <h5 class="text-center"><a href="gerer_vendeur.php">Gérer les vendeurs</a></h5>
            </div>
          </div>

          <?php include("ad_footer.php"); ?>
            
  </body>
</html>