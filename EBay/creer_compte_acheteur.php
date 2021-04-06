<!DOCTYPE html>

<html>

  <head>

    <title>Creer compte Acheteur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="co.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
      function validateForm() {
        var a = document.forms["myForm"]["nom"].value;
        var b = document.forms["myForm"]["prenom"].value;
        var c = document.forms["myForm"]["mail"].value;
        var d = document.forms["myForm"]["passw"].value;
        if (a == "" || a == null 
            || b == "" || b == null
            || c == "" || c == null
            || d == "" || d == null) {
          alert("Un des champs du formulaire mal rempli");
          return false;
        }
      }
    </script>
    
  </head>

  <body>

    <div id="container">
      
      <form action="creer_compte_acheteurBack.php" method="post" name="myForm">
        <h1>Creer un compte Acheteur ECE Ebay</h1> <br><br>

        <table>
        <tr>
          <td><p>Nom</p></td>
          <td><input placeholder="Nom..." type="text" name="nom"></td>
        </tr>
        <tr>
          <td><p>Prenom</p></td>
          <td> <input placeholder="Prenom..." type="text" name="prenom"></td>
        </tr>
        <tr>
          <td><p>Mail</p></td>
          <td><input placeholder="Mail..." type="text" name="mail"></td>
        </tr>
        <!--<tr>
          <td><p>Adresse Postale</p></td>
          <td><input placeholder="Adresse Postale..." type="text" name="adresse"></td>
        </tr>-->
        <tr>
          <td><p>Mot de Passe</p></td>
          <td><input placeholder="Choisir password" type="password" name="passw"></td>
        </tr>
        
        <tr>
          <td colspan="2" align="right">
            <input name="BoutonSubmit" type="submit" value="Creer compte">
            <input type="button" value="Retour" onclick="javascript:history.back()"></td>      
        </tr>
      </table>
        
      </form> 

    </div>

  </body>

</html>