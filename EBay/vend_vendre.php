<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
 session_start ();
 ?>

<!DOCTYPE html>
<html>

  <head>
     <title>Vendre</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        
  </head>

  <body>

    <?php include("vend_entete.php"); ?>
       <?php include("vend_menu.php"); ?>

        <div class="container-fluid">

          <h3>Publier un item</h3>

          
          <form action="vend_vendreBack.php" method="post" enctype="multipart/form-data">

           <table>

           <tr>
             <td>Nom:</td>
             <td><input type="text" name="nom"></td>
           </tr>

           <tr>
             <td>Description:</td>
             <td><input type="text" name="description"></td>
           </tr>

           <tr>
             <td>Année:</td>
             <td><input type="number" name="year"></td>
           </tr>

           <tr>
             <td>Type de vente:</td>
             <td>
              <input type="checkbox" name="vente1" >Enchere <br>
              <input type="checkbox" name="vente2" >Vente Immediate <br>
              <input type="checkbox" name="vente3" >Negociation
            </td>
           </tr>

           <tr>
             <td>Prix:</td>
             <td><input type="number" name="price"></td>
           </tr>

           <tr>
             <td><label>Catégorie:</label></td>
             <td><select name="categorie">
                 <option value="Ferraille et Tresor" selected="selected">Ferraille/Tresor</option>
                 <option value="Bon pour le Musée">Bon pour Musée</option>
                 <option value="Accessoires VIP">Accessoires VIP</option></select>
              </td>
            </tr>

            <tr>
              <td><label>Telecharger une photo</label></td>
              <td><input type="file" name="photo"></td> 
            </tr>  

            <tr>
              <td><label>Telecharger une video</label></td>
              <td><input type="file" name="video"></td>
            </tr>
            <br>
            <!--
            <tr>
             <td>Confirmez votre mail de vendeur: </td>
             <td><input type="text" name="verifMail"></td>
           </tr>-->
            <br>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="BoutonSubmit" value="Publier">
                <input type="reset" name="button2" value="Vider les données" />
              </td>
            </tr>
            </table>  

          </form>
          </div>

    </body>
</html>

