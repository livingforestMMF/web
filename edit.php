<?php
include "db_conn.php";
$id =$_GET['id'];


if (isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipo_arbol = $_POST['tipo_arbol'];
    $direccion = $_POST['direccion'];
    $frase = $_POST['frase'];
    $precio = $_POST['precio'];


    $sql= "UPDATE `datos` SET `nombre`='$nombre',
    `telefono`='$telefono',`correo`='$correo',`tipo_arbol`='$tipo_arbol',
    `direccion`='$direccion',`frase`='$frase',`precio`='$precio' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: adopta.php?msg=New record created successfully");
    }
    else{
        echo "failed: " .mysqli_error($conn);
    }
}

?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   
    <title>Adopta</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #6d9960;">
          Adopta un árbol
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Editar informacion</h3>
        <p class="text-muted"> </p>
</div>

<?php

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Asegúrate de sanitizar la entrada

$sql = "SELECT * FROM `datos` WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // Asume que id es un número entero
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();


?>



<div class="container d-flex justify-content-center">
    <form action="" method="post" style="width: 50vw; min-width: 300px;">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row ['nombre'] ?>">
            </div>

            <div class="col">
                <label class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $row ['telefono'] ?>">
            </div>

        </div>

        <div class="mb-3">
    <div class="col">
        <label class="form-label">Correo:</label>
        <input type="email" class="form-control" name="correo" value="<?php echo $row ['correo'] ?>">
    </div>
   
    
    
    <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tipo de árbol</label>
                <input type="text" class="form-control" name="tipo_arbol" value="<?php echo $row ['tipo_arbol'] ?>">
            </div>

            <div class="col">
                <label class="form-label">direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $row ['direccion'] ?>">
            </div>

        

        </div>

<div>
        <div class="col">
                <label class="form-label">frase</label>
                <input type="text" class="form-control" name="frase" value="<?php echo $row ['frase'] ?>">
            </div>


            <div class="col">
                <label class="form-label">precio</label>
                <input type="text" class="form-control" name="precio" value="<?php echo $row ['precio'] ?>">
            </div>
            </div>



        <div>
            <button type="submit" class ="btn btn-success" name="submit">guardar</button>
            <a href="adopta.php" class="btn btn-danger">cancelar</a>


</form>
    </div>
</div>



<!--codigo ese de botstrad-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>