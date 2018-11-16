<?php
//On redémarre immédiatement la section pour avoir accès aux informations
session_start();
//On charge les fonctions pour accéder aux données
require "../Model/db.php";
require "../Model/functionUsers.php";
require "../Model/functionProduct.php";
include "../Template/header.php";
//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
adminAccess();
?>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Prix</label>
            <input type="text" class="form-control" id="price" placeholder="Price">
        </div>
        <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <select id="stock" class="form-control">
                <option selected>Choisir</option>
                <option>...</option>
                </select>
                </div>
    <div class="form-group col-md-6">
      <label for="category">Catégorie</label>
      <select id="category" class="form-control">
        <option selected>Choisir</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="country">Pays</label>
      <select id="country" class="form-control">
        <option selected>Choisir</option>
        <option>...</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<?php include "../Template/footer.php"; ?>