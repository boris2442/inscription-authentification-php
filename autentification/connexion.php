<?php

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