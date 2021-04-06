<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 ?>


<!DOCTYPE html>
<html>

  <head>
     <title>Gerer vendeur</title>
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

    <div class="container-fluid">
      <h3>Gestion vendeurs</h3> <br><br>
      <p>Liste des vendeurs : </p>
      <?php

    //identifier le nom de base de données
      $database = "ebayece";

    //conecter a la BDD
    //Rappel : sevreur = localhost | login = root | psw = root
      $db_handle = mysqli_connect('localhost', 'root', '');
      $db_found = mysqli_select_db($db_handle, $database);

    //si la BDD existe, faire le traitement
      if ($db_found) {
        $sql = "SELECT * FROM vendeur";
        $result = mysqli_query($db_handle, $sql);


        echo "<table border='1'>"; 
        echo "<tr>";
        echo "<th>" . "ID_Vendeur" . "</th>";
        echo "<th>" . "NomVendeur" . "</th>";
        echo "<th>" . "PrenomVendeur" . "</th>";
        echo "<th>" . "MailVendeur" . "</th>";
        echo "<th>" . "ImageVendeur" . "</th>";
        echo "<th>" . "FondEcran" . "</th>";
        echo "</tr>";
        
        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $data['ID_Vendeur'] . "</td>";
          echo "<td>" . $data['NomVendeur'] . "</td>";
          echo "<td>" . $data['PrenomVendeur'] . "</td>";
          echo "<td>" . $data['MailVendeur'] . "</td>";  
          $image1 = $data['PhotoVendeur'];
          echo "<td>" . "<img src='$image1' height='120' width='100'>" . "</td>";
          $image2 = $data['PhotoEcran'];
          echo "<td>" . "<img src='$image2' height='120' width='100'>" . "</td>";
          echo "</tr>";

        }
      } else {
        echo "Database not found";
      }

    // fermer la connexion
      mysqli_close($db_handle);
      ?>

      
      <form action="vendeurSupp.php" method="post">
        <table>
          <br><br>
          <tr>
            <td>Mail du Vendeur a supprimer :
            <input type="text" name="MailVendeur"></td>
            <td><input type="submit" name="button3" value="Supprimer"></td>
          </tr>
          
          <tr>      
            <td>
              <p>Autrement, ajouter un vendeur : 
              <input type="button" onclick="location.href='ajout_vendeur.php';" value="Ajouter Vendeur" />
              </p>  
            </td>
          </tr>
        </table>
      </form>    

    </div>

  </body>
</html>