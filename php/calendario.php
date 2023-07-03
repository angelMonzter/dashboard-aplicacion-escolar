<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_dashboard_escolar";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los eventos de la tabla "eventos"
$sql = "SELECT * FROM evento";
$result = $conn->query($sql);

// Crear un arreglo de eventos en formato JSON
$eventos = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $evento = array(
      'title' => $row['nombre'],
      'start' => $row['fecha'],
      //'end' => $row['fecha_fin']
    );
    array_push($eventos, $evento);
  }
}

// Convertir el arreglo de eventos a formato JSON y enviarlo al cliente
echo json_encode($eventos);

// Cerrar la conexión a la base de datos
$conn->close();
?>
