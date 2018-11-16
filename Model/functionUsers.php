<?php
function getUser($bdd, $username)
{
  $query = $bdd->prepare("SELECT * FROM user WHERE name = ?");
  $query->execute(array($username));
  $user = $query->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function addUser($bdd, $name, $password, $status, $sexe)
{
   $req = $bdd->prepare('INSERT INTO user(name, password, status, sexe) VALUES(:name, :password,:status, :sexe)');

   $req->execute(array(
   'name'=>$name,
   'password'=>$password,
   'status'=>$status,
   'sexe'=>$sexe
    ));
}

?>