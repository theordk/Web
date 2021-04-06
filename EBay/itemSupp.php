<?php

	//récupérer les données venant de formulaire
	$ID_Article = isset($_POST["ID_Article"])? $_POST["ID_Article"] : "";
	//identifier votre BDD
	$database = "ebayece";
	//connectez-vous de votre BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//Partie 3: Effacer un article
	//*****************************
	if (isset($_POST['button3'])) {
		if ($db_found) {
			$sql = "SELECT * FROM article";
			if ($MailVendeur != "") {
				$sql .= " WHERE ID_Article LIKE '%$ID_Article%'";
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) == 0) {
				//Livre inexistant
				echo "Cannot delete. Vendeur not found. <br>";
			} else {
				$sql = "DELETE FROM article WHERE ID_Article LIKE '%$ID_Article%'";
				mysqli_query($db_handle, $sql);
				//echo "Delete successful. <br>";
				header ('Location: gerer_item.php');
			}
		}
		else {
			echo "Database not found";
		}
	}
	//fermer la connexion
	mysqli_close($db_handle);
?>