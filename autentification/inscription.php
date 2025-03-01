<?php
session_start();
if(!empty($_POST)){
    if(
        isset($_POST["pseudo"], $_POST["email"], $_POST["password"])
        && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"])
        ){
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            // $email = htmlspecialchars($_POST["email"]);
            // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
          //verifier que c'est un email

          if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
           die("l'adresse email est invalide");
          }

           //hacher le mot de passe

           $password=password_hash($post["password"], PASSWORD_ARGON2ID);
          include "./index.php";

          //inserer le nouvel utilisateur dans la base

          require_once "/index";

          $sql= "INSERT INTO `users` (`nom`, `prenom`, `password`) VALUES(:pseudo, :email, '$password')";
            //l'on met les crochets sur le password pour que sa ne considere pas le mot de passe haché!
            //puisque a chaque actualisation, le mot de pass haché s'actualise

          $requete=$db->prepare($sql);

          $requete->bindParam(".pseudo", $pseudo, PDO::PARAM_STR );
          $requete->bindParam(":email", $_POST["email"]);
          $requete->execute();
        //on recupere l'id du nouvel utilisateur
        $id=$db->lastInsertId();
        
       //on connectera l;'utilisateur a la base
         //je prefere que mes utilisateus se connecte a l'aide de l'email

         session_start();
         $_SESSION['user']=
                     [
          'id'=>$id,
           'pseudo'=>$pseudo,
        'email'=>$_POST['email'],
         'roles'=>["ROLE_USER"]
          ];
         header("location:profil.php");



  
        }else{
            die("le formulaire est in incomplet");
        }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="">
            <label for="pseudo"></label>
            <input type="text" name="pseudo" id="pseudo">
        </div>

        <div class="">
            <label for="email"></label>
            <input type="email" name="email" id="email">
        </div>

        <div class="">
            <label for="password"></label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Envoyer</button>

    </form>


</body>

</html>