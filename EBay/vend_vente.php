 <?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();  
 ?>

 <!DOCTYPE html>
 <html>

 <head>
   <title>Vendeur Vente</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 </head>

 <body>
  <div class="container-fluid">
    <h2>Mes items en vente</h2><br>
    <p>Voici les différents items</p>

    <?php include("vend_entete.php"); ?>
    <?php include("vend_menu.php"); ?>

    <?php

     //identifier le nom de base de données
      $database = "ebayece";

      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
      $db_handle = mysqli_connect('localhost', 'root', '');
      $db_found = mysqli_select_db($db_handle, $database);

      $mail_vend = $_SESSION['mail'];
      $sql = "SELECT ID_Vendeur FROM Vendeur WHERE MailVendeur LIKE '%$mail_vend%'";
      $result = mysqli_query($db_handle, $sql);   

      if (mysqli_num_rows($result) != 0) {
        //echo "Adresse Mail correcte!"."<br>";

        $vendeur= mysqli_fetch_object($result);
        $id = $vendeur->ID_Vendeur;
      }

      //si la BDD existe, faire le traitement
      if ($db_found) {
        $sql = "SELECT * FROM article WHERE ID_Vendeur LIKE '%$id%' AND Bool = '0'";
        $result = mysqli_query($db_handle, $sql);

        echo "<table border='1'>"; 
        echo "<tr>";
        echo "<th>" . "ID_Article" . "</th>";
        echo "<th>" . "NomArticle" . "</th>";
        echo "<th>" . "Annee" . "</th>";
        echo "<th>" . "Categorie" . "</th>";
        echo "<th>" . "DateMiseEnVente" . "</th>";
        echo "<th>" . "Description" . "</th>";
        echo "<th>" . "Prix" . "</th>";
        //echo "<th>" . "TypeVente" . "</th>";
        echo "<th>" . "Photo" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $data['ID_Article'] . "</td>";
          echo "<td>" . $data['NomArticle'] . "</td>";
          echo "<td>" . $data['Annee'] . "</td>";
          echo "<td>" . $data['Categorie'] . "</td>";  
          echo "<td>" . $data['DateMiseEnVente'] . "</td>";
          echo "<td>" . $data['Description'] . "</td>";
          echo "<td>" . $data['Prix'] . "</td>";
          //echo "<td>" . $data['TypeVente'] . "</td>"; 
          $image = $data['PhotoArticle'];
          echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>"; 
          echo "</tr>";

        }
      } else {
        echo "Database not found";
      }

  // fermer la connexion
      mysqli_close($db_handle);
      ?>

    </div>
    
  </body>
  </html>