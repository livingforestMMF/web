<?php
include 'conexion_be.php';

// Sanitización de entradas
$nombre_completo = htmlspecialchars($_POST['nombre_completo']);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$usuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);

// Consulta preparada para insertar datos
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($query);
$stmt->bind_param("ssss", $nombre_completo, $correo, $usuario, $contrasena);


if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}
    
?>