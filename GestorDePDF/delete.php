<?php
if (isset($_GET['id'])) {
    // Conexión a la base de datos (reemplaza con tus propios datos)
    $conn = new mysqli("localhost", "root", "", "biblioteca");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id = $_GET['id'];

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM Libros WHERE libro_id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location:index.php");
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
