<?php

function getProducts($bdd)
{
  $query = $bdd->query("SELECT * FROM product");
  $result = $query->fetchall(PDO::FETCH_ASSOC);
  return $result;
}

//Fonction qui sur la base d'un id et de la fonction getProducts renvoie un seul produit
function getProduct($bdd, $id)
{
  $request = $bdd->prepare("SELECT * FROM product WHERE id= ? ");
  $request->execute([$id]);
  $product = $request->fetch(PDO::FETCH_ASSOC);
  return $product;
}
