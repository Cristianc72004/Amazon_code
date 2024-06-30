<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener el ID del laboratorio a eliminar
$id = $_GET['id'];

// Consulta SQL para eliminar el laboratorio
$sql = "DELETE FROM laboratorio WHERE ID_laboratorio = $id";

if ($conn->query($sql) === TRUE) {
  echo "Laboratorio eliminado correctamente";
} else {
  echo "Error al eliminar el laboratorio: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
