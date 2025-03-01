<?php
session_start();
?>
<h1> Profil de <?php $_SESSION['user']['pseudo']?></h1>

<p>pseudo <?php $_SESSION['user']['pseudo']  ?></p>


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