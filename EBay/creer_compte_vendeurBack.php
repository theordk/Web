<?php
    //recuperer les données venant de la page HTML
    $compte = "Vendeur";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $password = isset($_POST["passw"])? $_POST["passw"] : "";
    //identifier votre BDD
    $database = "ebayece";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si le bouton est cliqué



        if (isset($_POST["BoutonSubmit"])) {
            if ($db_found) {


                    if (isset($_FILES['photoProfil']['tmp_name'])) {  
                    
                    $taille = getimagesize($_FILES['photoProfil']['tmp_name']);
                    $largeur = $taille[0];
                    $hauteur = $taille[1];
                    $largeur_photo = 300;
                    $hauteur_photo = $hauteur / $largeur * 300;
                    $im = imagecreatefromjpeg($_FILES['photoProfil']['tmp_name']);
                    $im_photo = imagecreatetruecolor($largeur_photo
                    , $hauteur_photo);
                    imagecopyresampled($im_photo, $im, 0, 0, 0, 0, $largeur_photo, $hauteur_photo, $largeur, $hauteur);
                    imagejpeg($im_photo, 'photoVendeur/'.$_FILES['photoProfil']['name'], 90);
                    
                    $photoProfil = 'photoVendeur/'.$_FILES['photoProfil']['name'];
                    echo  "<img src='$photoProfil'>";

                }

                if (isset($_FILES['photoEcran']['tmp_name'])) {  
                    echo "helloooo";
                    $taille = getimagesize($_FILES['photoEcran']['tmp_name']);
                    $largeur = $taille[0];
                    $hauteur = $taille[1];
                    $largeur_photo = 300;
                    $hauteur_photo = $hauteur / $largeur * 300;
                    $im = imagecreatefromjpeg($_FILES['photoEcran']['tmp_name']);
                    $im_photo = imagecreatetruecolor($largeur_photo
                    , $hauteur_photo);
                    imagecopyresampled($im_photo, $im, 0, 0, 0, 0, $largeur_photo, $hauteur_photo, $largeur, $hauteur);
                    imagejpeg($im_photo, 'photoEcran/'.$_FILES['photoEcran']['name'], 90);
                    
                    $photoEcran = 'photoEcran/'.$_FILES['photoEcran']['name'];
                    echo  "<img src='$photoEcran'>";

                }
                          

                $sql = "INSERT INTO Vendeur(NomVendeur, PrenomVendeur, MailVendeur, MdpVendeur, PhotoVendeur, PhotoEcran)
                        VALUES('$nom', '$prenom', '$mail', '$password', '$photoProfil', '$photoEcran')";
                        $result = mysqli_query($db_handle, $sql);
                        //echo "Compte crée avec succès" . "<br>";
                        session_start();
                        $_SESSION['mail'] = $_POST['mail'];
                        header ('Location: vendeur1.php');
                        }
                    
            } else {
                    echo "Database not found";
                }
    
//fermer la connexion
mysqli_close($db_handle);
?>