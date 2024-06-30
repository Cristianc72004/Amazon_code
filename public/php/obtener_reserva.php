<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Obtener el ID de la reserva
$id_reserva = $_GET['id'];

// Consulta SQL para obtener la reserva
$sql = "SELECT ID_reserva, Descripcion, ID_usuario, ID_laboratorio FROM reserva WHERE ID_reserva = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_reserva);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
