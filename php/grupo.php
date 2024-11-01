<?php 
	require("conexion.php");
	class Grupo extends DBA{
		public function alta($id_grupo,$sid_grado,$nombre) {
			$this->sentencia = "INSERT INTO grupo VALUES ('$id_grupo', '$sid_grado','$nombre');";
			return $this->obtener_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM grupo;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM grupo WHERE id_grupo = '$id';";
            return $this->obtener_sentencia();
        }
        public function consulta_select()
        {
            $this->sentencia = "SELECT id_grupo AS id, nombre FROM grupo;";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre, $id){
			$this->sentencia="UPDATE grupo SET nombre = '$nombre' WHERE id_grupo = '$id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM grupo WHERE id_grupo = '$id'";
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

        $obj = new Grupo();
        
        if ($data['accion'] === 'insertar') {

            $id = $datos_tabla['id'];

            $nombre = $datos_tabla['nombre_grupo'];
            $sid_grado = $datos_tabla['sid_grado'];;

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$sid_grado,$nombre);

                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'grupos',
                );
            }else{

                $resultado = $obj->modificar($nombre, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'grupos',
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
                'arreglo' => $arreglo,
            );
        }

        require("funciones.php");

        $id = $datos_tabla['id']; 
        
        if ($data['accion'] === 'eliminar') {

            $respuesta = eliminarFila($id, $obj);
        }

        if ($data['accion'] === 'consulta') {

            $respuesta = consultarFilas($id, $obj, 'id_grupo', 'grupos', '');
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
				