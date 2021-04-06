<?php

	$login = isset($_POST["mail"])? $_POST["mail"] : ""; 
	$pass = isset($_POST["passw"])? $_POST["passw"] : "";

	//mots de passe stockés dans le serveur 
	$logs = array(
		"admin@ebayece.fr" => "adminmdp", 
	);

	$connexion = false;
	
	for ($i = 0; $i < count($logs); $i++) { 
		if ($logs[$login] == $pass) { 
			$connexion = true;
			break; }
	}

	if ($connexion) {
		session_start();
        $_SESSION['mail'] = $_POST['mail'];
        //echo "Connecte a la session admin avec mail : " . $_SESSION['mail'];
		header ('Location: admin1.php');
	} else {
		header ('Location: coAdmin.html');
	} 
?>