<?php 
	require("conexion.php");
	class Padre extends DBA{
		public function alta($id_padre,$nombre,$apellido,$correo,$creacion,$contrasena,$sid_instituto) {
			$this->sentencia = "INSERT INTO padre VALUES ('$id_padre','$nombre','$apellido','$correo','$creacion','$contrasena','$sid_instituto');";
			return $this->obtener_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT * FROM padre;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM padre WHERE id_padre = '$id';";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre,$apellido,$correo,$id){
			$this->sentencia="UPDATE padre SET nombre = '$nombre', apellido = '$apellido', correo = '$correo' WHERE id_padre = '$id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM padre WHERE id_padre = '$id'";
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

        $obj = new Padre();
        
        if ($data['accion'] === 'insertar') {

            $id = $datos_tabla['id'];

            $nombre = $datos_tabla['nombre_padre'];
            $apellido = $datos_tabla['apellido_padre'];
            $correo = $datos_tabla['correo_padre'];
            $sid_institucion = $datos_tabla['sid_instituto'];
            $creacion = date("Y-m-d H:i:s");
            $contrasena = $datos_tabla['contrasena_padre'];

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$nombre,$apellido,$correo,$creacion,$contrasena,$sid_institucion);
                
                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'padres',
                );
            }else{

                $resultado = $obj->modificar($nombre,$apellido,$correo, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'padres',
                );
            }
        }

        require("funciones.php");

        $id = $datos_tabla['id']; 
        
        if ($data['accion'] === 'eliminar') {

            $respuesta = eliminarFila($id, $obj);
        }

        if ($data['accion'] === 'consulta') {

            $respuesta = consultarFilas($id, $obj, 'id_padre', 'padres', '');
        }

        if ($data['accion'] === 'eliminar_multiple') {
            if (empty($id)) {

                // Obtener los registros seleccionados
                $registros = $datos_tabla['registros'];

                // Eliminar los registros seleccionados
                foreach ($registros as $registro) {
                    //$id = mysqli_real_escape_string($conexion, $registro);
                    
                    // Ejecutar la consulta de eliminación
                    $respuesta_filas[] = eliminarFila($registro, $obj);
                }

                $respuesta = array(
                    'respuesta' => 'eliminado',
                    'id' => $respuesta_filas
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
