<?php
include('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM producto WHERE id='$id'";
$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <form action="update.php" method="post">

            <img src="assets/img/<?php echo $row['imagen']; ?>" alt="" width="100"><br><br>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <input type="text" class="form-control mb-3" name="nombre" value="<?php echo $row['nombre']; ?>">
            <input type="text" class="form-control mb-3" name="precio" value="<?php echo $row['precio']; ?>">
            <input required type="file" class="form-control mb-3" name="imagen" value="<?php echo $row['imagen']; ?>">

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            <a href="index.php" class="btn btn-danger btn-block">Cancelar</a>
        </form>
    </div>
    
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>