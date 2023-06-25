<?php 
	require("conexion.php");
	class Tipo_mensaje extends DBA{
		public function alta($id_tipo_mensaje,$icono,$nombre,$sid_instituto) {
			$this->sentencia = "INSERT INTO tipo_mensaje VALUES ('$id_tipo_mensaje','$icono','$nombre','$sid_instituto');";
			return $this->obtener_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM tipo_mensaje;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM tipo_mensaje WHERE id_tipo_mensaje = '$id';";
            return $this->obtener_sentencia();
        }
		public function modificar($icono,$nombre,$id){
			$this->sentencia="UPDATE tipo_mensaje SET icono = '$icono', nombre = '$nombre' WHERE id_tipo_mensaje = '$id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM tipo_mensaje WHERE id_tipo_mensaje = '$id'";
			return $this->ejecutar_sentencia();
		}
		public function id($value){
			return $this->generator($value);
		}
	}

	// Comprobar si el método es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recuperar los datos enviados en la solicitud
        $data = json_decode(file_get_contents("php://input"), true);

        // Validar los datos recibidos
        if ( !isset($data['accion']) || !isset($data['data']) ) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Error: Campos obligatorios';
            exit;
        }
        
        $datos_tabla = $data['data'];

        $obj = new Tipo_mensaje();
        
        if ($data['accion'] === 'insertar') {

            $id = $datos_tabla['id'];

            $icono = $datos_tabla['sticker_tipo_mensaje'];
            $nombre = $datos_tabla['nombre_tipo_mensaje'];
            $sid_instituto = 1;

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$icono,$nombre,$sid_instituto);

                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'tipo_mensajes',
                );
            }else{

                $resultado = $obj->modificar($icono,$nombre, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'tipo_mensajes',
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

            $respuesta = consultarFilas($id, $obj, 'id_tipo_mensaje', 'tipo_mensajes', '');
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
				