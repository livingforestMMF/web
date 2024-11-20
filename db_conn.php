<?php
$servername = "localhost";
$username = "root"; // Se corrige el nombre de la variable
$password = "";
$dbname = "arboles";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>
