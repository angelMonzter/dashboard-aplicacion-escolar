
<?php
require("conexion.php");
class Instituto extends DBA
{
	public function alta($id_instituto, $nombre, $logo, $correo, $banco, $cuenta_banco, $descripcion, $fecha_inicio_licencia, $fecha_limite, $politicas, $nombre_beneficiario, $asistencia, $pago, $fecha_creacion, $sid_usuario)
	{
		$this->sentencia = "INSERT INTO instituto VALUES ('$id_instituto','$nombre', '$logo','$correo','$banco','$cuenta_banco','$descripcion','$fecha_inicio_licencia','$fecha_limite','$politicas','$nombre_beneficiario','$asistencia','$pago','$fecha_creacion','$sid_usuario');";
		$this->ejecutar_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM instituto;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM instituto WHERE id_instituto = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($nombre, $descripcion, $id_instituto)
	{
		$this->sentencia = "UPDATE instituto SET nombre='$nombre', descripcion='$descripcion' WHERE id_instituto = '$id_instituto';";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM instituto WHERE id_instituto = '$id';";
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

	$obj = new Instituto();

	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$nombre = $datos_tabla['nombre'];
		$descripcion = $datos_tabla['descripcion'];
		//$inicio = $datos_tabla['inicio'];
		//$limite = $datos_tabla['limite'];
		//$correo = $datos_tabla['correo'];
		//$banco = $datos_tabla['banco'];
		//$nombre_beneficiario = $datos_tabla['nombre_beneficiario'];
		//$cuenta_banco = $datos_tabla['cuenta_banco'];
		//$asistencia = $datos_tabla['asistencia'];
		//$pagos = $datos_tabla['pagos'];
		//$logo = $datos_tabla['logo'];
		//$politica = $datos_tabla['politica'];

		//$fecha_creacion = date("Y-m-d H:i:s");;
		//$sid_usuario = '1';

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id, $nombre, $logo, $correo, $banco, $cuenta_banco, $descripcion, $inicio, $limite, $politica, $nombre_beneficiario, $asistencia, $pagos, $fecha_creacion, $sid_usuario);

			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'instituto',
			);
		} else {

			$resultado = $obj->modificar($nombre, $descripcion, $id);

			$respuesta = array(
				'respuesta' => 'edicion',
				'id' => $id,
				'nombre_instituto' => $nombre,
				'descripcion_instituto' => $descripcion,
				'modulo' => 'instituto',
			);
		}
	}

	require("funciones.php");

	$id = $datos_tabla['id'];

	if ($data['accion'] === 'eliminar') {

		$respuesta = eliminarFila($id, $obj);
	}

	if ($data['accion'] === 'consulta') {

	    $detalles = $datos_tabla['detalles'];

	    if (empty($detalles)) {
	        $respuesta = consultarFilas($id, $obj, 'id_instituto', 'instituto', '');
	    }else{
	        $respuesta = consultarFilas($id, $obj, 'id_instituto', 'instituto', 'detalles');
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
