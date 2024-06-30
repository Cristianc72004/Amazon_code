<?php
// Conexión a la base de datos
include 'conexion.php'; 

// Obtener datos del formulario
$id_laboratorio = $_POST['id'];
$correo_electronico = $_POST['Correo_electronico']; // Obtener el correo electrónico del formulario
$descripcion = $_POST['Descripcion'];

// Consulta SQL para obtener el ID del usuario a partir del correo electrónico
$sql_usuario = "SELECT ID_usuario FROM Usuario WHERE Correo_electronico = '$correo_electronico'";
$result_usuario = $conn->query($sql_usuario);

if ($result_usuario->num_rows > 0) {
  $row_usuario = $result_usuario->fetch_assoc();
  $id_usuario = $row_usuario['ID_usuario'];

  // Consulta SQL para crear la reserva
  $sql_reserva = "INSERT INTO reserva (Descripcion, ID_usuario, ID_laboratorio) VALUES ('$descripcion', $id_usuario, $id_laboratorio)";

  if ($conn->query($sql_reserva) === TRUE) {
    header('Location: ../mostrar_reservas.html');
  } else {
    echo "Error al realizar la reserva: " . $conn->error;
  }
} else {
  echo "No se encontró un usuario con ese correo electrónico.";
}

// Cerrar conexión
$conn->close();
?>
