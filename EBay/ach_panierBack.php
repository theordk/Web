 <?php

 session_start();


    $idConc = $_SESSION['idConc'];
    $prixtotal = $_SESSION['prixTotal'];
    echo "idConc:".$idConc."<br>";
    echo "Prix:".$prixtotal."<br>";

 ?>


 <!DOCTYPE html>
 <html>

 <head>
   <title>Panier</title>
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
    <h2>Paiement</h2> <br>

<?php

    
 

    //identifier le nom de base de données
    $database = "ebayece";
    
      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    
    
    $cvvForm = 0;

    $mail = $_SESSION['mail'];
    //$mail = "baptiste.boyer@edu.ece.fr";
    //$id_article = isset($_POST["ID"])? $_POST["ID"] : "";
    //echo $id_article;


    if ($db_found) {

        $sql = "SELECT ID_Acheteur FROM acheteur WHERE MailAcheteur LIKE '%$mail%'";
        $result = mysqli_query($db_handle, $sql);         
        if (mysqli_num_rows($result) != 0) {
            $acheteur= mysqli_fetch_object($result);
            $id_acheteur = $acheteur->ID_Acheteur; 
        } 
        
        

        $sql = "SELECT NumCB FROM banque WHERE ID_Acheteur LIKE ".$id_acheteur;
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
                $banque= mysqli_fetch_object($result);
                $numCB = $banque->NumCB;
                $numCBfin = substr($numCB,5,4);
            }

        $sql = "SELECT CVV FROM banque WHERE ID_Acheteur LIKE ".$id_acheteur;
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
                $banque= mysqli_fetch_object($result);
                $cvv = $banque->CVV; 
            }
        $sql = "SELECT Solde FROM banque WHERE ID_Acheteur LIKE ".$id_acheteur;
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
                $banque= mysqli_fetch_object($result);
                $solde = $banque->Solde; 
            }

        $sql = "SELECT AdresseLivraison FROM banque WHERE ID_Acheteur LIKE ".$id_acheteur;
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
                $banque= mysqli_fetch_object($result);
                $adresse = $banque->AdresseLivraison; 
            }

        echo "Entrez le CVV de votre carte banquaire terminant par : ******".$numCBfin."<br><br>";
        echo '
                    <html>
                    <body>
                        <form action="ach_PanierBack.php" method="post" name="myForm">
                                <input placeholder="CVV" type="number" name="cvv"> 
                                <input name="BoutonSubmit" type="submit" value="Confirmer"> <br><br>
                                
                        </form>
                    </body>
                    <html>'; 

            $cvvForm = isset($_POST["cvv"])? $_POST["cvv"] : "";


            

        if($cvv==$cvvForm)
        {
            if($solde >= $prixtotal)
            {


                echo "<br>Payment accepté!<br> Cet article vous sera livré au :  ".$adresse." d'ici 1 mois.<br><br><br>";
                echo "<h3>Merci d'avoir acheté sur EBayECE</h3>";
                echo "<br>";
                echo "Continuer mes achats : <input type='button' value='Retour Panier' onclick=window.location.href='ach_panier.php'>";

                
                $newSolde = $solde - $prixtotal;

                $sql = "UPDATE banque SET Solde = ".$newSolde." WHERE ID_Acheteur Like ".$id_acheteur;
                $result = mysqli_query($db_handle, $sql);

                
                $nbID = strlen($idConc);
                $i = 0;

                for($i = 0; $i < $nbID; $i+=3)
                {

                $id_article = substr($idConc,$i,3);

                //echo "<br>ID_Article: " .$id_article. "<br>";

                $sql = "UPDATE article SET Bool = '1' WHERE ID_Article LIKE ".$id_article;
                $result = mysqli_query($db_handle, $sql);
                

                
                }


                
                
            }
            else
            {
                echo "Solde insuffisant!";
            }

        }
        elseif ($cvvForm == 0)
        {

        }
        elseif ($cvv != $cvvForm)
        {
            echo "Le CVV de votre carte est incorrect, veuillez réessayer";
        }


    } else {
    echo "Database not found";
  }

  ?>
</div>
</body>
</html>