<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$id = $_POST['id'];
$nombre = $_POST['Nombre_laboratorio'];
$horario = $_POST['horario'];
$capacidad = $_POST['Capacidad'];
$n_equipos = $_POST['N_Equipos'];

// Consulta SQL para actualizar el laboratorio
$sql = "UPDATE laboratorio SET 
  Nombre_laboratorio = '$nombre',
  horario = '$horario',
  Capacidad = '$capacidad',
  N_Equipos = '$n_equipos'
  WHERE ID_laboratorio = $id";

if ($conn->query($sql) === TRUE) {
  echo "Laboratorio actualizado correctamente";
} else {
  echo "Error al actualizar el laboratorio: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
