<?php
//On redémarre immédiatement la section pour avoir accès aux informations
session_start();
//On charge les fonctions pour accéder aux données
require "../Model/db.php";
require "../Model/functionUsers.php";
require "../Model/functionProduct.php";
include "../Template/header.php";

if(isset($_GET["message"]))
{
    $message = htmlspecialchars($_GET["message"]);
    echo "<div class='alert alert-danger w-50 mx-auto'>" . $message . "</div>";
}

//Si une confirmation de succès
if(isset($_GET["success"]))
{
    $message = htmlspecialchars($_GET["success"]);
    echo "<div class='alert alert-success w-50 mx-auto'>" . $message . "</div>";
}

//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
adminAccess();
//On récupère nos produits via la fonction, plus tard celle-ci effectuera une requête en base de données
$products = getProducts($bdd);
?>

<div class="row mt-5">
    <section class="col-12">
        <h2>Liste des produits</h2>
        <div class="container-fluide">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Lieu de production</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                //On boucle pour afficher tous les produits contenus dans la variable products
                foreach ($products as $key => $result)
                {
                ?>
                    <tbody>
                        <tr>
                            <th scope="row" class="table-secondary"><?php echo $result["id"]; ?></th>
                            <td class="table-secondary"><?php echo $result["name"]; ?></td>
                            <td class="table-secondary"><?php echo substr($result["description"], 0, 50); ?>...</td>
                            <td class="table-secondary"><?php echo $result["price"]; ?></td>
                            <td class="table-secondary">
                                <?php
                                if($result["stock"])
                                {
                                    echo "DISPONIBLE";
                                }
                                else
                                {
                                    echo "INDISPONIBLE";
                                }
                                ?>
                            </td>
                            <td class="table-secondary"><?php echo strtoupper($result["category"]); ?></td>
                            <td class="table-secondary"><?php echo strtoupper($result["made_in"]); ?></td>
                            <td class="table-secondary">
                                <a href="">
                                    <i class="far fa-edit fa-2x"></i>
                                </a>
                                <hr>
                                <a href="">
                                    <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    //On ferme la boucle
                }
                ?>
            </table>
        </div>
    </section>
</div>
<?php include "../Template/footer.php"; ?>
