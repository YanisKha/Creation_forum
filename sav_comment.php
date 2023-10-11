<?php
require_once('../include.php');


$id_blog = $_POST['id_blog'];

$pseudo = $_POST['pseudo'];
//print '<pre>';
//echo "reponse api";

$comment = $_POST['comment'];
$id_user = $_SESSION['id'];
$date_creation = date('Y-m-d H:i:s');
//print_r($_POST);

echo '<div style="background: #ddd; margin-top: 20px; padding: 5px 10px; border-radius: 10px"> <div style="font-weight: bold">De ' . $pseudo . '</div>' . $comment . '<div style="text-align: right; font-size: 12px; color: #888">Le ' . $date_creation . '</div> </div>';

$req = $DB->prepare("INSERT INTO `commentaire`( `id_blog`, `id_u`, `comment`, `date_crea`, `date_modif`) VALUES (?,?,?,?,?)");


$req->execute([$id_blog, $id_user, $comment, $date_creation, $date_creation]);


//else {

//  echo "<span style='color: red;'>Erreur: " . $sql . "</span><br>" . $conn->connect_error;
//}
//print "ok";






?>