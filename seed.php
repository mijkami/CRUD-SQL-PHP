<?php
// localise l'installation composer
require('./vendor/autoload.php');
require('./login.php');
$faker = Faker\Factory::create('fr_FR');

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
    echo '<br>' . $name;
    echo '<br>' . $firstname;
    echo '<br>' . $email;
    echo '<br>' . $phone. '<br>';
}

echo '<br><br>Seed terminé';

// regarder la doc pour la gestion des erreurs  try ... catch

?>