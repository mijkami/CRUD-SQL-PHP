<?php
// localise l'installation composer
require('./vendor/autoload.php');
require('./login.php');
$faker = Faker\Factory::create('fr_FR');

//CONNEXION à la base de données : https://www.php.net/manual/fr/pdo.connections.php

$bdd = new PDO('mysql:host=localhost;dbname=Sorty', $user, $pass);
$dbh->exec('DELETE FROM `Users`');
//insert en mode PDO : https://php.net/manual/fr/pdo.prepared-statements.php

$stmt = $dbh->prepare("INSERT INTO Users (phone, firstname, email) VALUES (:phone, :firstname, :email)");
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':email', $email);

for ($i = 0; $i < 5; $i++){
    $phone = $faker->phoneNumber;
    $firstname = $faker->firstName;
    echo $firstname;
    $email = $faker->unique()->email;
    $stmt->execute(); 
}

echo '<br>Seed terminé';

// regarder la doc pour la gestion des erreurs  try ... catch
