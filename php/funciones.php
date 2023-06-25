<?php
    function eliminarFila($id_eliminar, $obj){
        $resultado = $obj->eliminar($id_eliminar);

        return $respuesta = array(
            'respuesta' => 'eliminado',
            'id' => $id_eliminar
        );
    }
    function consultarFilas($id, $obj, $id_modulo, $modulo, $detalles){
        if ( empty($id) ) {

            $resultado = $obj->consulta();

            while ( $fila = $resultado->fetch_assoc() ){
                $id_modulo_array[] = $fila[$id_modulo];
                $arreglo[] = $fila;
            }
        }else{

            $resultado = $obj->consultar_id($id);

            while ( $fila = $resultado->fetch_assoc() ){
                $id_modulo_array[] = $fila[$id_modulo];
                $arreglo[] = $fila;
            }
        }

        $respuesta = array(
            'respuesta' => '',
            'id' => $id_modulo_array,
            'fila' => $arreglo,
            'modulo' => $modulo,
            'detalles' => $detalles,
        );

        if ( !empty($id) ) {

            $reemplazo = array('respuesta' => "consulta_id");

            if (!empty($detalles)) {
                $reemplazo = array('respuesta' => "detalles");

                return $respuesta = array_replace($respuesta, $reemplazo);
            }
            
            return $respuesta = array_replace($respuesta, $reemplazo);

        }else{
            $reemplazo = array('respuesta' => "mostrar_datos");

            return $respuesta = array_replace($respuesta, $reemplazo);
        }
    }
    function subirArchivo($archivo_datos){
        
        $directorio = "../archivos/";
        $archivo = $directorio . basename($archivo_datos["name"]);
        $archivo_subido = 1;
        $tipo_archivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        $imagen = getimagesize($archivo_datos["tmp_name"]);
        
        if (isset($logo)) {
            if ($imagen !== false) {
                $archivo_subido = 1;
            } else {
                $archivo_subido = 0;
            }
        }

        // Verificar si $archivo_subido es 0 debido a un error
        if ($archivo_subido == 0) {
            return $respuesta = array(
                'respuesta' => 'El archivo no se pudo subir',
            );
        // Si todo está bien, intentar subir el archivo
        } else {
            if (move_uploaded_file($archivo_datos["tmp_name"], $archivo)) {
                return $nombre_archivo = htmlspecialchars( basename( $archivo_datos["name"]) );
            } else {
                return $respuesta = array(
                    'respuesta' => 'Hubo un error al subir el archivo',
                );
            }
        }
    }
    /*function eliminarRegistrosMultiples($obj, $filas, $modulo){
        // Obtener los registros seleccionados
        $filas = $_POST['registros'];

        // Eliminar los registros seleccionados
        foreach ($filas as $fila) {
            $id = mysqli_real_escape_string($fila);

            // Ejecutar la consulta de eliminación
            //$query = "DELETE FROM tabla WHERE id = '$id'";
            $consultado = $obj->eliminar($id);
        }

        return $respuesta = array(
            'respuesta' => 'eliminados',
            'modulo' => $modulo,
            'ids' => $filas
        );
    }*/
?>
                