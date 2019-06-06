<?php
// localise l'installation composer
require('./vendor/autoload.php');
require('./login.php');
$faker = Faker\Factory::create('fr_FR');
echo ' <a href="./"><button>Retour index</button></a><br>';
//CONNEXION à la base de données : https://www.php.net/manual/fr/pdo.connections.php
$bdd = new PDO( 'mysql:host=localhost;dbname=Sorty;charset=UTF8', $user, $pass);
// $bdd->exec('DELETE FROM `Users`');
//insert en mode PDO : https://php.net/manual/fr/pdo.prepared-statements.php

$stmt = $bdd->prepare("INSERT INTO Users (phone, name, firstname, email) VALUES (:phone, :name, :firstname, :email)");
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':email', $email);

for ($i = 0; $i < 5; $i++){
    $phone = $faker->phoneNumber;
    $name = $faker->name;
    $firstname = $faker->firstName;
    $email = $faker->unique()->email;
    $stmt->execute();
    echo '<br>';
    echo 'Utilisateur '. $i . ' créé :';
    echo '<br>&nbsp;&nbsp;' . $name;
    echo '<br>&nbsp;&nbsp;' . $firstname;
    echo '<br>&nbsp;&nbsp;' . $email;
    echo '<br>&nbsp;&nbsp;' . $phone. '<br>';
}

echo '<br>SEED TERMINÉ !';
// regarder la doc pour la gestion des erreurs  try ... catch

?>