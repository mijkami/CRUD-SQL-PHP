<?php
// localise l'installation composer
require('./vendor/autoload.php');
require('./login.php');
$faker = Faker\Factory::create('fr_FR');
echo ' <a href="./"><button>Retour index</button></a><br>';
//CONNEXION à la base de données : https://www.php.net/manual/fr/pdo.connections.php
$dbh = new PDO('mysql:host=localhost;dbname=Sorty', $user, $pass);
$query = file_get_contents( "./BDD/SortyUsersExport.sql");
$dbh->exec($query);
$dbh->exec('DELETE FROM `Users`');
//insert en mode PDO : https://php.net/manual/fr/pdo.prepared-statements.php

$stmt = $dbh->prepare("INSERT INTO Users (id, email, name, firstname, phone) VALUES (:id, :email, :name, :firstname, :phone)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':phone', $phone);


for ($i = 0; $i < 5; $i++){
    $id = $faker->unique()->randomDigit;
    $email = $faker->unique()->email;
    $name = $faker->lastName;
    $firstname = $faker->firstName;
    $phone = $faker->phoneNumber;
    $stmt->execute();
    echo '<br>';
    echo 'Utilisateur '. $id . ' créé :';
    echo '<br>&nbsp;&nbsp;' . $email;
    echo '<br>&nbsp;&nbsp;' . $name;
    echo '<br>&nbsp;&nbsp;' . $firstname;
    echo '<br>&nbsp;&nbsp;' . $phone. '<br>';
}

echo '<br>SEED TERMINÉ !';
// regarder la doc pour la gestion des erreurs  try ... catch

?>