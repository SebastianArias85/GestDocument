<?php

include('config.php');

$cod_prod = $_GET['id'];

$sql = "DELETE FROM producto WHERE id = $cod_prod";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: index.php");
    }


?>