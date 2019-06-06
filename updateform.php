<?php
require('./login.php');

$name = $_POST['name'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];


$bdd = new PDO('mysql:host=localhost;dbname=Sorty', $user, $pass);
$enregistrement = $bdd->query('SELECT * FROM Users order by id asc limit 1');
$bdd->exec('UPDATE Users SET phone = "'.$phone.'", email ="'.$email. '", name ="' . $name . '", firstname = "'.$firstname.'" where  id ='.$id.';');
// echo ' verification : firstname '.$firstname.' et email : '.$email.' // id = '.$id;

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
redirect('./');
?>