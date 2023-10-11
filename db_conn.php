<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$base = 'stage';

//On établit la connexion
$conn = mysqli_connect($servername, $username, $password, $base);

//On vérifie la connexion
if (!$conn) {
    die('Erreur : ' . mysqli_connect_error());
}
echo 'Connexion réussie';



?>