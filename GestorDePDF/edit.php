
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos (reemplaza con tus propios datos)
    $conn = new mysqli("localhost", "root", "", "biblioteca");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del libro para la edición
    $sql = "SELECT * FROM Libros WHERE libro_id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Libro</title>
    <!-- Agregar enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <h1>Editar Libro</h1>

        <!-- Formulario para editar el libro -->
        <form action="update.php" method="post" enctype="multipart/form-data" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $row['libro_id']; ?>">

            <div class="form-group">
                <label for="titulo">Título del libro:</label>
                <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="autor">Autor:</label>
                <select name="autor" class="form-control" required>
                    <?php
                    // Obtener lista de autores
                    include 'controlador/conexion.php';

                    $sql_autores = "SELECT * FROM Autores";
                    $result_autores = $conn->query($sql_autores);

                    while ($autor = $result_autores->fetch_assoc()) {
                        $selected = ($row['autor_id'] == $autor['autor_id']) ? 'selected' : '';
                        echo '<option value="' . $autor['autor_id'] . '" ' . $selected . '>' . $autor['nombre'] . '</option>';
                    }

                    $conn->close();
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" class="form-control" required>
                    <?php
                    // Obtener lista de categorías
                    include 'controlador/conexion.php';

                    $sql_categorias = "SELECT * FROM Categorias";
                    $result_categorias = $conn->query($sql_categorias);

                    while ($categoria = $result_categorias->fetch_assoc()) {
                        $selected = ($row['categoria_id'] == $categoria['categoria_id']) ? 'selected' : '';
                        echo '<option value="' . $categoria['categoria_id'] . '" ' . $selected . '>' . $categoria['nombre'] . '</option>';
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="anio_publicacion">Año de publicación:</label>
                <input type="number" name="anio_publicacion" value="<?php echo $row['anio_publicacion']; ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control"><?php echo $row['descripcion']; ?></textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Actualizar libro</button>
            <a href="index.php" class="btn btn-secondary">Volver a la lista de libros</a>

        </form>
    </div>

    <!-- Agregar scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>