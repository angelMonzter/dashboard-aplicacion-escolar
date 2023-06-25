<?php
require("conexion.php");
class Atributo extends DBA
{
	public function alta($id_atributo, $icono, $nombre, $valor, $sid_instituto)
	{
		$this->sentencia = "INSERT INTO atributo VALUES ('$id_atributo','$icono','$nombre','$valor','$sid_instituto');";
		$this->obtener_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM atributo;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM atributo WHERE id_atributo = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($icono, $nombre, $valor, $id_atributo)
	{
		$this->sentencia = "UPDATE atributo SET icono = '$icono' ,nombre='$nombre', valor = $valor WHERE id_atributo = '$id_atributo';";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM atributo WHERE id_atributo = '$id';";
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

	$obj = new Atributo();

	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$icono = $datos_tabla['icono'];
		$nombre = $datos_tabla['nombre_atributo'];
		$valor = $datos_tabla['valor_atributo'];
		$sid_institucion = 1;

		if (empty($id)) {
			$id = $obj->id(5);

			$resultado = $obj->alta($id, $icono, $nombre, $valor, $sid_institucion);

			$respuesta = array(
				'respuesta' => 'alta',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'atributo',
			);
		} else {
			$resultado = $obj->modificar($icono, $nombre, $valor, $id);
			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'atributo',
			);
		}

	}

	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$respuesta = consultarFilas($id, $obj, 'id_atributo', 'atributo', '');
	}


	// Devolver el libro recién creado como objeto JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
	exit;
}

// Si se realiza una solicitud con un método diferente a POST, devolver un error
header('HTTP/1.1 405 Method Not Allowed');
exit;