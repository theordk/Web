<?php

	//récupérer les données venant de formulaire
	$MailVendeur = isset($_POST["MailVendeur"])? $_POST["MailVendeur"] : "";
	//identifier votre BDD
	$database = "ebayece";
	//connectez-vous de votre BDD
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//Partie 3: Effacer un vendeur
	//*****************************
	if (isset($_POST['button3'])) {
		if ($db_found) {
			$sql = "SELECT * FROM vendeur";
			if ($MailVendeur != "") {
				$sql .= " WHERE MailVendeur LIKE '%$MailVendeur%'";
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) == 0) {
				//Livre inexistant
				echo "Cannot delete. Vendeur not found. <br>";
			} else {
				$sql = "DELETE FROM vendeur WHERE MailVendeur LIKE '%$MailVendeur%'";
				mysqli_query($db_handle, $sql);
				//echo "Delete successful. <br>";
				header ('Location: gerer_vendeur.php');
			}
		}
		else {
			echo "Database not found";
		}
	}
	//fermer la connexion
	mysqli_close($db_handle);
?>