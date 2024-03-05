<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar libro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Subir libro</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>