<?php

include('config.php');


if(isset($_POST['nombre']) && isset($_POST['precio']) 
    && !empty($_POST['nombre']) && !empty($_POST['precio'])){

        $name = $_POST['nombre'];
        $precio = $_POST['precio'];
        $img = '';

        if(isset($_POST['selImagen']) && isset($_POST['selImagen'])){
            $img = $_POST['selImagen'];
        }

        $sql = 'INSERT INTO producto (nombre, precio, imagen) value (?,?,?)';

        if($statement = mysqli_prepare($conexion, $sql)){
            mysqli_stmt_bind_param($statement, "sds", $name, $precio, $img);
            if(mysqli_stmt_execute($statement)){
                header("location: index.php");
                exit();
            }else{
                echo "Error al agregar producto";
            }

            mysqli_close($statement);
        }

        mysqli_close($conexion);

}else {
?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo producto</h1>
      </div>
      <div class="modal-body">

        <form action="create.php" method="post">

          <div class="form group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>

          <div class="form group">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
          </div>

          <div class="form group">
            <label for="recipient-name" class="col-form-label">imagen:</label>
            <br>
            <img id="preview" width="auto" height="50" alt="No Imagen">
            <br>
            <input type="file" class="form-control" id="selImagen" name="selImagen" onclick="actualizaImage()" required>

            <script src="assets/js/acciones.js"></script>

          </div>
          <br>

          <input type="submit" class="btn btn-primary" value="Agregar">
          <a href="index.php" class="btn btn-danger">Cancelar</a>
          
        </form>

      </div>     
    </div>
  </div>
</div>

<?php
}
?>