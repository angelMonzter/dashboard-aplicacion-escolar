<?php
require("conexion.php");
class Rol extends DBA
{
	public function alta($id_rol, $sid_instituto, $nombre, $fecha_registro)
	{
		$this->sentencia = "INSERT INTO rol VALUES ('$id_rol','$sid_instituto','$nombre','$fecha_registro');";
		return $this->ejecutar_sentencia();
	}
	/*public function consulta() {
			  $this->sentencia = "SELECT * FROM rol;";
			  return $this->obtener_sentencia();
		  }*/
	public function consulta()
	{
		$this->sentencia = "SELECT * FROM rol";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id)
	{
		$this->sentencia = "SELECT * FROM rol WHERE id_rol = '$id';";
		return $this->obtener_sentencia();
	}
	public function consulta_select()
	{
		$this->sentencia = "SELECT id_rol AS id, nombre FROM rol;";
		return $this->obtener_sentencia();
	}
	public function modificar($nombre, $id)
	{
		$this->sentencia = "UPDATE rol SET nombre = '$nombre' WHERE id_rol = '$id';";
		return $this->ejecutar_sentencia();
	}
	public function eliminar($id)
	{
		$this->sentencia = "DELETE FROM rol WHERE id_rol = '$id'";
		return $this->ejecutar_sentencia();
	}
	public function id($value)
	{
		return $this->generator($value);
	}
}

// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	require("funciones.php");

	$obj = new Rol();

	if ($_POST['accion'] === 'insertar') {

		$nombre = $_POST['nombre_rol'];
		$fecha_creacion = date("Y-m-d H:i:s");
		session_start();
		$sid_instituto = $_SESSION['sid_instituto'];

		$id = $_POST['id_modificar'];

		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id, $sid_instituto, $nombre, $fecha_creacion);

			$respuesta = array(
				'respuesta' => 'alta',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'rol',
			);
		} else {

			$resultado = $obj->modificar($nombre, $id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'rol',
			);
		}
	}

	if ($data['accion'] === 'mostrar_select') {
        
        $resultado = $obj->consulta_select();

            while ( $fila = $resultado->fetch_assoc() ){
                $arreglo[] = $fila;
            }

        $respuesta = array(
            'respuesta' => 'select',
          //  'arreglo' => $arreglo,
        );
    }

	if ($_POST['accion'] === 'eliminar') {

		$id = $_POST['id'];

		$respuesta = eliminarFila($id, $obj);
	}

	if ($_POST['accion'] === 'consulta') {

		$id = $_POST['id_modificar'];
		$detalles = $_POST['detalles'];

		if (empty($detalles)) {
			$respuesta = consultarFilas($id, $obj, 'id_rol', 'rol', '');
		} else {
			$respuesta = consultarFilas($id, $obj, 'id_rol', 'rol', 'detalles');
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