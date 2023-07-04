<?php 
	require("conexion.php");
	class Extracurricular extends DBA{
		public function alta($id_extracurricular,$nombre,$sid_instituto) {
			$this->sentencia = "INSERT INTO extracurricular VALUES ('$id_extracurricular','$nombre','$sid_instituto');";
			return $this->ejecutar_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM extracurricular;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM extracurricular WHERE id_extracurricular = '$id';";
            return $this->obtener_sentencia();
        }
        public function consulta_select(){
            $this->sentencia = "SELECT id_extracurricular AS id, nombre FROM extracurricular WHERE sid_instituto = '1';";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre, $id){
			$this->sentencia="UPDATE extracurricular SET nombre = '$nombre' WHERE id_extracurricular = '$id';";
			$this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM extracurricular WHERE id_extracurricular = '$id';";
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

        $obj = new Extracurricular();
        
        if ($data['accion'] === 'insertar') {

            $id = $datos_tabla['id'];

            $nombre = $datos_tabla['nombre_extracurricular'];
            $sid_instituto = 1;

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$nombre,$sid_instituto);

                $respuesta = array(
                    'respuesta' => 'alta',
                    'resultado' => $resultado,
                    'modulo' => 'extracurriculares',
                );
            }else{

                $resultado = $obj->modificar($nombre, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'extracurriculares',
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

            $id = $datos_tabla['id'];
            $detalles = $datos_tabla['detalles'];

            if (empty($detalles)) {
                $respuesta = consultarFilas($id, $obj, 'id_extracurricular', 'extracurriculares', '');
            } else {
                $respuesta = consultarFilas($id, $obj, 'id_extracurricular', 'extracurriculares', 'detalles');
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
				