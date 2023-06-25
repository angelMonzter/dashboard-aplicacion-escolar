<?php
require("conexion.php");
class Scanner extends DBA
{
	public function alta($id_scanner, $nombre, $apellido, $correo, $usuario, $contrasena, $sid_instituto)
	{
		$this->sentencia = "INSERT INTO scanner VALUES ('$id_scanner','$nombre','$apellido','$correo','$usuario','$contrasena','$sid_instituto');";
		$this->ejecutar_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM scanner;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM scanner WHERE id_scanner = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($nombre, $apellido, $correo, $usuario, $contrasena, $sid_instituto, $id_scanner)
	{
		$this->sentencia = "UPDATE scanner SET nombre='$nombre' ,apellido='$apellido',correo='$correo',usuario='$usuario',contrasena='$contrasena',sid_instituto='$sid_instituto' WHERE id_scanner = '$id_scanner'";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM scanner WHERE id_scanner = '$id';";
		$this->ejecutar_sentencia();
	}
	public function id($value)
	{
		return $this->generator($value);
	}
}

// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Recuperar los datos enviados en la solicitud
	$data = json_decode(file_get_contents("php://input"), true);

	// Validar los datos recibidos
	if (!isset($data['accion']) || !isset($data['data'])) {
		header('HTTP/1.1 400 Bad Request');
		echo 'Error: Campos obligatorios';
		exit;
	}

	$datos_tabla = $data['data'];

	$obj = new Scanner();

	if ($data['accion'] === 'insertar') {
		$id = $datos_tabla['id'];

		$nombre_scanner = $datos_tabla['nombre_scanner'];
		$app_scanner = $datos_tabla['app_scanner'];
		$correo_scanner = $datos_tabla['correo_scanner'];
		$user_scanner = $datos_tabla['user_scanner'];
		$ctr_scanner = $datos_tabla['ctr_scanner'];
		$sid_instituto='2';
		$fecha = date("Y-m-d H:i:s");

		if (empty($id)) {
			$id = $obj->id(5);

			$resultado = $obj->alta($id,$nombre_scanner,$app_scanner,$correo_scanner,$user_scanner,$ctr_scanner,$sid_instituto);
			
                $respuesta = array(
                    'respuesta' => 'alta',
                    'resultado' => $resultado,
                    'modulo' => 'scanner',
                );
		} else {
			$resultado =$obj->modificar($nombre_scanner, $app_scanner, $correo_scanner, $user_scanner, $ctr_scanner, $sid_instituto, $id);
							
			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'scanner',
			);
		}
	}
	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$respuesta = consultarFilas($id, $obj, 'id_scanner', 'scanner', '');
	}
	// Devolver el libro recién creado como objeto JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
	exit;
}

// Si se realiza una solicitud con un método diferente a POST, devolver un error
header('HTTP/1.1 405 Method Not Allowed');
exit;
?>