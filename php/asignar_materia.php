<?php
require("conexion.php");
class Asignar_materia extends DBA
{
	public function alta($id_asignar_materia, $sid_profesor, $sid_materia, $sid_grupo, $sid_usuario)
	{
		$this->sentencia = "INSERT INTO asignar_materia VALUES ('$id_asignar_materia', '$sid_profesor', '$sid_materia', '$sid_grupo', '$sid_usuario');";
		$this->ejecutar_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM asignar_materia;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM asignar_materia WHERE id_asignar_materia = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_alumno, $sid_materia, $id_asignar_materia)
	{
		$this->sentencia = "UPDATE asignar_materia SET sid_alumno='$sid_alumno',sid_materia='$sid_materia' WHERE id_asignar_materia = '$id_asignar_materia';";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM asignar_materia WHERE id_asignar_materia = '$id';";
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

	$obj = new Asignar_materia();

	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$sid_alumno = $datos_tabla['profesor'];
		$sid_materia = $datos_tabla['materia'];



		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id, $sid_alumno, $sid_materia);

			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'asignar_materia',
			);
		} else {

			$resultado = $obj->modificar($sid_alumno, $sid_materia, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'asignar_materia',
			);
		}
	}
	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$respuesta = consultarFilas($id, $obj, 'id_asignar_materia', 'asignar_materia', '');
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