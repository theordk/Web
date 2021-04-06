    
<?php
    
session_start ();


if(isset($_POST["ID"])? $_POST["ID"] : ""){
        $id_article = isset($_POST["ID"])? $_POST["ID"] : "";
        echo "post: " .$id_article;
        $_SESSION['idArticleEnCours']=$id_article;
    }
else{
        $id_article = $_SESSION['idArticleEnCours'];
        echo "session: " .$id_article;
    }


//Recuperer et stocker dans des variables les données de l'article en enchere dans la BDD.
 $database = "ebayece";

    //conecter a la BDD
    //Rappel : sevreur = localhost | login = root | psw = root
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    //$id_acheteur = '1';
    //$offreMax = '1';



 
      $mail = $_SESSION['mail'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body>

    <?php include("ach_entete.php"); ?>
    <?php include("ach_menu.php"); ?>

    <div class="container-fluid">

    
    <?php


if ($db_found) {

    echo "<h2>Informations sur l'article : <br></h2>";
    echo "<br>";

        //Recuperer l'ID de l'acheteur
      $sql = "SELECT ID_Acheteur FROM acheteur WHERE MailAcheteur LIKE '%$mail%'";
        $result = mysqli_query($db_handle, $sql);         
        if (mysqli_num_rows($result) != 0) {
            $acheteur= mysqli_fetch_object($result);
            $id_acheteur = $acheteur->ID_Acheteur;
            
        }

        

    
        //Recuperer le nom de l'article
        $sql = "SELECT NomArticle FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $nomArticle = $article->NomArticle;
                echo "- Nom Article : ".$nomArticle;

        }
        //Recuperer la description de l'id_article
        $sql = "SELECT Description FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $description = $article->Description;
                echo "<br>- Description : ".$description;

        }
        //Recuperer l'année de l'article
        $sql = "SELECT Annee FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $annee = $article->Annee;
                echo "<br>- Annee : ".$annee;

        }
        //Recuperer les types de ventes
        $sql = "SELECT TypeVente FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $typevente = $article->TypeVente;
                

        }
        //Recuperer le prix de l'article
        $sql = "SELECT Prix FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $prix = $article->Prix;
                echo "<br>- Prix : ". $prix ."€<br>";
        }
        //Recuperer la photo de l'article
        $sql = "SELECT PhotoArticle FROM article WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $photo = $article->PhotoArticle;
                echo "<br>". "<img src='$photo' height='200' width='200'>";

        }    
        //Recuperer l'OffreMax
        $sql = "SELECT OffreMax FROM proposeenchere WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
                
                $proposeenchere = mysqli_fetch_object($result);
                $offreMax = $proposeenchere->OffreMax;
                
        }
        //Recuperer le prix actuel
        $sql = "SELECT PrixActuel FROM proposeenchere WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

       if (mysqli_num_rows($result) != 0) {
                
                $proposeenchere = mysqli_fetch_object($result);
                $prixActuel = $proposeenchere->PrixActuel;
                
        }
        //Recuperer la date de fin de vente
        $sql = "SELECT DateFin FROM proposeenchere WHERE ID_Article Like '%$id_article%'";
        $result = mysqli_query($db_handle, $sql);

       if (mysqli_num_rows($result) != 0) {
                
                $proposeenchere = mysqli_fetch_object($result);
                $dateFin = $proposeenchere->DateFin;
                }               
        

        echo "<br>";
        echo "<br>";
        echo "<h2>Cet article est disponible en tant que :</h2>"."<br>";


        If($typevente >= 100){
            

            echo "<h4>--> Enchère:</h4>"."<br>";
            echo "A la fin du compte à rebourt, l'article sera obtenu par l'acheteur le plus offrant"."<br>";

            echo "Prix Actuel: ".$prixActuel."€<br>";
            echo "Fin de la vente le: ".$dateFin."<br><br>";
            echo "<input type='checkbox' name='contrat'> En cochant cette case, je m'engage devant la loi à payer l'article si je remporte l'enchère.<br><br>";


            echo '
                    <html>
                    <body>
                        <form action="ach_PageArticle.php" method="post" name="myForm">
                                <input placeholder="Offre" type="number" name="offre"> 
                                <input name="BoutonSubmit" type="submit" value="Encherir"> <br><br>
                                
                        </form>
                    </body>
                    <html>';




            $offre = isset($_POST["offre"])? $_POST["offre"] : "";

            If($offre > $prixActuel){
                If($offre < $offreMax){

                    $prixActuel = $offre + 1;
                    echo "Votre offre ne dépasse pas l'offre maximale."."<br>";
                    //Update du prix actuel dans la bdd
                    $sql = "UPDATE proposeenchere SET PrixActuel = ".$prixActuel." WHERE ID_Article Like ".$id_article;
                    $result = mysqli_query($db_handle, $sql);

                    echo "Prix Actuel depuis votre derniere offre : ".$prixActuel."€<br>";




                }
                elseif($offre > $offreMax){

                    $prixActuel = $offreMax + 1;
                    $offreMax = $offre;

                    //Update du prix actuel dans la bdd
                    $sql = "UPDATE proposeenchere SET PrixActuel = ".$prixActuel." WHERE ID_Article Like ".$id_article;
                    $result = mysqli_query($db_handle, $sql);
                    //Update de l'offre max dans la bdd
                    $sql = "UPDATE proposeenchere SET OffreMax = ".$offreMax." WHERE ID_Article Like ".$id_article;
                    $result = mysqli_query($db_handle, $sql);
                    //Update de l'acheteur dans la bdd
                    $sql = "UPDATE proposeenchere SET ID_Acheteur = ".$id_acheteur." WHERE ID_Article Like ".$id_article;
                    $result = mysqli_query($db_handle, $sql);

                    echo "Prix Actuel depuis votre derniere offre : ".$prixActuel."€<br>";

                    echo "Bravo, vous etes en tête de cette enchere ! <br><br><br>";

                }
                else{
                    echo "Votre offre ne dépasse pas l'offre maximale"."<br>";
                    echo "Prix Actuel depuis votre derniere offre: ".$prixActuel."€<br><br>";
                }
            }
            else{
                echo "Veuillez entrer une offre supérieure au prix actuel.<br><br>";
            }
            //header ('Location: ach_PageArticle.php'); 
            //Mettre l'article dans le panier
            date_default_timezone_set('Europe/Paris');
            $date = date('yy-m-d');

            $dateA = substr($date,0,4);
            $dateM = substr($date,5,2);
            $dateJ = substr($date,8,2);


            $dateFinA = substr($dateFin,0,4);
            $dateFinM = substr($dateFin,5,2);
            $dateFinJ = substr($dateFin,8,2);


            If( ($dateFinA > $dateA) || ($dateFinA==$dateA && $dateFinM > $dateM) || ($dateFinA==$dateA && $dateFinM == $dateM && $dateFinJ >= $dateJ) ){

                            //adjugé vendu!
                                                       
                            $sql = "UPDATE article SET ID_Acheteur = ".$id_acheteur." WHERE ID_Article Like ".$id_article;
                            $result = mysqli_query($db_handle, $sql);

                            //$sql = "UPDATE article SET Bool = '1' WHERE ID_Article Like ".$id_article;
                            //$result = mysqli_query($db_handle, $sql);
                            
                            //header ('Refresh: ach_PageArticle.php');

            }echo '<meta http-equiv="refresh">';

        }//fin enchere

        If($typevente == '010' || $typevente== '011' || $typevente== '110' || $typevente== '111'){

             echo "<h4>--> Vente Directe:</h4>"."<br>";
            //echo "Achetez le maintenant !"."<br>";

            echo "Prix: ".$prix."€<br><br>";
            echo "<input type='checkbox' name='contrat'> En cochant cette case, je m'engage devant la loi à payer l'article si j'appuie sur Acheter Maintenant.<br><br>";

            echo '
            <html>
                <body>
                    <form action="ach_panier.php" method="post" name="myForm">
                        <input name="button" type="submit" value="Acheter maintenant"> <br><br>
                    </form>
                </body>
            <html>';

            if (isset($_POST["button"])) {
                $sql = "UPDATE article SET ID_Acheteur = ".$id_acheteur." WHERE ID_Article Like ".$id_article;
                    $result = mysqli_query($db_handle, $sql);
                } 


        }//fin vente immédiate
        If($typevente== '001' || $typevente== '011' || $typevente== '101' || $typevente== '111'){

            //Recuperer l'ID_Vendeur'
            $sql = "SELECT ID_Vendeur FROM article WHERE ID_Article Like '%$id_article%'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) != 0) {
                
                $article = mysqli_fetch_object($result);
                $id_vendeur = $article->ID_Vendeur;
               

            }


            echo "<h4>--> Meilleure Offre:</h4>"."<br>";
            echo "Proposez votre offre au vendeur, il peut accepter ou vous proposer une contre-offre."."<br><br>";
            echo "<input type='checkbox' name='contrat'> En cochant cette case, je m'engage devant la loi à payer l'article si l'acheteur accepte mon offre.<br><br>";


            echo '
            <html>
            <body>
                <form action="ach_negociation.php" method="post" name="myForm">
                        <input placeholder="Offre" type="number" name="offreN"> 
                        <input name="BoutonSubmit" type="submit" value="Proposer"> <br><br>
                        
                </form>
            </body>
            <html>';

             $offreN = isset($_POST["offreN"])? $_POST["offreN"] : "";
             //echo $offreN."<br>".$id_article."<br>".$id_acheteur."<br>".$id_vendeur."<br>";
             $sql = "INSERT INTO negocie(ID_Article, ID_Acheteur, prixFinal, ID_Vendeur, Bool)
                VALUES(".$id_article.",".$id_acheteur.",".$offreN.",".$id_vendeur.",'0')";
             $result = mysqli_query($db_handle, $sql);

        }//fin négociation
        

    

      } else {
      echo "Database not found";
    }

    // fermer la connexion
    mysqli_close($db_handle);       
    ?>

    </div>

</body>
</html>
