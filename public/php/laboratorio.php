<?php
include 'conexion.php';

// Consultar laboratorios registrados
$sql = "SELECT id, nombre_laboratorio, ubicacion, capacidad FROM laboratorio";
$result = $conn->query($sql);

$laboratorios = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $laboratorios[] = $row;
    }
}

// Convertir a JSON para ser utilizado por JavaScript
echo json_encode($laboratorios);

$conn->close();
?>
