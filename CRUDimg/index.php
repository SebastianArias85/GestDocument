<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div style="height: 50px;"></div>
            <div class="well">

                <center>
                    <h2>Productos</h2>
                </center>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create" data-bs-whatever="@getbootstrap">Agregar</button>
                <br><br>

                <table width="100%" class="table table-hover table-striped table-bordered">
                        
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </thead>
                

                    <tbody>

                        <?php
                        include("config.php");
                        
                        $sql = "SELECT * FROM producto";
                        $query = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($query)){ ?>


                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td>$ <?php echo $row['precio']; ?></td>
                            <td><img src="assets/img/<?php echo $row['imagen']; ?>" alt="" width="70"></td>
                            
                            <td>                            
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-success" name="update">Editar</a>                            
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>

                </table>
            </div>
        <div style="height: 10px;"></div>
    </div>

    <?php include("create.php"); ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>