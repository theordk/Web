<!DOCTYPE html>

<html>

  <head>

    <title>Creer compte Vendeur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="co.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
      function validateForm() {
        var x = document.forms["myForm"]["identifiant"].value;
        var y = document.forms["myForm"]["passw"].value;
        if (x == "" || x == null || y == "" || y == null) {
          alert("Un des champs du formulaire mal rempli");
          return false;
        }
      }
    </script>
    
  </head>

  <body>

    <div id="container">
      
      <form action="creer_compte_vendeurBack.php" method="post" name="myForm" enctype="multipart/form-data">
        <h1>Creer un compte Vendeur ECE Ebay</h1> <br><br>

        <table>
        <tr>
          <td><p>Nom</p></td>
          <td><input placeholder="Nom..." type="text" name="nom"></td>
        </tr>
        <tr>
          <td><p>Prenom</p></td>
          <td><input placeholder="Prenom..." type="text" name="prenom"></td>
        </tr>
        <tr>
          <td><p>Mail</p></td>
          <td><input placeholder="Mail..." type="text" name="mail"></td>
        </tr>
        <tr>
          <td><p>Mot de Passe</p></td>
          <td><input placeholder="Choisir password" type="password" name="passw"></td>
        </tr>
        <tr>
          <td><p>Photo Profil</p></td>
          <td><input type="file" name="photoProfil"></td>
        </tr>
        <tr>
          <td><p>Photo Fond Ecran</p></td>
          <td><input type="file" name="photoEcran"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input name="BoutonSubmit" type="submit" value="Creer compte">
            <input type="button" value="Retour" onclick="javascript:history.back()"></td>      
        </tr>
      </table>
        <!--
        <select name="compte" id="compte-select">
              <option value="Acheteur">Acheteur</option>
              <option value="Vendeur">Vendeur</option>
        </select> <br><br>
        <input placeholder="Nom..." type="text" name="nom"> <br><br>
        <input placeholder="Prenom..." type="text" name="prenom"> <br><br>
        <input placeholder="Mail..." type="text" name="mail"> <br><br>
        <input placeholder="Choisir password" type="password" name="passw"> <br><br>
        <a>PhotoProfil</a>
        <input type="file" name="photoProfil">
        <a>PhotoFondEcran</a>
        <input type="file" name="photoEcran">
        
        <input name="Bouton" type="button" value="Retour" onclick="javascript:history.back()">-->
      </form> 

    </div>

  </body>

</html>