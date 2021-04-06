<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 ?>


<!DOCTYPE html>
<html>

<head>
	<title>Ajout Vendeur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<style type="text/css">

		html,body{
			height:100%;
			margin:0;
			padding:0;
		}

		.board-container{
			box-sizing:border-box;
		}

		.board{
			background-color:#03224C;
			width:100%;
			padding:30px;
			color: white;
			text-align: center;
			font-size: 35px;
		}

		.border {
			width: 400px;
			height: 500px;
			border: 10px solid  black;
			border-radius: 10px;
			text-align: center;
		}

		form {
			margin-left: 450px;
			margin-top: 100px;
		}

	</style>

</head>

	<body>
		<div class="container-fluid">
			<div class="row board-container">
				<div class="board">Ajouter un vendeur</div> 
			</div>

			<form action="ajout_vendeurBack.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Prenom</td>
					<td><input type="text" name="prenom"></td>
				</tr>
				<tr>
					<td>Mail</td>
					<td><input type="text" name="mail"></td>
				</tr>
				<tr>
					<td>Mot de Passe</td>
					<td><input type="text" name="passw"></td>
				</tr>
				<tr>
					<td>Photo Profil</td>
					<td><input type="file" name="photoProfil"></td>
				</tr>
				<tr>
					<td>Photo Fond Ecran</td>
					<td><input type="file" name="photoEcran"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="BoutonSubmit" value="Ajouter">
						<input type="button" value="Retour" onclick="javascript:history.back()">
					</td>
				</tr>
			</table>
		</form>
		</div>

	</body>
</html>