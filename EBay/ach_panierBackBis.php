<?php

session_start();

//identifier le nom de base de données
    $database = "ebayece";
    $prixtotal = 0;
    
      //conecter a la BDD
      //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //$id_acheteur = 1;
    //$prixtotal = 50;
    $cvvForm = 0;
    $id_article =  $_SESSION['ID_Article'];

    $cvvForm = isset($_POST["cvv"])? $_POST["cvv"] : "";

    if($db_found) {

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


    	 if($cvv==$cvvForm){

            if($solde >= $prixtotal){
                //
                echo $id_article;
                echo "<br>Paiement accepté!<br> Cet article vous sera livré au : ".$adresse." d'ici 1 mois.<br><br><br>";
                echo "<h3>Merci d'avoir acheté sur EBayECE</h3>";
                echo "<br>";
                echo "Continuer mes achats : <input type='button' value='Retour Panier' onclick=window.location.href='ach_panier.php'>";
                //echo $id_article;
                $newSolde = $solde - $prixtotal;

                $sql = "UPDATE banque SET Solde = ".$newSolde." WHERE ID_Acheteur Like ".$id_acheteur;
                $result = mysqli_query($db_handle, $sql);
                    
                    //echo $id_article;
               
                $sql = "UPDATE article SET Bool = '1' WHERE ID_Article LIKE ".$id_article;
                $result = mysqli_query($db_handle, $sql);
                //echo $id_article;
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

    }

    

    

?>

