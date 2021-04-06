 <?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 
 ?>

 <!DOCTYPE html>
 <html>

 <head>
   <title>Gerer nego Vendeur</title>
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
  
  <div class="container-fluid">
    <h2>Mes propositions d'offres du moment</h2> <br>
  
  

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
        $id_vend = $vendeur->ID_Vendeur;
      }
      //OK j'ai l'ID de mon vendeur 

      //si la BDD existe, faire le traitement
      if ($db_found) {
        //Je selectionne toutes les infos de negociation sur les articles qui correspondent au vendeur
        $sql = "SELECT * FROM negocie WHERE ID_Vendeur LIKE '%$id_vend%' AND Bool LIKE '0'";
        $result = mysqli_query($db_handle, $sql);
     
        //$req = "SELECT PhotoArticle FROM article WHERE ID_Vendeur LIKE '%$id_vend%' AND Bool LIKE '0'";
        //$resultb = mysqli_query($db_handle, $req);

        echo "Formulaire de gestion d'une offre : <br><br>"; 
         echo '
          <html>
          <body>
            <form action="vend_gerer_offreBack.php" method="post" name="myForm">
            <tr>
              <td>ID Article : </td>
              <td><input placeholder="ID_Article" type="number" name="id_item"><br><br></td>
            </tr>
            <tr>
              <td>ID acheteur : </td>
              <td><input placeholder="ID_Acheteur" type="number" name="id_acheteur"><br><br></td>
            </tr>
            <tr>
              <td>Nouvelle offre : </td>
              <td><input placeholder="Montant" type="number" name="contre_offre"></td>
              <td><input name="BoutonSubmit1" type="submit" value="Envoyer"><br><br></td>
            </tr>
            <tr>
              <td>Accepter offre : </td>
              <td><input name="BoutonSubmit2" type="submit" value="Accepter Offre"><br><br></td>
            </tr>     
            </form>
          </body>
          <html>';
          echo "Voici les offres qui ont été faites sur vos articles en vente."."<br>";
          echo "Vous pouvez choisir d'accepter cette/ces offre(s) ou bien de proposer une/des nouvelle(s) offres à l'acheteur.<br><br>";
        //j'affiche les donnes de la negociation
        echo "<table border='1'>"; 
        echo "<tr>";
        echo "<th>" . "ID_Article" . "</th>";
        echo "<th>" . "ID_Acheteur" . "</th>";
        echo "<th>" . "Prix en € " . "</th>";
        //echo "<th>" . "ID_Vendeur" . "</th>";
        echo "</tr>"; 
       

        while ($data = mysqli_fetch_assoc($result)) {
         
          echo "<tr>";
          echo "<td>" . $data['ID_Article'] . "</td>";
          echo "<td>" . $data['ID_Acheteur'] . "</td>";
          echo "<td>" . $data['prixFinal'] . "</td>";
          //echo "<td>" . $data['ID_Vendeur'] . "</td>";   
          //$image = $data['PhotoArticle'];
          //echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
          echo "</tr>";    

        }

        
      } 


      else {
        echo "Database not found";
      }

       
  // fermer la connexion
      mysqli_close($db_handle);
      ?>
    
  </div>

  
</body>
</html>