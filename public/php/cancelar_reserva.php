<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Obtener el ID de la reserva a cancelar
$id_reserva = $_POST['ID_reserva'];

// Consulta SQL para eliminar la reserva
$sql = "DELETE FROM reserva WHERE ID_reserva = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_reserva);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
