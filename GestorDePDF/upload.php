<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$conn = new mysqli("localhost", "root", "", "biblioteca");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario de subida
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$anio_publicacion = $_POST['anio_publicacion'];
$descripcion = $_POST['descripcion'];

// Subir el archivo PDF
$uploadDir = 'pdfs/';
$pdfFileName = basename($_FILES['pdf']['name']);
$pdfFilePath = $uploadDir . $pdfFileName;
move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfFilePath);

// Insertar en la base de datos
$sql = "INSERT INTO Libros (titulo, autor_id, categoria_id, anio_publicacion, descripcion, pdf_url) VALUES ('$titulo', '$autor', '$categoria', '$anio_publicacion', '$descripcion', '$pdfFilePath')";
if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
