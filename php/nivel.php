<?php
require("conexion.php");
class Nivel extends DBA
{
    public function alta($id_nivel, $sid_institucion, $nombre)
    {
        $this->sentencia = "INSERT INTO nivel VALUES ('$id_nivel','$sid_institucion','$nombre');";
        return $this->obtener_sentencia();
    }
    public function consulta()
    {
        $this->sentencia = "SELECT * FROM nivel WHERE sid_instituto = '79556';";
        return $this->obtener_sentencia();
    }
    public function consultar_id($id)
    {
        $this->sentencia = "SELECT * FROM nivel WHERE id_nivel = $id;";
        return $this->obtener_sentencia();
    }
    public function consulta_select()
    {
        $this->sentencia = "SELECT id_nivel AS id, nombre FROM nivel WHERE sid_instituto = '79556';";
        return $this->obtener_sentencia();
    }
    public function modificar($nombre, $id)
    {
        $this->sentencia = "UPDATE nivel SET nombre = '$nombre' WHERE id_nivel = $id;";
        $this->ejecutar_sentencia();
    }
    public function eliminar($id)
    {
        $this->sentencia = "DELETE FROM nivel WHERE id_nivel = $id";
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

    $obj = new Nivel();

    if ($data['accion'] === 'insertar') {

        $id = $datos_tabla['id'];

        $nombre = $datos_tabla['nombre'];
        $sid_institucion = $datos_tabla['sid_institucion'];

        if (empty($id)) {

            $id = $obj->id(5);

            $resultado = $obj->alta($id, $sid_institucion, $nombre);

            $respuesta = array(
                'respuesta' => 'alta',
                'id' => $id,
                'resultado' => $resultado,
                'modulo' => 'niveles',
            );
        } else {

            $resultado = $obj->modificar($nombre, $id);

            $respuesta = array(
                'respuesta' => 'modificacion',
                'id' => $id,
                'resultado' => $resultado,
                'modulo' => 'niveles',
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

        $respuesta = consultarFilas($id, $obj, 'id_nivel', 'niveles', '');
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