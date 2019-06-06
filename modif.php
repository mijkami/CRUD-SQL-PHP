<?php
//recuperation des données de l'url
require('./login.php');
$id=$_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=Sorty', $user, $pass);

echo '  // id = '.$id;
//formulaire correspondant à id

$enregistrement = $bdd->query('SELECT * FROM Users where  id ='.$id.';');
$donnees = $enregistrement->fetch();
echo '<form   action="updateform.php"  method="POST">';
echo '<INPUT NAME="name" value="' . $donnees['name'] . '" >name<br>';
echo '<INPUT NAME="firstname" value="'.$donnees['firstname'].'" >firstname<br>';
echo '<INPUT NAME="phone" value="'.$donnees['phone'].'" >phone<br>';
echo '<INPUT NAME="email" value="' . $donnees['email'] . '" >email<br>';
echo '<INPUT  type=hidden NAME="id" value='.$donnees['id'].'>';
echo '<INPUT type=submit value=Valider><br>';
echo '<INPUT type=reset value=Annuler>
      </form>';

// envoi vers update2.php pour update
