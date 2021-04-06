<?php

	//recuperer les données venant de la page HTML
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$password = isset($_POST["password"])? $_POST["password"] : "";
	

	//identifier votre BDD
	$database = "ebayece";

	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//si le bouton est cliqué
	if ($_POST["button1"]) {
		if ($db_found) {
			$sql = "SELECT * FROM vendeur";
			if ($mail != "") {
				//on cherche le vendeur avec les paramètres titre et auteur
				$sql .= " WHERE MailVendeur LIKE '%$mail%'";
				if ($password != "") {
					$sql .= " AND MdpVendeur LIKE '%$password%'";
				}
			}
			//result = 1 si c'est bon, 0 sinon
			$result = mysqli_query($db_handle, $sql);
			//tester s'il y a de résultat
			if (mysqli_num_rows($result) == 0) {
				header ('Location: coAdmin.html');
			} else {
				//on trouve le vendeur recherché
				while ($data = mysqli_fetch_assoc($result)) {
					session_start();
        			$_SESSION['mail'] = $_POST['mail'];
					header ('Location: admin1.php');
					//echo "Co Okay";
				}
			}
		} else {
			echo "Database not found";
			}
	}

	//fermer la connexion
	mysqli_close($db_handle);
?>