<?php
session_start();
include_once "/index.php";

$username="SIMO'; --";//ne considere pas ce qui est apres ce code. Il s'agit d'une injection sql
// $password='@#$simo*';
// $password="@#$simo* OR 1=1 --";


$username="simo";
$password="@#$simo*";


// $sql="SELECT * FROM `users` where `username`='simo' and `password`='@#$simo*)'";

$sql="SELECT * FROM `users` where `username`='?' and `password`='?*)'";

// $requete=$db->$query($sql);
// $user=$requete->fetchAll();

$requete=$db->prepare($sql);


//injecter les valeus a l'aide de bindValue

$requete->bindValue(1, $username, PDO::PARAM_STR_CHAR);
$requete->bindValue(2, $password, PDO::PARAM_STR_CHAR);





$requete->execute();

$sql=$requete->fetchAll();









?>