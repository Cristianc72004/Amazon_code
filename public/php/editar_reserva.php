<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Obtener datos de la reserva a editar
$id_reserva = $_POST['ID_reserva'];
$descripcion = $_POST['Descripcion'];
$id_usuario = $_POST['ID_usuario'];
$id_laboratorio = $_POST['ID_laboratorio'];

// Consulta SQL para actualizar la reserva
$sql = "UPDATE reserva SET Descripcion = ?, ID_usuario = ?, ID_laboratorio = ? WHERE ID_reserva = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siii", $descripcion, $id_usuario, $id_laboratorio, $id_reserva);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
