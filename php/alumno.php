<?php 
	require("conexion.php");
	class Alumno extends DBA{
		public function alta($id_alumno,$nombre,$apellido,$matricula,$sexo,$sid_nivel,$sid_grado,$sid_grupo,$sid_padre,$sid_institucion,$foto) {
			$this->sentencia = "INSERT INTO alumno VALUES ('$id_alumno','$nombre','$apellido','$matricula','$sexo','$sid_nivel','$sid_grado','$sid_grupo','$sid_padre','$sid_institucion','$foto');";
			return $this->obtener_sentencia();
		}
		public function consulta() {
			$this->sentencia = "SELECT alumno.id_alumno AS id_alumno, alumno.nombre AS nombre, alumno.apellido AS apellido, alumno.matricula AS matricula, alumno.sexo AS sexo, padre.nombre AS nombre_padre, nivel.nombre AS sid_nivel, grado.nombre AS sid_grado, grupo.nombre AS sid_grupo FROM alumno INNER JOIN nivel ON alumno.sid_niveL= nivel.id_nivel INNER JOIN padre ON alumno.sid_padre = padre.id_padre INNER JOIN grupo ON alumno.sid_grupo = grupo.id_grupo INNER JOIN grado ON alumno.sid_grado = grado.id_grado;";
			return $this->obtener_sentencia();
		}
		public function consultar_id($id){
            $this->sentencia = "SELECT * FROM alumno WHERE id_alumno = '$id';";
            return $this->obtener_sentencia();
        }
		public function modificar($nombre,$apellido,$matricula,$sexo,$sid_nivel,$sid_grado,$sid_grupo,$foto,$id){
			$this->sentencia="UPDATE alumno SET nombre = '$nombre', apellido = '$apellido', matricula = '$matricula', sexo = '$sexo', sid_nivel = '$sid_nivel', sid_grado = '$sid_grado', sid_grupo = '$sid_grupo', foto = '$foto' WHERE id_alumno = '$id';";
			return $this->ejecutar_sentencia();
		}
		public function eliminar($id){
            $this->sentencia="DELETE FROM alumno WHERE id_alumno = '$id'";
			return $this->ejecutar_sentencia();
		}
        public function consulta_select()
        {
        $this->sentencia = "SELECT id_alumno AS id, nombre FROM alumno WHERE sid_instituto = '79556';";
        return $this->obtener_sentencia();
        }

        public function consultar_filtro($nivel, $grado, $grupo){
            $this->sentencia = "SELECT alumno.id_alumno AS id_alumno, alumno.nombre AS nombre_estudiante, alumno.apellido AS app_estudiante, alumno.matricula AS matricula, alumno.sexo AS sexo, padre.nombre AS nombre_padre, nivel.nombre AS nombre_nivel, grado.nombre AS grado, grupo.nombre AS grupo FROM alumno INNER JOIN nivel ON alumno.sid_niveL= nivel.id_nivel INNER JOIN padre ON alumno.sid_padre = padre.id_padre INNER JOIN grupo ON alumno.sid_grupo = grupo.id_grupo INNER JOIN grado ON alumno.sid_grado = grado.id_grado WHERE grado.nombre LIKE '%%' OR grupo.nombre LIKE '%%' OR nivel.nombre LIKE '%%' GROUP BY alumno.matricula";
            return $this->obtener_sentencia();
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

        $obj = new Alumno();
        
        if ($data['accion'] === 'insertar') {

            $id = $datos_tabla['id'];

            $nombre = $datos_tabla['nombre_alumno'];
            $apellido = $datos_tabla['apellidos_alumno'];
            $matricula = $datos_tabla['matricula_alumno'];
            $sexo = $datos_tabla['sexo_alumno'];
            $sid_nivel = $datos_tabla['sid_nivel'];
            $sid_grado = $datos_tabla['sid_grado'];
            $sid_grupo = $datos_tabla['sid_grupo'];
            $sid_institucion = $datos_tabla['sid_instituto'];
            $sid_padre = $datos_tabla['sid_padre'];
            $foto = 'fot.jpg';//$datos_tabla['foto_alumno'];

            if (empty($id)) {

                $id = $obj->id(5);

                $resultado = $obj->alta($id,$nombre,$apellido,$matricula,$sexo,$sid_nivel,$sid_grado,$sid_grupo,$sid_padre,$sid_institucion,$foto);

                $respuesta = array(
                    'respuesta' => 'alta',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'estudiantes',
                );
            }else{

                $resultado = $obj->modificar($nombre,$apellido,$matricula,$sexo,$sid_nivel,$sid_grado,$sid_grupo,$foto,$id);

                $respuesta = array(
                    'respuesta' => 'modificacion',
                    'id' => $id,
                    'resultado' => $resultado,
                    'modulo' => 'estudiantes',
                );
            }
        }

        if ($data['accion'] === 'mostrar_filtros') {
            $busqueda = $datos_tabla['busqueda'];
            $nivel = $datos_tabla['nivel'];
            $grado = $datos_tabla['grado'];
            $grupo = $datos_tabla['grupo'];
            
            $resultado = $obj->consultar_filtro('Secundaria','', '');

            while ( $fila = $resultado->fetch_assoc() ){
                $id_modulo_array[] = $fila['id_alumno'];
                $arreglo[] = $fila;
            }
            // $resultado = $obj->consultar_filtro($nivel, $grado, $grupo);
            $respuesta = array(
                'respuesta' => 'filtro',
                'id' => $id_modulo_array,
                'fila' => $arreglo,
                'modulo' => 'estudiantes',
            );
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

        if ($data['accion'] === 'excel') {

            $busqueda = $datos_tabla['busqueda'];
            $nivel = $datos_tabla['nivel'];
            $grado = $datos_tabla['grado'];
            $grupo = $datos_tabla['grupo'];

            $resultado = $obj->consultar_filtro('Secundaria','', '');
            $data = [];
            while ($row = $resultado->fetch_assoc()) {
                $data[] = $row;
            }

            require("excel/reporteEstudiantes.php");

            $respuesta = array(
                'respuesta' => 'excel',
                'id' => $busqueda,
                'fila' => $data,
                'modulo' => 'estudiantes',
            );
        }
        
        require("funciones.php");

        
        if ($data['accion'] === 'eliminar') {

            $id = $datos_tabla['id'];
             
            $respuesta = eliminarFila($id, $obj);
        }


        if ($data['accion'] === 'consulta') {

            $id = $datos_tabla['id']; 
            $detalles = $datos_tabla['detalles'];

            if (empty($detalles)) {
                $respuesta = consultarFilas($id, $obj, 'id_alumno', 'estudiantes', '');
            }else{
                $respuesta = consultarFilas($id, $obj, 'id_alumno', 'estudiantes', 'detalles');
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
				