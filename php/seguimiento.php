<?php
require("conexion.php");

class Seguimiento extends DBA
{
	public function alta($id_seguimiento, $sid_alumno, $sid_atributo, $nombre_evaluacion, $fecha_registro)
	{
		$this->sentencia = "INSERT INTO seguimiento VALUES ('$id_seguimiento','$sid_alumno','$sid_atributo','$nombre_evaluacion','$fecha_registro');";
		return $this->obtener_sentencia();

	}
	public function consulta()
	{
		$this->sentencia = "SELECT DATE_FORMAT(fecha_registro, '%Y-%m') AS fecha_mes, sid_alumno, COUNT(*) AS total, seguimiento.id_seguimiento AS id_seguimiento, usuario.nombre AS nombre, usuario.apellido AS apellido, padre.nombre AS nombre_padre,  padre.apellido AS apellido_padre, alumno.nombre AS estudiante, alumno.apellido AS app_alumno, seguimiento.fecha_registro AS fecha_envio FROM `seguimiento` INNER JOIN alumno on alumno.id_alumno=seguimiento.sid_alumno INNER JOIN atributo ON atributo.id_atributo = seguimiento.sid_atributo INNER JOIN padre ON padre.id_padre = alumno.sid_padre INNER JOIN usuario ON usuario.id_usuario=atributo.sid_usuario GROUP BY DATE_FORMAT(seguimiento.fecha_registro, '%Y-%m'), seguimiento.sid_alumno";
		return $this->obtener_sentencia();

	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT seguimiento.id_seguimiento AS id_seguimiento, seguimiento.sid_alumno AS sid_alumno, seguimiento.sid_atributo AS sid_atributo, seguimiento.nombre_evaluacion AS nombre_evaluacion, seguimiento.fecha_registro AS fecha_registro, usuario.nombre AS nombre, usuario.apellido AS apellido, padre.nombre AS nombre_padre, padre.apellido AS apellido_padre, alumno.nombre AS estudiante, alumno.apellido AS app_alumno, seguimiento.fecha_registro AS fecha_envio FROM `seguimiento` INNER JOIN alumno on alumno.id_alumno=seguimiento.sid_alumno INNER JOIN atributo ON atributo.id_atributo = seguimiento.sid_atributo INNER JOIN padre ON padre.id_padre = alumno.sid_padre INNER JOIN usuario ON usuario.id_usuario=atributo.sid_usuario WHERE id_seguimiento = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_alumno, $sid_atributo, $nombre_evaluacion, $fecha_registro, $id_seguimiento)
	{
		$this->sentencia = "UPDATE `seguimiento` SET `sid_alumno`='$sid_alumno',`sid_atributo`='$sid_atributo',`nombre_evaluacion`='$nombre_evaluacion',`fecha_registro`='$fecha_registro' WHERE id_seguimiento='$id_seguimiento';";
		return $this->ejecutar_sentencia();
	}
	public function eliminar($id_seguimiento)
	{
		$this->sentencia = "DELETE FROM seguimiento WHERE id_seguimiento='$id_seguimiento';";
		return $this->ejecutar_sentencia();
	}
	public function id($value)
	{
		return $this->generator($value);
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data = json_decode(file_get_contents("php://input"), true);

	// Validar los datos recibidos
	if (!isset($data['accion']) || !isset($data['data'])) {
		header('HTTP/1.1 400 Bad Request');
		echo 'Error: Campos obligatorios';
		exit;
	}
	$datos_tabla = $data['data'];

	$obj = new Seguimiento();

	if ($data['accion'] === 'insertar') {

		// $id = $datos_tabla['id'];

		$id = '';

		$sid_atributo = $datos_tabla['atributo'];
		$nombre_atributo = $datos_tabla['nombre'];
		$sid_alumno=$datos_tabla['sid_alumno'];
		$creacion = date("Y-m-d H:i:s");
		

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id,$sid_alumno,$sid_atributo,$nombre_atributo,$creacion);

			$respuesta = array(
				'respuesta' => 'alta',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'seguimiento',
			);
		}else{

			$resultado = $obj->modificar($icono,$nombre, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'seguimiento',
			);
		}
	}

	require("funciones.php");
        
	if ($data['accion'] === 'eliminar') {
		$id = $datos_tabla['id']; 

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

		$id = $datos_tabla['id']; 
		$detalles = $datos_tabla['detalles'];

		if (empty($detalles)) {
			$respuesta = consultarFilas($id, $obj, 'id_seguimiento', 'seguimiento', '');
		}else{
			$respuesta = consultarFilas($id, $obj, 'id_seguimiento', 'seguimiento', 'detalles');
		}

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