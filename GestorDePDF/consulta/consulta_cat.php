<?php
// Consulta de categorías
$sql_categorias = "SELECT * FROM Categorias";
$result_categorias = $conn->query($sql_categorias);

while ($row = $result_categorias->fetch_assoc()) {
    echo '<option value="' . $row['categoria_id'] . '">' . $row['nombre'] . '</option>';
}

$conn->close();
?>