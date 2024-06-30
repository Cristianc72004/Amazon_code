<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario

$nombre = $_POST['Nombre_laboratorio'];
$horario = $_POST['horario'];
$capacidad = $_POST['Capacidad'];
$n_equipos = $_POST['N_Equipos'];

// Consulta SQL para actualizar el laboratorio
$sql = "INSERT laboratorio SET 
  Nombre_laboratorio = '$nombre',
  horario = '$horario',
  Capacidad = '$capacidad',
  N_Equipos = '$n_equipos'"
  ;

if ($conn->query($sql) === TRUE) {
    header('Location: ../laboratorio.html');
} else {
  echo "Error al actualizar el laboratorio: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>