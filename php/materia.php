<?php
require("conexion.php");
class Materia extends DBA
{
	public function alta($id_materia, $sid_grupo, $nombre, $sid_instituto)
	{
		$this->sentencia = "INSERT INTO materia VALUES ('$id_materia','$sid_grupo','$nombre','$sid_instituto');";
		$this->ejecutar_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM materia;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM materia WHERE id_materia = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_grupo, $nombre, $id_materia)
	{
		$this->sentencia = "UPDATE materia SET sid_grupo='$sid_grupo',nombre='$nombre' WHERE id_materia = '$id_materia'";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM materia WHERE id_materia = '$id';";
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

	$obj = new Materia();

	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$nombre = $datos_tabla['nombre'];
		$grupo = $datos_tabla['grupo'];
		$sid_institucion = 1;

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id, $grupo, $nombre, $sid_institucion);

			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'materia',
			);
		} else {

			$resultado = $obj->modificar($grupo, $nombre, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'materia',
			);
		}
	}
	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$respuesta = consultarFilas($id, $obj, 'id_materia', 'materia', '');
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