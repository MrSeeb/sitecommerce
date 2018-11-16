<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'phpmyadmin', 'MSNmessenger00');

}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}


function adminAccess()
{
    if($_SESSION["user"]["status"] === "admin")
    {}
    else
    {
        header("Location: ../index.php?message=Vous n'avez pas accès à cette partie du site");
        exit;
    }
}
?>