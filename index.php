<?php
require('./login.php');

$bdd = new PDO ('mysql:host=localhost;dbname=Sorty', $user, $pass);
// $ensemble_des_donnees = $bdd->query('SELECT * FROM `Users` ORDER BY id ASC LIMIT 1;');
$ensemble_des_donnees = $bdd->query( 'SELECT * FROM `Users` ORDER BY id;');
foreach($ensemble_des_donnees as $un_enregistrement) {
// while ($un_enregistrement = $ensemble_des_donnees->fetch()){
    echo 'id : '.$un_enregistrement['id'].'<br>';
    echo 'email : '.$un_enregistrement['email'].'<br>';
    echo 'nom: ' . $un_enregistrement['name'] . '<br>';
    echo 'prénom : ' . $un_enregistrement['firstname'].'<br>';
    echo 'téléphone : ' . $un_enregistrement['phone'].'<br><br>
    <a href="modif.php?id=' . $un_enregistrement['id'] . '">modif</a>-/-
    <a href="supp.php?id=' . $un_enregistrement['id'] . '">supp</a><br />';
}


// $enregistrement = $bdd->query('SELECT * FROM Users order by id asc limit 1');
// $donnees = $enregistrement->fetch();
// echo '<form   action="updateform.php"  method="POST">';
// echo '<INPUT NAME="firstname" value="' . $donnees['firstname'] . '" >firstname<br>';
// echo '<INPUT NAME="email" value="' . $donnees['email'] . '" >email<br>';
// echo '<INPUT NAME="phone" value="' . $donnees['phone'] . '" >phone<br>';
// echo '<INPUT type=hidden NAME="id" value=' . $donnees['id'] . '>';
// echo '<INPUT type=submit value=Valider><br>';
// echo '<INPUT type=reset value=Annuler>
//       </form>';

?>
