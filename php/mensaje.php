<?php 
	require("conexion.php");
	class Mensaje extends DBA{
		public function alta($id_mensaje,$receptor,$sid_tipo,$sid_alumno,$sid_nivel,$sid_grado,$sid_grupo,$sid_extracurricular,$destinatarios,$asunto,$mensaje,$respuesta_rapida,$mensaje_programado,$fecha_envio,$hora_envio,$repetir,$periodo,$fecha_fin,$sid_instituto) {
			$this->sentencia = "INSERT INTO mensaje VALUES ('$id_mensaje','$receptor','$sid_tipo','$sid_alumno','$sid_nivel','$sid_grado','$sid_grupo','$sid_extracurricular','$destinatarios','$asunto','$mensaje','$respuesta_rapida','$mensaje_programado','$fecha_envio','$hora_envio','$repetir','$periodo','$fecha_fin','$sid_instituto');";
			return $this->ejecutar_sentencia();
		}
        public function alta_url($id_url,$sid_mensaje,$url) {
            $this->sentencia = "INSERT INTO url_mensaje VALUES ('$id_url','$sid_mensaje','$url');";
            return $this->ejecutar_sentencia();
        }
        public function alta_archivo($id_archivo_mensaje,$sid_mensaje,$url) {
            $this->sentencia = "INSERT INTO archivo_mensaje VALUES ('$id_archivo_mensaje','$sid_mensaje','$url');";
            return $this->ejecutar_sentencia();
        }
		public function consulta() {
			$this->sentencia = "SELECT * FROM mensaje;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM mensaje WHERE id_mensaje = $id;";
            return $this->obtener_sentencia();
        }
		public function modificar($sid_tipo,$sid_alumno,$nivel,$grado,$grupo,$sid_extracurricular,$asunto,$mensaje,$archivo_adjunto,$url,$respuesta_rapida,$mensaje_programado,$fecha_envio,$hora_envio,$repetir,$periodo,$fecha_fin,$id){
			$this->sentencia="UPDATE mensaje SET sid_tipo = '$sid_tipo', sid_alumno = '$sid_alumno', nivel = '$nivel', grado = '$grado', grupo = '$grupo', sid_extracurricular = '$sid_extracurricular', asunto = '$asunto', mensaje = '$mensaje', archivo_adjunto = '$archivo_adjunto', url = '$url', respuesta_rapida = '$respuesta_rapida', mensaje_programado = '$mensaje_programado', fecha_envio = '$fecha_envio', hora_envio = '$hora_envio', repetir = '$repetir', periodo = '$periodo', fecha_fin = '$fecha_fin' WHERE id_mensaje = $id;";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM mensaje WHERE id_mensaje = $id";
			return $this->ejecutar_sentencia();
		}
		public function id($value){
			return $this->generator($value);
		}
	}

	// Comprobar si el método es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recuperar los datos enviados en la solicitud
        //$data = json_decode(file_get_contents("php://input"), true);

        // Validar los datos recibidos
        /*if ( !isset($data['accion']) || !isset($data['data']) ) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Error: Campos obligatorios';
            exit;
        }*/
        
        //$datos_tabla = $data['data'];

        $obj = new Mensaje();
        
        if ($_POST['accion'] === 'insertar') {

            $id = $_POST['id_modificar'];

            $receptor = $_POST['receptor'];
            $sid_tipo = $_POST['sid_tipo'];
            $sid_estudiante = $_POST['sid_estudiante'];
            $sid_nivel = $_POST['sid_nivel'];
            $sid_grado = $_POST['sid_grado'];
            $sid_grupo = $_POST['sid_grupo'];
            $destinatario = $_POST['destinatario'];
            $sid_extracurricular = $_POST['sid_extracurricular'];

            $asunto = $_POST['asunto_mensaje'];
            $mensaje = $_POST['mensaje'];

            $respuesta_rapida = $_POST['respuesta_rapida_mensaje'];
            $mensaje_programado = $_POST['programado_mensaje'];

            $fecha_envio = $_POST['fecha_envio_mensaje'];
            $hora_envio_mensaje = $_POST['hora_envio_mensaje'];
            $minutos_envio_mensaje = $_POST['minutos_envio_mensaje'];
            $hora_envio = $hora_envio_mensaje . ':' . $minutos_envio_mensaje;

            $repetir = $_POST['repetir_mensaje'];
            $periodo = $_POST['periodo_mensaje'];
            $fecha_fin = $_POST['fecha_fin_mensaje'];

            $archivo_adjunto = $_FILES['archivo'];
            $archivo_adjunto_numero = count($_FILES['archivo']["name"]);

            session_start();
            $sid_instituto = $_SESSION['sid_instituto'];

            for ($i=0; $i < $archivo_adjunto_numero; $i++) { 

                $directorio = "../archivos/";
                $archivo = $directorio . basename($archivo_adjunto["name"][$i]);
                $archivo_subido = 1;
                $tipo_archivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                $imagen = getimagesize($archivo_adjunto["tmp_name"][$i]);
                
                if (isset($logo)) {
                    if ($imagen !== false) {
                        $archivo_subido = 1;
                    } else {
                        $archivo_subido = 0;
                    }
                }

                // Verificar si $archivo_subido es 0 debido a un error
                if ($archivo_subido == 0) {
                    $respuesta = array(
                        'respuesta' => 'El archivo no se pudo subir',
                    );
                // Si todo está bien, intentar subir el archivo
                } else {
                    if (move_uploaded_file($archivo_adjunto["tmp_name"][$i], $archivo)) {
                        $nombre_archivo[] = htmlspecialchars( basename( $archivo_adjunto["name"][$i]) );
                    } else {
                        $respuesta = array(
                            'respuesta' => 'Hubo un error al subir el archivo',
                        );
                    }
                }
            }
            
            $url = $_POST['url'];

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$receptor,$sid_tipo,$sid_estudiante,$sid_nivel,$sid_grado,$sid_grupo,$sid_extracurricular,$destinatario,$asunto,$mensaje,$respuesta_rapida,$mensaje_programado,$fecha_envio,$hora_envio,$repetir,$periodo,$fecha_fin,$sid_instituto);

                for ($i=0; $i < count($url); $i++) { 
                    $id_url[$i] = $obj->id(5);
                    $resultado_url = $obj->alta_url($id_url[$i], $id, $url[$i]);
                }

                for ($i=0; $i < count($nombre_archivo); $i++) { 
                    $id_archivo_mensaje[$i] = $obj->id(5);
                    $resultado_archivo = $obj->alta_archivo($id_archivo_mensaje[$i], $id, $nombre_archivo[$i]);
                }

                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'mensajes',
                    'url' => $url,
                    'nombre_archivo' => $nombre_archivo,
                );
            }else{

                //$resultado = $obj->modificar($nombre, $id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'mensajes',
                );
            }
        }
        require("funciones.php");
        /*

        $id = $datos_tabla['id']; 
        
        if ($data['accion'] === 'eliminar') {

            $respuesta = eliminarFila($id, $obj);
        }

        if ($data['accion'] === 'consulta') {

            $respuesta = consultarFilas($id, $obj, 'id_mensaje', 'mensajes');
        }
        if ($data['eliminar_multiple'] == 'eliminar_multiple') {
            
            $filas = $datos_tabla['filas']; 
            
            $respuesta = eliminarRegistrosMultiples($obj, $filas, 'mensajes');
        }

        */
        if ($_POST['accion'] === 'consulta') {
        
            $id = $_POST['id_modificar']; 
            $detalles = $_POST['detalles'];

            if (empty($detalles)) {
                $respuesta = consultarFilas($id, $obj, 'id_mensaje', 'mensajes', '');
            }else{
                $respuesta = consultarFilas($id, $obj, 'id_mensaje', 'mensajes', 'detalles');
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
				