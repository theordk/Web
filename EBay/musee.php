<!DOCTYPE html>
<html>

  <head>
     
      <title>Musee Items</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
  </head>

  <body>

    <?php include("entete.php"); ?>
    <?php include("menu.php"); ?>

    <div class="container-fluid">
      <h4>Nos articles Bons pour le Musee</h4><br>
      <p>Pour voir les articles plus en détail, les acheter, participer aux enchères, aux négociations, ou bien mettre des articles en vente, veuillez vous connecter vous connecter ou vous inscrire avec le lien suivant : </p> 
      <a href="connexion.html">Connexion/Inscription</a> <br><br>
    <?php

    //identifier le nom de base de données
    $database = "ebayece";

      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

      //si la BDD existe, faire le traitement
    if ($db_found) {
      $sql = "SELECT * FROM article WHERE Categorie LIKE 'Bon pour le Musee' AND Bool = '0'";
      $result = mysqli_query($db_handle, $sql);

      echo "Liste des items en vente <br>";
      echo "<br>";

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