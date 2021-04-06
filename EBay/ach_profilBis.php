<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

?>

<!DOCTYPE html>
<html>

<head>
 <title>Profil Acheteur</title>
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


  <!--Récupérer Liens --> 
  <div class="container-fluid">
    <h2 class="card-title" style="text-decoration: underline;">Profil Acheteur</h2> <br>

    <?php 
  //identifier le nom de base de données
$database = "ebayece";

      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$mail_ach = $_SESSION['mail'];
$sql = "SELECT * FROM Acheteur WHERE MailAcheteur LIKE '%$mail_ach%'";
$result = mysqli_query($db_handle, $sql);   

if (mysqli_num_rows($result) != 0) {
        //echo "Adresse Mail correcte!"."<br>";

  $acheteur= mysqli_fetch_object($result);
  $id_ach = $acheteur->ID_Acheteur;
  $nom = $acheteur->NomAcheteur;
  $prenom = $acheteur->PrenomAcheteur;

  echo "<h4>Mes information personnelles</h4>"."<br>";

    echo "Prenom : ".$prenom."<br>"; 
    echo "Nom : ".$nom."<br>";
    echo "Mail : ".$mail_ach."<br>"."<br>";

    echo "<h4>Mes informations Bancaires</h4>"."<br>";
}

      //si la BDD existe, faire le traitement
if ($db_found) {
  $sql = "SELECT ID_CB, NumCB, CVV, Solde, AdresseLivraison FROM banque WHERE ID_Acheteur LIKE '%$id_ach%'";
  $result = mysqli_query($db_handle, $sql);

  if (mysqli_num_rows($result) != 0) {
        //echo "Adresse Mail correcte!"."<br>";

    $banque= mysqli_fetch_object($result);
    $id_cb = $banque->ID_CB;
    $num_cb = $banque->NumCB;
    $cvv = $banque->CVV;
    $solde = $banque->Solde;
    $livraison = $banque->AdresseLivraison;

    echo "Id Propriétaire Carte Bancaire : ".$id_cb."<br>"; 
    echo "Adresse de Livraison : ".$livraison."<br>";
    echo "NumCB : ".$num_cb."<br>";
    echo "CVV : ".$cvv."<br>"; 
    echo "Solde : ".$solde."<br>"."<br>";
  }else{
    echo "Vous n'avez pas encore de coordonées bancaires"."<br>";
  }

} else {
  echo "Database not found";
}

  // fermer la connexion
mysqli_close($db_handle);
?>
        <br>
    <h5>Vous n'avez pas de coordonées bancaires ? Veuillez remplir ce formulaire : </h5>

    <form action="ach_coord_banque.php" method="post">

     <table>
      <br>
      <tr>
       <td>Numéro CB (10 chiffres):</td>
       <td><input type="number" name="numero"></td>
     </tr>

     <tr>
       <td>CVV:</td>
       <td><input type="number" name="cvv"></td>
     </tr>

     <tr>
       <td>Adresse de livraison:</td>
       <td><input type="text" name="adresse"></td>
     </tr>

     <tr>
       <td>Solde sur votre compte:</td>
       <td><input type="number" name="solde"></td>
     </tr>

     <tr>
      <td colspan="2" align="center">
        <input type="submit" name="BoutonSubmit" value="Ajouter">
        <input type="reset" name="button2" value="Vider les données" />
      </td>
    </tr>
  </table>  

</form>

</div>

</body>
</html>