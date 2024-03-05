<!DOCTYPE html>
<html>

<head>
    <title>Biblioteca Virtual</title>
    <!-- Agregar enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Biblioteca Virtual</h1>

        <!-- Formulario para subir libros -->
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="titulo">Título del libro:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <select name="autor" class="form-control" required>
                    <?php
                    include 'controlador/conexion.php';
                    include 'consulta/consulta_autor.php';
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" class="form-control" required>
                    <?php
                    include 'controlador/conexion.php';
                    include 'consulta/consulta_cat.php';
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="anio_publicacion">Año de publicación:</label>
                <input type="number" name="anio_publicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="pdf">Archivo PDF:</label>
                <input type="file" name="pdf" accept=".pdf" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir libro</button>
        </form>

        <hr>

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
                echo ' | ';
                echo '<a href="edit.php?id=' . $row['libro_id'] . '">Editar</a>';
                echo ' | ';
                echo '<a href="delete.php?id=' . $row['libro_id'] . '">Eliminar</a>';
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