<!DOCTYPE html>
<html>

<head>
    <title>Biblioteca Virtual</title>
    <!-- Agregar enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        

        <!-- Lista de libros -->
        <h2 class="mt-4">Libros Subidos</h2>
        <table class="table table-bordered">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Año de Publicación</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php
        // Conexión a la base de datos (reemplaza con tus propios datos)
        include 'controlador/conexion.php';

        // Consulta de libros
        $sql = "SELECT Libros.*, Autores.nombre AS autor_nombre, Categorias.nombre AS categoria_nombre FROM Libros
                INNER JOIN Autores ON Libros.autor_id = Autores.autor_id
                INNER JOIN Categorias ON Libros.categoria_id = Categorias.categoria_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['titulo'] . '</td>';
                echo '<td>' . $row['autor_nombre'] . '</td>';
                echo '<td>' . $row['categoria_nombre'] . '</td>';
                echo '<td>' . $row['anio_publicacion'] . '</td>';
                echo '<td>' . $row['descripcion'] . '</td>';
                echo '<td>';
                echo '<a href="' . $row['pdf_url'] . '" target="_blank">Ver PDF</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6">No hay libros en la biblioteca.</td></tr>';
        }

        $conn->close();
        ?>
        </table>

        
    </div>

    <!-- Agregar scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>