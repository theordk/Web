<?php
    //recuperer les données venant de la page HTML
    $compte = isset($_POST["compte"])? $_POST["compte"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $password = isset($_POST["passw"])? $_POST["passw"] : "";
    //$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    //identifier votre BDD
    $database = "ebayece";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si le bouton est cliqué

        if (isset($_POST["BoutonSubmit"])) {
            if ($db_found) {
                $sql = "SELECT * FROM Acheteur";
                    if ($mail != "") {
                        //on cherche le mail dans la BDD pour voir si il est deja utilisé
                        $sql .= " WHERE MailAcheteur LIKE '%$mail%'";
                        }
                    $result = mysqli_query($db_handle, $sql);
                    //regarder s'il y a un résultat
                    if (mysqli_num_rows($result) != 0) {
                        //l'email est deja utilisé
                        echo "Cette addresse mail est déjà utilisée.
                        Veuillez entrer une nouvelle addresse mail";
                    } else {
                        $sql = "INSERT INTO Acheteur(NomAcheteur, PrenomAcheteur, MailAcheteur, MdpAcheteur)
                        VALUES('$nom', '$prenom', '$mail', '$password')";
                        $result = mysqli_query($db_handle, $sql);
                        //echo "Compte crée avec succès" . "<br>";
                        session_start();
                        $_SESSION['mail'] = $_POST['mail'];
                        header ('Location: acheteur1.php');
                        
                        }
                    } 
            } else {
                    echo "Database not found";
                }


//fermer la connexion
mysqli_close($db_handle);
?>