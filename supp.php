<?php
//recuperation des données de l'url
require('./login.php');
$id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=Sorty', $user, $pass);

echo '  // id = ' . $id;
//formulaire correspondant à id

$bdd->exec('DELETE FROM Users where  id =' . $id . ';');

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
redirect('./');
?>