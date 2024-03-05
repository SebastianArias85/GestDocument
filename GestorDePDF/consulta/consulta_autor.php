<?php
// Consulta de autores
$sql_autores = "SELECT * FROM Autores";
$result_autores = $conn->query($sql_autores);

while ($row = $result_autores->fetch_assoc()) {
    echo '<option value="' . $row['autor_id'] . '">' . $row['nombre'] . '</option>';
}

$conn->close();
?>