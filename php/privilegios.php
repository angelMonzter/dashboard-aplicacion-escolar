<?php 
	require("conexion.php");
	class Privilegios extends DBA{
		public function alta($privilegios_id,$nombre_privilegio,$sid_rol,$activo) {
			$this->sentencia = "INSERT INTO privilegios VALUES ('$privilegios_id','$nombre_privilegio','$sid_rol','$activo');";
			return $this->ejecutar_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM privilegios;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM privilegios WHERE privilegios_id = '$id';";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre_privilegio, $id){
            $this->sentencia="UPDATE privilegios SET nombre = '$nombre' WHERE privilegios_id = '$id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM privilegios WHERE privilegios_id = '$id'";
			return $this->ejecutar_sentencia();
		}
		public function id($value){
			return $this->generator($value);
		}
	}

	// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	require("funciones.php");

	$obj = new Privilegios();
		
	if ($_POST['accion'] === 'insertar') {

		$nombre = $_POST['nombre_privilegio'];
		$sid_rol = $_POST['sid_rol'];
		$activo = $_POST['check_activo'];
		
		$id = $_POST['id_modificar'];

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id,$nombre,$sid_rol,$activo);

			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'privilegios',
			);
		} else {

			$resultado = $obj->modificar($nombre, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'privilegios',
			);
		}
	}

    /*if ($_POST['accion'] === 'eliminar') {

        $id = $_POST['id']; 

        $respuesta = eliminarFila($id, $obj);
    }*/

    if ($_POST['accion'] === 'consulta') {
		
		error_reporting(0);
        $id = $_POST['id_modificar']; 
        $detalles = $_POST['detalles'];

        if (empty($detalles)) {
            $respuesta = consultarFilas($id, $obj, 'privilegios_id', 'privilegios', '');
        }else{
            $respuesta = consultarFilas($id, $obj, 'privilegios_id', 'privilegios', 'detalles');
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
				