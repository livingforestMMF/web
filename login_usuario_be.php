<?php
include 'conexion_be.php';

$correo = trim(filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL));
$contrasena = trim($_POST['contrasena']);

mysqli_set_charset($conexion, "utf8");

$stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Debug: Ver contraseñas ingresadas y almacenadas
   
    
    if ($contrasena === $row['contrasena']) {
        header("Location: adopta.php");
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}
?>



