<?php 
	require("conexion.php");
	class Ciclo extends DBA{
		public function alta($id_ciclo,$nombre,$sid_instituto) {
			$this->sentencia = "INSERT INTO ciclo VALUES ('$id_ciclo','$nombre','$sid_instituto');";
			$this->ejecutar_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM ciclo;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM ciclo WHERE id_ciclo = '$id';";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre,$id){
            $this->sentencia="UPDATE ciclo SET nombre = '$nombre' WHERE id_ciclo = '$id';";
			$this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM ciclo WHERE id_ciclo = '$id'";
			$this->ejecutar_sentencia();
		}
		public function id($value){
			return $this->generator($value);
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $obj = new Ciclo();
        
        if ($_POST['accion'] === 'insertar') {

            $id = $_POST['id_modificar'];

            $nombre = $_POST['nombre_ciclo'];
            session_start();
            $sid_instituto = $_SESSION['sid_instituto'];

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$nombre,$sid_instituto);

                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'ciclos',
                );
            }else{

                $resultado = $obj->modificar($nombre, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'ciclos',
                );
            }
        }

        require("funciones.php");
        
        if ($_POST['accion'] === 'eliminar') {

            $id = $_POST['id']; 

            $respuesta = eliminarFila($id, $obj);
        }

        if ($_POST['accion'] === 'consulta') {

            $id = $_POST['id_modificar']; 
            $detalles = $_POST['detalles'];

            if (empty($detalles)) {
                $respuesta = consultarFilas($id, $obj, 'id_ciclo', 'ciclos', '');
            }else{
                $respuesta = consultarFilas($id, $obj, 'id_ciclo', 'ciclos', 'detalles');
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
