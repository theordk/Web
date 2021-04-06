<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 ?>

<!DOCTYPE html>
<html>

  <head>
     <title>Wishlist Acheteur</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
  </head>

  <body>

    <?php include("ach_entete.php"); ?>
  <?php include("ach_menu.php"); ?>

        <div class="container-fluid">
          <h3>Ma Wishlist</h3> <br>
          <p>affichage de la wishlist à partir de la  bdd</p>
      </div>

  </body>
</html>