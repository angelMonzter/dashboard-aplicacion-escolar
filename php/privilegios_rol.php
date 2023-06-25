<?php 
	require("conexion.php");
	class Privilegios_rol extends DBA{
		public function alta($privilegios_rol_id,$sid_rol,$sid_privilegios,$activo) {
			$this->sentencia = "INSERT INTO privilegios_rol VALUES ('$privilegios_rol_id','$sid_rol','$sid_privilegios','$activo');";
			return $this->ejecutar_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM privilegios_rol;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM privilegios_rol WHERE sid_rol = '$id';";
            return $this->obtener_sentencia();
        }
        public function consulta_privilegio($nombre_privilegio){
            $this->sentencia = "SELECT * FROM privilegios WHERE nombre_privilegio = '$nombre_privilegio';";
            return $this->obtener_sentencia();
        }
		public function modificar($activo, $sid_rol, $privilegios_id){
            $this->sentencia="UPDATE privilegios_rol SET activo = '$activo' WHERE sid_rol = '$sid_rol' AND sid_privilegios = '$privilegios_id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM privilegios_rol WHERE privilegios_rol_id = '$id'";
			return $this->ejecutar_sentencia();
		}
		public function id($value){
			return $this->generator($value);
		}
	}

	// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	require("funciones.php");

	$obj = new Privilegios_rol();
		
	if ($_POST['accion'] === 'insertar') {

		error_reporting(0);
		$id = $_POST['id_modificar'];

		if (empty($id)) {

			$sid_rol = $_POST['id_rol'];
			$id_privilegio = $_POST['id_privilegio'];
			$id_privilegio = explode(",", $id_privilegio);

			for ($i=0; $i < count($id_privilegio); $i++) { 
				$id_privilegio_rol[$i] = $obj->id(5);
            	$resultado = $obj->alta($id_privilegio_rol[$i], $sid_rol, $id_privilegio[$i], 'no');
			}
			
			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $id_privilegio,
				'modulo' => 'privilegio_rol',
			);
		} else {
			$sid_rol = $_POST['sid_rol'];
			$nombre_privilegio = $_POST['nombre_privilegio'];
			$activo = $_POST['activo'];

			$resultado_privilegio = $obj->consulta_privilegio($nombre_privilegio);
			while ( $fila = $resultado_privilegio->fetch_assoc() ){
                $privilegios_id = $fila["privilegios_id"];
            }

			$resultado = $obj->modificar($activo, $sid_rol, $privilegios_id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'privilegio_rol',
			);
		}
	}

	if ($_POST['accion'] === 'consulta') {
		
        $id = $_POST['id_modificar']; 
		$id = explode(",", $id);
        $detalles = $_POST['detalles'];

        if (empty($detalles)) {
        	for ($i=0; $i < count($id); $i++) { 
            	$respuesta[] = consultarFilas($id[$i], $obj, 'privilegios_rol_id', 'privilegios_rol', '');
			}
        }else{
            $respuesta = consultarFilas($id, $obj, 'privilegios_rol_id', 'privilegios_rol', 'detalles');
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
				