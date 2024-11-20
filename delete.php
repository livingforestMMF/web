<?php
include "db_conn.php";
$id = $_GET['id'];
$sql ="DELETE FROM `datos` WHERE id=$id ";
$result =mysqli_query($conn, $sql);
if ($result){
    header("Location: adopta.php?msg=New record created successfully");
}

else{
    echo "failed: " .mysqli_error($conn);
}

?>