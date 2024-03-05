<?php

include("config.php");

$cod_prod = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$img = $_POST['imagen'];


$sql = "UPDATE producto SET nombre='$nombre', precio='$precio', imagen='$img' WHERE id='$cod_prod'";
$query = mysqli_query($conexion,$sql);

if($query){
    Header("Location: index.php");
}

        
?>


