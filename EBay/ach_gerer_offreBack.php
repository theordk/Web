<?php
session_start ();
//Recuperer et stocker dans des variables les données de l'article en enchere dans la BDD.
 $database = "ebayece";

    //conecter a la BDD
    //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $id_article = isset($_POST["id_item"])? $_POST["id_item"] : "";
    $id_vendeur = isset($_POST["id_acheteur"])? $_POST["id_acheteur"] : "";
    $contre_offre = isset($_POST["contre_offre"])? $_POST["contre_offre"] : "";

    $mail = $_SESSION['mail'];







        $sql = "SELECT ID_Acheteur FROM acheteur WHERE MailAcheteur LIKE '%$mail%'";
        $result = mysqli_query($db_handle, $sql); 
        if (mysqli_num_rows($result) != 0) {
            $acheteur= mysqli_fetch_object($result);
            $id_acheteur = $acheteur->ID_Acheteur;
            
        }

	if (isset($_POST["BoutonSubmit1"])) { //contre offre
            if ($db_found) {

                            $sql = "UPDATE negocie SET PrixFinal = ".$contre_offre." WHERE ID_Acheteur LIKE ".$id_acheteur." AND ID_Article LIKE ".$id_article;
                            $result = mysqli_query($db_handle, $sql);


                            $sql = "UPDATE negocie SET Bool = '0' WHERE ID_Acheteur LIKE ".$id_acheteur." AND ID_Article LIKE ".$id_article;
                            $result = mysqli_query($db_handle, $sql);
                            header ('Location: ach_gerer_offre.php');



 }
            else {
                    echo "Database not found";
                }
        }

    if (isset($_POST["BoutonSubmit2"])) { //accepter
            if ($db_found) {
            				//article vendu!
                            $sql = "UPDATE article SET ID_Acheteur = ".$id_acheteur." WHERE ID_Article Like ".$id_article;
                            $result = mysqli_query($db_handle, $sql);

                            $sql = "DELETE FROM negocie WHERE ID_Acheteur LIKE ".$id_acheteur." AND ID_Article LIKE ".$id_article;
                            $result = mysqli_query($db_handle, $sql);
                            header ('Location: ach_gerer_offre.php');
            }
            else {
                    echo "Database not found";
                }
        }

?>