<?php
require("conexion.php");
class Sids extends DBA
{
    public function consulta_rol($id)
    {
        $this->sentencia = "SELECT id_rol, nombre FROM `rol` WHERE sid_instituto = '$id'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }
    public function consulta_nivel()
    {
        $this->sentencia = "SELECT id_nivel, nombre  FROM nivel";
        return $this->obtener_sentencia();
    }
    public function consulta_grado()
    {
        $this->sentencia = "SELECT id_grado, nombre_grado FROM `grado` INNER JOIN nivel on grado.sid_nivel = nivel.id_nivel WHERE nivel.sid_instituto='79556'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }
    public function consulta_grupo()
    {
        $this->sentencia = "SELECT id_grupo, nombre_grupo FROM `grupo` WHERE sid_grado='bs7ig'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }

    public function consulta_tipo_mensaje()
    {
        $this->sentencia = "SELECT id_tipo_mensaje, nombre AS nombre_tipo FROM `tipo_mensaje` WHERE sid_instituto='1'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }

    public function consulta_estudiante()
    {
        $this->sentencia = "SELECT id_alumno, nombre AS nombre_alumno, apellido, matricula FROM `alumno` WHERE sid_instituto='79556'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }

    public function consulta_profesor()
    {
        $this->sentencia = "SELECT id_profesor, nombre AS nombre_profesor FROM `profesor` WHERE sid_instituto='10336'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }

    public function consulta_materia()
    {
        $this->sentencia = "SELECT id_materia, nombre AS nombre_materia FROM `materia` WHERE sid_instituto='79556'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }

    public function consulta_atributo()
    {
        $this->sentencia = "SELECT id_atributo, nombre AS nombre_atributo FROM `atributo` WHERE sid_instituto='79556'";
        //cambiar id de instituto
        return $this->obtener_sentencia();
    }


}


// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $obj = new Sids();

    $id = '84657'//$_POST['id'];

    // Consulta a la base de datos rol
    $rol = $obj->consulta_rol($id);

    if ($rol->num_rows > 0) {
        while ($row = $rol->fetch_assoc()) {
            $datos_rol[] = $row;
        }
    }

    // Consulta a la base de datos niveles
    $nivel = $obj->consulta_nivel();

    $datos_nivel = array();
    if ($nivel->num_rows > 0) {
        while ($row = $nivel->fetch_assoc()) {
            $datos_nivel[] = $row;
        }
    }

    // Consulta a la base de datos grados
    $grado = $obj->consulta_grado();

    $datos_grado = array();
    if ($grado->num_rows > 0) {
        while ($row = $grado->fetch_assoc()) {
            $datos_grado[] = $row;
        }
    }

    $grupo = $obj->consulta_grupo();

    $datos_grupo = array();
    if ($grupo->num_rows > 0) {
        while ($row = $grupo->fetch_assoc()) {
            $datos_grupo[] = $row;
        }
    }


    $tipo_mensaje = $obj->consulta_tipo_mensaje();

    $datos_mensaje = array();
    if ($tipo_mensaje->num_rows > 0) {
        while ($row = $tipo_mensaje->fetch_assoc()) {
            $datos_mensaje[] = $row;
        }
    }

    $estudiante = $obj->consulta_estudiante();

    $datos_estudiante = array();
    if ($estudiante->num_rows > 0) {
        while ($row = $estudiante->fetch_assoc()) {
            $datos_estudiante[] = $row;
        }
    }

    $profesor = $obj->consulta_profesor();

    $datos_profesor = array();
    if ($profesor->num_rows > 0) {
        while ($row = $profesor->fetch_assoc()) {
            $datos_profesor[] = $row;
        }
    }

    $materia = $obj->consulta_materia();

    $datos_materia = array();
    if ($materia->num_rows > 0) {
        while ($row = $materia->fetch_assoc()) {
            $datos_materia[] = $row;
        }
    }

    $atributo = $obj->consulta_atributo();

    $datos_atributo = array();
    if ($atributo->num_rows > 0) {
        while ($row = $atributo->fetch_assoc()) {
            $datos_atributo[] = $row;
        }
    }

    $respuestas = array(
        "nivel" => $datos_nivel,
        "grado" => $datos_grado,
        "grupo" => $datos_grupo,
        "rol" => $datos_rol,
        "tipo_mensaje" => $datos_mensaje,
        "estudiante" => $datos_estudiante,
        "profesor" => $datos_profesor,
        "materia" => $datos_materia,
        "atributo" => $datos_atributo,


    );

    // Devolver los resultados como JSON
    echo json_encode($respuestas);
}



?>