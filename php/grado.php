<?php
require("conexion.php");
class Grado extends DBA
{
    public function alta($id_grado, $sid_nivel, $nombre)
    {
        $this->sentencia = "INSERT INTO grado VALUES ('$id_grado','$sid_nivel','$nombre');";
        return $this->obtener_sentencia();
    }
    public function consulta()
    {
        $this->sentencia = "SELECT * FROM grado INNER JOIN nivel ON  grado.sid_nivel = nivel.id_nivel;";
        return $this->obtener_sentencia();
    }
    public function consultar_id($id)
    {
        $this->sentencia = "SELECT * FROM grado WHERE id_grado = '$id';";
        return $this->obtener_sentencia();
    }
    public function consulta_select()
    {
        $this->sentencia = "SELECT grado.id_grado AS id, grado.nombre AS nombre FROM `grado` INNER JOIN nivel ON grado.sid_nivel = nivel.id_nivel WHERE nivel.sid_instituto = '79556';";
        return $this->obtener_sentencia();
    }
    public function modificar($sid_nivel, $nombre, $id)
    {
        $this->sentencia = "UPDATE grado SET sid_nivel = '$sid_nivel', nombre = '$nombre' WHERE id_grado = '$id';";
        return $this->ejecutar_sentencia();
    }
    public function eliminar($id)
    {
        $this->sentencia = "DELETE FROM grado WHERE id_grado = '$id'";
        return $this->ejecutar_sentencia();
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

    $obj = new Grado();

    if ($data['accion'] === 'insertar') {

        $id = $datos_tabla['id'];

        $nombre = $datos_tabla['nombre_grado'];
        $sid_nivel = $datos_tabla['sid_nivel'];

        if (empty($id)) {

            $id = $obj->id(5);

            $resultado = $obj->alta($id, $sid_nivel, $nombre);

            $respuesta = array(
                'respuesta' => 'alta',
                'id' => $id,
                'resultado' => $resultado,
                'modulo' => 'grados',
            );
        } else {

            $resultado = $obj->modificar($sid_nivel, $nombre, $id);

            $respuesta = array(
                'respuesta' => 'modificacion',
                'id' => $id,
                'resultado' => $resultado,
                'modulo' => 'grados',
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

        $respuesta = consultarFilas($id, $obj, 'id_grado', 'grados', '');
        // include_once 'nivel.php';
        // $objeto_nivel = new Nivel();

        // $respuesta = consultarfilas($id, $objeto_nivel, 'id_nivel', 'grados', '');
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