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
    <?php
    if(isset($_GET['msg'])){
        $msg =$_GET['msg'];
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <a href="add_new.php"  class="btn btn-dark mb-3"> añadir </a>

    <table class="table">
  <thead  class="table table-bordered border-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo arbol</th>
      <th scope="col">Frase</th>
      <th scope="col">precio</th>
      <th scope="col">accion</th>
    </tr>
  </thead>
  <tbody>

  <?php
  include "db_conn.php";
  $sql = "SELECT * FROM `datos`";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)){
    ?>
<tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['nombre'] ?></td>
      <td><?php echo $row['telefono'] ?></td>
      <td><?php echo $row['correo'] ?></td>
      <td><?php echo $row['tipo_arbol'] ?></td>
     <td><?php echo $row['frase'] ?></t>
      <td><?php echo $row['precio'] ?></td>
      
      <td>
        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
      </td>
    </tr>
    <?php
  }



  ?>






    
  
     
  </tbody>
</table>
</div>



<!--codigo ese de botstrad-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>