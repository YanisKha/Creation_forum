<?php
session_start();
include "db_conn.php";

//if (isset($_SESSION['user_name'])) {
// header("Location: home.php");
//exit();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

print '<pre>';
echo "reponse api";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$date_ins = date('d-m-y h:i:s');
print_r($_POST);




$sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `mdp`, `date_ins`) VALUES ('[$nom]','[$prenom]','[$mail]','[$mdp]','[$date_ins]')";


if ($conn->query($sql) === TRUE) {
    echo "<span style='color: green;'>Nouvel Enregistrement effectué</span>";
} else {
    echo "<span style='color: red;'>Erreur: " . $sql . "</span><br>" . $conn->connect_error;
}


?>