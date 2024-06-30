<?php
// Conexión a la base de datos

// Crear conexión
include 'conexion.php';

// Consulta SQL para obtener todos los laboratorios
$sql = "SELECT * FROM laboratorio";
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result->num_rows > 0) {
  // Mostrar los datos en formato JSON para ser utilizados por JavaScript
  $laboratorios = [];
  while ($row = $result->fetch_assoc()) {
    $laboratorios[] = $row;
  }
  echo json_encode($laboratorios);
} else {
  echo json_encode([]);
}

// Cerrar conexión
$conn->close();
?>
