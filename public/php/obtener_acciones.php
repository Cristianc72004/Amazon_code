<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Consulta SQL para obtener los datos de la tabla acciones
$sql = "SELECT ID_accion, Tipo_accion, ID_reserva, Fecha FROM acciones ORDER BY Fecha DESC";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $acciones = array();

    while ($fila = $resultado->fetch_assoc()) {
        $acciones[] = $fila;
    }

    echo json_encode($acciones);
} else {
    echo json_encode([]);
}

// Cerrar conexión
$conn->close();
?>
