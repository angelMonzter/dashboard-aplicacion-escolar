
<?php 
require("conexion.php");
class Evento extends DBA{
	public function alta($id_evento,$nombre,$fecha,$todos,$nivel,$grado,$grupo,$sid_instituto) {
		$this->sentencia = "INSERT INTO evento VALUES ('$id_evento','$nombre','$fecha','$todos','$nivel','$grado','$grupo','$sid_instituto');";
		$this->ejecutar_sentencia();
	}
	public function consulta() {
		$this->sentencia = "SELECT * FROM evento;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id) {
		$this->sentencia = "SELECT * FROM evento WHERE id_evento=$id;";
		return $this->obtener_sentencia();
	}
	public function modificar($nombre,$fecha,$todos,$nivel,$grado,$grupo,$sid_instituto,$id_evento){
		$this->sentencia="UPDATE evento SET nombre='$nombre',fecha='$fecha',todos='$todos',nivel='$nivel',grado='$grado',grupo='$grupo',sid_instituto='
		$sid_instituto' WHERE id_evento=$id_evento;";
		$this->ejecutar_sentencia();
	}
	public function eliminar($id){
		$this->sentencia="DELETE FROM evento WHERE id_evento=$id;";
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

	$obj = new Evento();

	if ($data['accion'] === 'insertar') {
		$id = $datos_tabla['id'];

		$nombre_evento = $datos_tabla['nombre_evento'];
		$fecha_evento = $datos_tabla['fecha_evento'];
		$todo = $datos_tabla['todos'];
		$nivel_evento = $datos_tabla['nivel_evento'];
		$grado_evento = $datos_tabla['grado_evento'];
		$grupo_evento = $datos_tabla['grupo_evento'];
		session_start();
		$sid_institucion = $_SESSION['sid_instituto'];

		if (empty($id)) {
			$id = $obj->id(5);

			$resultado = $obj->alta($id,$nombre_evento,$fecha_evento,$todo,$nivel_evento,$grado_evento,$grupo_evento,$sid_institucion);
			
                $respuesta = array(
                    'respuesta' => 'alta',
                    'resultado' => $resultado,
                    'modulo' => 'evento',
                );
		} else {
			$resultado =$obj->modificar($nombre_evento,$fecha_evento,$todo,$nivel_evento,$grado_evento,$grupo_evento,$sid_institucion,$id);
							
			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'evento',
			);
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
