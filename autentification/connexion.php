<?php
session_start();
if(!empty($_POST)){
    if(
        isset($_POST['email'], $_POST['password']) &&
        !empty($_POST['email']) &&!empty($_POST['password'])
        ){
            //verifie que c'est un bon email
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
           die("ce n'est pas un email");
            }
            //verifier sil existe dans la base de donnee. pour cela, il faut se connecter
            require_once "/index   .php";

            $sql="SELECT *  FROM `users` WHERE `email`=':email' ";

            $requete=$db->prepare($sql);

            $requete->bindParam(':email', $_POST['email'], PDO::PARAM_STR_CHAR);
            $requete->execute();

            $user=$query->fetch();
          

            if(!$user){
                //l'utilisateur n'existe pas
                die("User not found");
                header("Location: /inscription.php");
            }

            //ici, notre utilisateur existe on peut maintenant verify le mot de passe
             if(!password_verify($_POST['pass'], $user['password'])){
              die("Mot de passe incorrect");
              header("Location: /inscription.php");
             }


             //ici, l'utilisateur et le mot de passe existe
               

             //on de vra maintenant ouvrir la session 

             session_start();
             //on stocke dans $session  les infots de l'utilisateurs 

             $_SESSION['user']=
             [
                'id'=>$user['id'],       //tout a noter que ce user est le nom de la table  et [...] sont les attributs de la table users
                'pseudo'=>$user['pseudo'],  //tout a noter que ce user est le nom de la table  et [...] sont les attributs de la table users
                'email'=>$user['email'],  //tout a noter que ce user est le nom de la table  et [...] sont les attributs de la table users
                'roles'=>$user['roles']  //tout a noter que ce user est le nom de la table  et [...] sont les attributs de la table users



             ];

             //on peut rediriger vers la page de prfil

             header("location:profil.php");
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
        <!-- <div class="">
            <label for="pseudo"></label>
            <input type="text" name="pseudo" id="pseudo">
        </div> -->

        <div class="">
            <label for="email"></label>
            <input type="email" name="email" id="email">
        </div>

        <div class="">
            <label for="password"></label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Me connecter</button>

    </form>


</body>

</html>