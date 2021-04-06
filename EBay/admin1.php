<?php
      // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>

<!DOCTYPE html>
<html>

<head>
 <title>Acceuil Admin</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 
</head>

<body>
  
  <?php include("ad_entete.php"); ?>
  <?php include("ad_menu.php"); ?>

  <div class="container-fluid">
    <h3>Nos catégories d'items</h3> <br>
    <div class="row">
      <div class="col-sm-4">
        <h4 class="text-center"><a href="ad_feraille.php">Tresor/Feraille</a></h4>
        <img src="4.jpg" class="img-thumbnail">
        <div class="caption">Voici une selection de nos tous nouveaux articles en Trésor et Ferraille. Vous y trouverez des objets dénichés dans les vides-greniers, les brocantes ou des biens de familles.</div>
      </div>
      <div class="col-sm-4">
        <h4 class="text-center"><a href="ad_musee.php">Bons pour musee</a></h4>
        <img src="5.jpg" class="img-thumbnail">
        <div class="caption">Dans cette rubriques, retrouvez les plus belles oeuvres dignes d'être affichees dans un musee. Peintures, tableaux, sculptures : vous y trouverez votre bonheur.</div>
      </div>
      <div class="col-sm-4">
        <h4 class="text-center"><a href="ad_vip.php">Luxe/VIP</a></h4>
        <img src="6.jpg" class="img-thumbnail">
        <div class="caption">Vous êtes un amoureux du luxe et des objets qui brillent ? Cette rubrique vous comblera. Ici, vous trouverez des objets plus beaux les uns que les autres. Attention, cette séléction est reservée à une élite VIP.</div>
      </div>
    </div>
  </div>

  <?php include("ad_footer.php"); ?>

</body>
</html>