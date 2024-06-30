<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Consulta SQL para obtener las reservas con datos del usuario y laboratorio
$sql = "SELECT r.ID_reserva, r.Descripcion, u.Nombre AS NombreUsuario, l.Nombre_laboratorio, l.horario
        FROM reserva r
        INNER JOIN Usuario u ON r.ID_usuario = u.ID_usuario
        INNER JOIN laboratorio l ON r.ID_laboratorio = l.ID_laboratorio";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $reservas = array();

    while ($fila = $resultado->fetch_assoc()) {
        $reservas[] = $fila;
    }

    echo json_encode($reservas);
} else {
    echo json_encode([]);
}

// Cerrar conexión
$conn->close();
?>
