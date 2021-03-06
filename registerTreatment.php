<?php
require "Model/db.php";
require "Model/functionUsers.php";
//Si le formulaire n'est pas vide on le vérifie
if(!empty($_POST))
{
  $errors ="";
  //On sécurise les entrées du formulaire
  foreach ($_POST as $key => $value)
  {
    $_POST[$key] = htmlspecialchars($value);
  }
  
  //On boucle pour vérifier si une valeur est vide
  $isEmpty = false;
  foreach ($_POST as $key => $value)
  {
    if(empty($value))
    {
      $isEmpty = true;
    }
  }
  
  //Si on a trouvé une valeur vide on ajoute un code erreur
  if($isEmpty)
  {
    $errors .= "1";
  }
  
  //Si le nom utilisateur contient moins de 3 lettres
  if(strlen($_POST["user_name"]) < 3)
  {
    $errors .= "2";
  }
  
  //Si la confirmation du mot de passe n'est pas identique
  if($_POST["user_password"] !== $_POST["user_password_confirm"])
  {
    $errors .= "3";
  }
  
  //Si le mot de passe ne respect pas les critères demandés
  if(!preg_match("#(?=.*[A-Z]{1,})(?=.*[0-9]{1,}).{6,}#", $_POST["user_password"]))
  {
    $errors .= "4";
  }
  
  $request = $bdd->query('SELECT name FROM user WHERE name = "' . $_POST['user_name'] . '" ');
  $result = $request->fetch();
  
  if ($_POST['user_name'] == $result['name'])
  {
    $errors .= "5";
  }
  
  //Si on a stocké des codes erreur on renvoi au formulaire
  if(!empty($errors))
  {
    session_start();
    $_SESSION["answers"] = $_POST;
    header("Location: register.php?message=$errors");
    exit;
  }
  
  //On sécurise une dernière fois (on hash le mdp) et on envoie dans la base de donnée ensuite on redirige avec un message de success
  else
  {
    $name = htmlspecialchars($_POST["user_name"]);
    $password = htmlspecialchars($_POST["user_password"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $status = "user";
    $sexe = $_POST["user_sexe"];
    addUser($bdd,$name,$hash,$status,$sexe);
    
    header("Location: index.php?success=Compte créé avec succès, vous pouvez vous connecter");
    exit;
  }
}

//Si le formulaire est vide on renvoi vers la page register
else
{
  header("Location: register.php?message=0");
  exit;
}
?>