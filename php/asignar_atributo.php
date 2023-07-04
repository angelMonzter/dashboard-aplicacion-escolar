<?php
require("conexion.php");
class Asignar_atributo extends DBA
{
	public function alta($id_asignar_atributo, $sid_atributo, $sid_alumno, $nombre, $fecha_registro, $sid_usuario)
	{
		$this->sentencia = "INSERT INTO asignar_atributo VALUES ('$id_asignar_atributo','$sid_atributo','$sid_alumno', '$nombre', '$fecha_registro', '$sid_usuario');";
		return $this->obtener_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM asignar_atributo;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM asignar_atributo WHERE id_asignar_atributo = '$id';";
		return $this->obtener_sentencia();
	}

	public function consulta_fecha($id, $fecha)
	{
		$this->sentencia = "SELECT * FROM asignar_atributo WHERE sid_alumno = '$id' AND fecha_registro like '$fecha';";
		return $this->obtener_sentencia();
	}
	public function consultar_atributos($id, $mes, $anio)
	{
		$this->sentencia = "SELECT * FROM asignar_atributo WHERE MONTH(fecha_registro) LIKE '%$mes%' AND YEAR(fecha_registro) = '$anio' AND sid_alumno = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_atributo, $sid_alumno, $fecha_registro, $id)
	{
		$this->sentencia = "UPDATE asignar_atributo SET sid_atributo = '$sid_atributo', sid_alumno ='$sid_alumno', fecha_registro = '$fecha_registro'  WHERE id_asignar_atributo = '$id';";
		return $this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM asignar_atributo WHERE id_asignar_atributo = '$id'";
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
		//$variablePHP = $_POST['variablePHP'];
		$datos_tabla = $data['data'];

		$obj = new Asignar_atributo();

		if ($data['accion'] === 'insertar') {

			$id = $datos_tabla['id'];
	
			$atributo = $datos_tabla['atributo'];
			$nombre = $datos_tabla['nombre'];
			$sid_alumno = $datos_tabla['sid_alumno'];
			$fecha_seguimiento = $datos_tabla['fecha_seguimiento'];
			$sid_usuario= 'K8ajs';
	
			if (empty($id)) {
	
				$id = $obj->id(5);
				$resultado = $obj->alta($id, $atributo, $sid_alumno, $nombre, $fecha_seguimiento,$sid_usuario);
	
				$respuesta = array(
					'respuesta' => 'alta',
					'id' => $id,
					'resultado' => $resultado,
					'modulo' => 'asignar_atributo',
				);
			} else {
	
				$resultado = $obj->modificar($nombre, $id);
	
				$respuesta = array(
					'respuesta' => 'modificacion',
					'id' => $id,
					'resultado' => $resultado,
					'modulo' => 'asignar_atributo',
				);
			}
		}

		if ($data['accion'] === 'atributo') {
			
			$fecha = $datos_tabla['fecha_registro'];
			$fecha = strtotime($fecha);
			$dia = date( "j", $fecha);
			$mes = date("n", $fecha);
			$anio =  date("Y", $fecha);
			
			$sid_alumno = $datos_tabla['sid_alumno'];

			$resultado =$obj -> consultar_atributos($sid_alumno, $mes, $anio);
			
            while ( $fila = $resultado->fetch_assoc() ){
                $id_modulo_array[] = $fila['id_asignar_atributo'];
                $arreglo[] = $fila;
            }

			$respuesta = array(
				'respuesta' => '',
				'id' => $id_modulo_array,
				'fila' => $arreglo,
				'modulo' => 'atributo',
				'detalles' => 'datos',
			);
		}

		require("funciones.php");

		$id = $datos_tabla['id'];

		if ($data['accion'] === 'eliminar') {

			$respuesta = eliminarFila($id, $obj);
		}

		if ($data['accion'] === 'consulta') {

			$respuesta = consultarFilas($id, $obj, 'id_asignar_atributo', 'asignar_atributo', '');
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