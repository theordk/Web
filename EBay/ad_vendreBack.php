<?php
    //recuperer les données venant de la page HTML

    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $year = isset($_POST["year"])? $_POST["year"] : "";
    $enchere = isset($_POST["vente1"])? $_POST["vente1"] : "";
    $directe = isset($_POST["vente2"])? $_POST["vente2"] : "";
    $negociation = isset($_POST["vente3"])? $_POST["vente3"] : "";
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $prix = isset($_POST["price"])? $_POST["price"] : "";

    $video = isset($_POST["video"])? $_POST["video"] : "";
    $id = 1; //car l'admin est le vendeur n°1 dans la BBD


    //identifier votre BDD
    $database = "ebayece";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //si le bouton est cliqué

    date_default_timezone_set('Europe/Paris');
    $date = date('y-m-d');
    $dateJ = date('d');
    $dateM = date('m');
    $dateA = date('yy');

        if (isset($_POST["BoutonSubmit"])) {
            if ($db_found) {

                //STOCKAGE PHOTO
                if (isset($_FILES['photo']['tmp_name'])) {  
                    $taille = getimagesize($_FILES['photo']['tmp_name']);
                    $largeur = $taille[0];
                    $hauteur = $taille[1];
                    $largeur_miniature = 300;
                    $hauteur_miniature = $hauteur / $largeur * 300;
                    $im = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
                    $im_miniature = imagecreatetruecolor($largeur_miniature
                    , $hauteur_miniature);
                    imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
                    imagejpeg($im_miniature, 'miniatures/'.$_FILES['photo']['name'], 90);
                    
                    $photo = 'miniatures/'.$_FILES['photo']['name'];
                    

                }

                

               if($enchere == "on")
                {
                    $typeVente = "1";
                }
                else 
                {
                    $typeVente = "0";
                }
                if($directe== "on")
                {
                    $typeVente .= "1";
                }
                else 
                {
                    $typeVente .= "0";
                }
                if($negociation == "on")
                {
                    $typeVente .= "1";
                }
                else 
                {
                    $typeVente .= "0";
                } 

                if($typeVente=='101')
                    { $typeVente = '100';
                }
                if($typeVente=='111')
                    { $typeVente = '110';
                }
                
                $sql = "INSERT INTO Article(NomArticle, Annee, Categorie, DateMiseEnVente ,Description, Prix, TypeVente, ID_Vendeur, PhotoArticle, VideoArticle, Bool)
                VALUES('$nom', '$year', '$categorie', '$date','$description','$prix', '$typeVente', '$id', '$photo', '$video','0')";
                $result = mysqli_query($db_handle, $sql);




                 $sql = "SELECT ID_Article FROM article WHERE NomArticle LIKE '%$nom%'";
                $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) != 0) {
                    
                    $article = mysqli_fetch_object($result);
                    $idA = $article->ID_Article;
                    
                    }


                if($typeVente>=100){ //Enchere

                $dateM +=1;
                $datefin = $dateA."-".$dateM."-".$dateJ;


                $sql = "INSERT INTO proposeenchere(ID_Article, ID_Acheteur,PrixActuel, DateDebut , DateFin, OffreMax)
                        VALUES('$idA','1','1', '$date','$datefin','1')";
                $result = mysqli_query($db_handle, $sql);
                }

                header ('Location: ad_vendre.php');
                }

            } else {
                    echo "Database not found";
            }
        

//fermer la connexion
mysqli_close($db_handle);
?>