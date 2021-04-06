<?php
    session_start();
    //recuperer les données venant de la page HTML
    $numero = isset($_POST["numero"])? $_POST["numero"] : "";
    $cvv = isset($_POST["cvv"])? $_POST["cvv"] : "";
    $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $solde = isset($_POST["solde"])? $_POST["solde"] : "";
    //$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    //identifier votre BDD
    $database = "ebayece";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si le bouton est cliqué

    $mail_ach = $_SESSION['mail'];
    $sql = "SELECT ID_Acheteur FROM Acheteur WHERE MailAcheteur LIKE '%$mail_ach%'";
    $result = mysqli_query($db_handle, $sql);   

    if (mysqli_num_rows($result) != 0) {
            //echo "Adresse Mail correcte!"."<br>";

      $acheteur= mysqli_fetch_object($result);
      $id_ach = $acheteur->ID_Acheteur;
    }

        if (isset($_POST["BoutonSubmit"])) {
            if ($db_found) {
                        $sql = "INSERT INTO banque(ID_CB, NumCB, CVV, ID_Acheteur, AdresseLivraison, Solde)
                        VALUES('$id_ach', '$numero', '$cvv', '$id_ach', '$adresse', $solde)";
                        $result = mysqli_query($db_handle, $sql);
                        //echo "Compte crée avec succès" . "<br>";
                        header ('Location: ach_profilBis.php');
                        
                        }
            
            else {
                    echo "Database not found";
                }
            }


//fermer la connexion
mysqli_close($db_handle);
?>