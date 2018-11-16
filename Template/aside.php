<aside class="col-lg-3">
  <i class="fas fa-user-ninja fa-4x mb-3"></i>
  <ul class="list-group">
    <li class='list-group-item'>Prénom: <?php print_r($_SESSION['user']['name']);?></li>
    <li class='list-group-item'>Status: <?php print_r($_SESSION['user']['status']);?></li>
    <li class='list-group-item'>Sexe: <?php print_r($_SESSION['user']['sexe']);?></li>
  </ul>
  
  <hr>

  <ul class="list-group">
    <li class="list-group-item">
      <a href="basket.php" class="my-3">Votre panier</a>
    </li>
    <?php
      //On boucle sur le panier stocké en session pour afficher tous ses produits
      foreach ($_SESSION["basket"] as $key => $product)
      {
        echo "<li class='list-group-item w-100'>". $product['name'] . "</li>";
      }
     ?>
     <li class='list-group-item'>Total : <?php echo $_SESSION["basketAmount"]; ?></li>
  </ul>

<hr>

  <?php if ($_SESSION['user']['status'] === "admin"){ ?>
  <ul class="list-group">
      <li class='list-group-item'>
        <a href="admin/index.php">Administration</a>
      </li>
  </ul>
  <?php }?>

<hr>

  <ul class="list-group">
      <li class='list-group-item'>
        <a href="logout.php">Deconnexion</a>
      </li>
  </ul>
</aside>