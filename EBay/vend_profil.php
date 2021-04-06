<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

//identifier le nom de base de données
      $database = "ebayece";

      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
      $db_handle = mysqli_connect('localhost', 'root', '');
      $db_found = mysqli_select_db($db_handle, $database);

      $mail_vend = $_SESSION['mail'];
      $sql = "SELECT ID_Vendeur, NomVendeur, PrenomVendeur, PhotoVendeur, PhotoEcran FROM Vendeur WHERE MailVendeur LIKE '%$mail_vend%'";
      $result = mysqli_query($db_handle, $sql);   

      if (mysqli_num_rows($result) != 0) {
        //echo "Adresse Mail correcte!"."<br>";

        $vendeur= mysqli_fetch_object($result);
        $id = $vendeur->ID_Vendeur;
        $nom = $vendeur->NomVendeur;
        $prenom = $vendeur->PrenomVendeur;
        $photovend = $vendeur->PhotoVendeur;
        $photoecran = $vendeur->PhotoEcran;
      }
?>

<!DOCTYPE html>
<html>

<head>
 <title>Profil Vendeur</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

  <?php include("vend_entete.php"); ?>
    <?php include("vend_menu.php"); ?>

  <div class="card text-white">
    <!--Récupérer fond d'ecran du vendeur -->
    <?php echo "<img src='$photoecran' height='600' width='960'>"; ?> 
    <!--<img src="falaise.jpg" class="card-img" alt="...">-->
    <div class="card-img-overlay">
      <h1 class="card-title">Profil Vendeur</h1>
      
      <!--Récupérer l'image du vendeur -->
      <?php echo "<img src='$photovend' height='150' width='150'>"; ?>  

      <!--Récupérer Nom + Prenom -->   
      <h3 class="card-text text-white">Prenom : <?php echo $prenom; ?> <br> Nom : <?php echo $nom; ?></h3> <br>
      
      <!--Récupérer Liens --> 
      <h5 class="text-center"><a href="vend_vente.php">Mes items en vente</a></h5>
      <h5 class="text-center"><a href="vend_vendu.php">Mes items en vendus</a></h5>

    </div>
  </div>

</body>
</html>