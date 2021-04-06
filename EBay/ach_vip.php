<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>

<!DOCTYPE html>
<html>

<head>
 <title>Acheteur VIP</title>
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

  <!--Affichage des item en ferraille pour Acheteur -->
  <div class="container-fluid">
   <h2>VIP</h2><br>
    <p>Voici les différents items disponibles en vente dans la catégorie VIP.</p><br>

   <?php

    //identifier le nom de base de données
   $database = "ebayece";

      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
   $db_handle = mysqli_connect('localhost', 'root', '');
   $db_found = mysqli_select_db($db_handle, $database);

      //si la BDD existe, faire le traitement
   if ($db_found) {
    $sql = "SELECT * FROM article WHERE Categorie LIKE 'Accessoires VIP' AND Bool = '0'";
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

<div class="container">

  <form action="ach_pageArticle.php" method="post">

    <table>
      <br><br>
      <h4>Voir un article</h4>
      <tr>
       <td>ID:
       <input type="number" name="ID"></td>
       <td>
         <input type="submit" name="button" value="Voir">
       </td>
     </tr>

   </form>
 </div>

</body>
</html>