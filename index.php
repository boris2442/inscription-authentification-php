<?php
//connexion a la base de donnee
//supposons ici que le nom de la base de donnees est etablisement et que la table est users


//1 declaration de la variable d'environnement

define('DBHOST', 'localhost');
define('DBNAME', 'etablissement');
define('DBPASS', '');
define('DBUSER', 'username');


$dsn = "mysql:host='.DBHOST.'; dbname=.DBNAME";

try {

    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
//DEFINIR LE MODE DE FETCH
    $db->setAttribute
    (
        PD0::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("erreur:" . $e->getMessage());
}


//ici, on est connecter a la base

$sql = "SELECT * FROM `users`";

$requete = $db->query($sql);


//recuperer les donnees a l'aide de fetch ou de fetchAll
$user = $requete->fetchAll();


//AJOUT D'UN utilisateur

$sql = "INSERT INTO `users` (`nom`, `pass`, `roles`) VALUES('Simo', '02003#@', '[\"ROLE_USER\"]')";

$requete=$db->query($sql);


//savoir combien de ligne ont été  supprimer

