<?php
require("conexion.php");
class Alumno_extracurricular extends DBA
{
	public function alta($id_alumno_extracurricular, $sid_extracurricular, $sid_alumno, $fecha_ingreso)
	{
		$this->sentencia = "INSERT INTO `alumno_extracurricular` VALUES ('$id_alumno_extracurricular','$sid_extracurricular','$sid_alumno','$fecha_ingreso');";
		return $this->obtener_sentencia();

	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM alumno_extracurricular;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM `alumno_extracurricular` WHERE id_alumno_extracurricular = '$id';";
		return $this->obtener_sentencia();
	}
	public function consultar_extracurricular($sid_extracurricular)
	{	
		$this->sentencia = "SELECT alumno_extracurricular.id_alumno_extracurricular AS id_alumno_extracurricular, alumno.nombre AS nombre, alumno.apellido AS apellido, alumno.matricula AS matricula  FROM `alumno_extracurricular` INNER JOIN extracurricular ON alumno_extracurricular.sid_extracurricular = extracurricular.id_extracurricular INNER JOIN alumno ON alumno.id_alumno = alumno_extracurricular.sid_alumno WHERE alumno_extracurricular.sid_extracurricular = '$sid_extracurricular';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_alumno, $id)
	{
		$this->sentencia = "UPDATE alumno_extracurricular SET sid_alumno ='$sid_alumno'  WHERE id_alumno_extracurricular = '$id';";
		return $this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM alumno_extracurricular WHERE id_alumno_extracurricular = '$id';";
		return $this->ejecutar_sentencia();
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

	$obj = new Alumno_extracurricular();

	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$extra_estudiante = $datos_tabla['extra_estudiante'];
		$sid_extracurricular = $datos_tabla['sid_extracurricular'];
		$creacion = date("Y-m-d H:i:s");

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id, $sid_extracurricular, $extra_estudiante, $creacion);

			$respuesta = array(
                'respuesta' => 'alta',
                'id' => $id,
                'resultado' => $resultado,
                'modulo' => 'alumno_extracurriculares',
            );
		} else {

			$resultado = $obj->modificar($sid_alumno, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'alumno_extracurriculares',
			);
		}
	}
	if ($data['accion'] === 'asignar_extracurricular') {
		// $id_extra = null;
		// $datos = null;

		$sid_extracurricular = $datos_tabla['id_extracurricular'];
		$resultado = $obj->consultar_extracurricular($sid_extracurricular);
		
		while ( $fila = $resultado->fetch_assoc() ){
			$id_extra[] = $fila['id_alumno_extracurricular'];
			$datos[] = $fila;
		}

		$respuesta = array(
			'respuesta' => $sid_extracurricular,
			'id' => $id_extra,
			'fila' => $datos,
			'modulo' => 'agregar_extracurricular',
			'detalles' => 'datos',
		);
	}

	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$respuesta = consultarFilas($id, $obj, 'id_alumno_extracurricular', 'alumno_extracurriculares', '');
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