<?php
require("conexion.php");
class Pago extends DBA
{
	public function alta($id_pago, $sid_alumno, $modo, $concepto, $monto, $sid_penalidad, $status, $fecha_pago, $sid_usuario)
	{
		$this->sentencia = "INSERT INTO pago VALUES ('$id_pago','$sid_alumno','$modo','$concepto','$monto','$sid_penalidad','$status','$fecha_pago', '$sid_usuario');";
		return $this->ejecutar_sentencia();
	}
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM pago;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM pago WHERE id_pago = '$id';";
		return $this->obtener_sentencia();
	}
	public function modificar($sid_alumno, $modo, $concepto, $monto, $sid_penalidad, $status, $fecha_pago, $id_pago)
	{
		$this->sentencia = "UPDATE pago SET sid_alumno='$sid_alumno',modo='$modo', concepto = '$concepto' , monto= $monto ,sid_penalidad='$sid_penalidad', status = '$status', fecha_pago= '$fecha_pago' WHERE id_pago = '$id_pago'";
		return $this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM pago WHERE id_pago = '$id';";
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

	$obj = new Pago();

	if ($data['accion'] === 'insertar') {
		$id = $datos_tabla['id'];

		$sid_alumno = $datos_tabla['matricula'];
		$modo = $datos_tabla['modo'];
		$concepto = $datos_tabla['concepto'];
		$monto = $datos_tabla['monto'];
		$sid_penalidad = '2';
		$status = '1';
		$fecha = date("Y-m-d H:i:s");
		$sid_usuario = '1';

		if (empty($id)) {
			$id = $obj->id(5);

			$resultado = $obj->alta($id, $sid_alumno, $modo, $concepto, $monto, $sid_penalidad, $status, $fecha, $sid_usuario);

			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'pago',
			);
		} else {
			$resultado = $obj->modificar($sid_alumno, $modo, $concepto, $monto, $sid_penalidad, $status, $fecha,$id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'pago',
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
            $respuesta = consultarFilas($id, $obj, 'id_pago', 'pago', '');
        }else{
            $respuesta = consultarFilas($id, $obj, 'id_pago', 'pago', 'detalles');
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