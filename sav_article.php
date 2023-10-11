<?php
require_once('../include.php');





//print '<pre>';
//echo "reponse api";

$titre = $_POST['titre'];
$text = $_POST['text'];
$categorie = $_POST['categorie'];
$contenu = $_POST['contenu'];
$id_user = $_SESSION['id'];
$date_creation = date('Y-m-d H:i:s');
print_r($_POST);


$req = $DB->prepare("INSERT INTO `blog`( `id_user`, `titre`, `text`, `date_creation`, `id_ca`, `contenu`) VALUES (?,?,?,?,?,?)");


$req->execute([$id_user, $titre, $text, $date_creation, $categorie, $contenu]);




//else {

//  echo "<span style='color: red;'>Erreur: " . $sql . "</span><br>" . $conn->connect_error;
//}
//print "ok";






?>