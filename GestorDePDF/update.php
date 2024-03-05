<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $categoria = $_POST['categoria'];
        $anio_publicacion = $_POST['anio_publicacion'];
        $descripcion = $_POST['descripcion'];

        // Conexión a la base de datos (reemplaza con tus propios datos)
        $conn = new mysqli("localhost", "root", "", "biblioteca");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Actualizar el registro en la base de datos
        $sql = "UPDATE Libros SET titulo = '$titulo', autor_id = '$autor', categoria_id = '$categoria', anio_publicacion = '$anio_publicacion', descripcion = '$descripcion' WHERE libro_id = $id";
        if ($conn->query($sql) === TRUE) {
            header("Location:index.php");
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }

        $conn->close();
    }
}
?>
