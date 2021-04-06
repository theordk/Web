<nav class="navbar navbar-expand-lg fixed-top border-bottom border-success"> <!--navbar-light bg-dark border-success-->

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link text-white" href="#">EbayECE<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="vend_ferraille.php">Trésor / Ferraille</a>
          <a class="dropdown-item" href="vend_musee.php">Bon pour le musee</a>
          <a class="dropdown-item" href="vend_vip.php">Accessoires VIP</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vendeur1.php">Acceuil</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compte Vendeur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">

         <?php
         if (isset($_SESSION['mail'])) {
          echo 'Votre mail est : '.$_SESSION['mail'];
          echo '<br />';

        // On affiche un lien pour fermer notre session
          //echo '<a href="./logout.php">Déconnection</a>';
        }
        else {
          echo 'Les variables ne sont pas déclarées.';
        }?>

          </a>
          <a class="dropdown-item" href="./logout.php">Se déconnecter</a>
        </div>
      </li>

    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>
</nav>

<div class="sidenav">
  <ul>
    <li><a href="vend_profil.php">Mon Profil</a></li>

    <ul> 
      <li><a href="vend_vente.php">- Mes items en vente</a></li>
      <li><a href="vend_vendu.php">- Mes items vendus</a></li>
    </ul>

    <li><a href="vend_vendre.php">Vendre un item</a></li>
    <li><a href="vend_gerer_offre.php">Gerer les offres</a></li>
  </ul>

</div>

