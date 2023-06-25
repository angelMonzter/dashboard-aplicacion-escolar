<?php 
require("mysql/conexion.php");
class Tareas extends DBA{
	public function alta($id_tareas,$sid_alumno,$sid_materia,$sid_profesor,$archivo,$link) {
		$this->sentencia = "INSERT INTO tareas VALUES ($id_tareas,'$sid_alumno','$sid_materia','$sid_profesor','$archivo','$link');";
		$this->ejecutar_sentencia();
	}
	public function consulta() {
		$this->sentencia = "SELECT * FROM tareas;";
		return $this->obtener_sentencia();
	}
	public function modificar($id_tareas,$sid_alumno,$sid_materia,$sid_profesor,$archivo,$link){
		$this->sentencia="UPDATE $id_tareas,'$sid_alumno','$sid_materia','$sid_profesor','$archivo','$link' FROM tareas;";
		$this->ejecutar_sentencia();
	}
	public function eliminar(){
		$this->sentencia="DELETE $id_tareas,'$sid_alumno','$sid_materia','$sid_profesor','$archivo','$link' FROM tareas;";
		$this->ejecutar_sentencia();
	}
}
?>
				