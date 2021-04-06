<?php
session_start ();
//Recuperer et stocker dans des variables les données de l'article en enchere dans la BDD.
 $database = "ebayece";

    //conecter a la BDD
    //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $id_article = isset($_POST["id_item"])? $_POST["id_item"] : "";
    $id_acheteur = isset($_POST["id_acheteur"])? $_POST["id_acheteur"] : "";
    $contre_offre = isset($_POST["contre_offre"])? $_POST["contre_offre"] : "";

    $mail = $_SESSION['mail'];


        $sql = "SELECT ID_Vendeur FROM vendeur WHERE MailVendeur LIKE '%$mail%'";
        $result = mysqli_query($db_handle, $sql); 
        if (mysqli_num_rows($result) != 0) {
            $vendeur= mysqli_fetch_object($result);
            $id_vendeur = $vendeur->ID_Vendeur;
            
        }

	if (isset($_POST["BoutonSubmit1"])) { //contre offre
            if ($db_found) {

                        $sql = "DELETE FROM negocie WHERE ID_Acheteur LIKE ".$id_acheteur." AND ID_Article LIKE ".$id_article;
                        $result = mysqli_query($db_handle, $sql);

                        $sql = "INSERT INTO negocie(ID_Article, ID_Acheteur, prixFinal, ID_Vendeur, Bool)
                				VALUES('$id_article', '$id_acheteur', '$contre_offre', '$id_vendeur','1')";
                        $result = mysqli_query($db_handle, $sql);
                        header ('Location: vend_gerer_offre.php');

 }
            else {
                    echo "Database not found";
                }
        }

    if (isset($_POST["BoutonSubmit2"])) { //accepter
            if ($db_found) {
            				//article vendu!
                echo "je suis dans la boucle";
                            $sql = "UPDATE article SET ID_Acheteur = ".$id_acheteur." WHERE ID_Article Like ".$id_article;
                            $result = mysqli_query($db_handle, $sql);

                            $sql = "DELETE FROM negocie WHERE ID_Acheteur LIKE ".$id_acheteur." AND ID_Article LIKE ".$id_article;
                            $result = mysqli_query($db_handle, $sql);
                            header ('Location: vend_gerer_offre.php');
            }
            else {
                    echo "Database not found";
                }
        }

?>