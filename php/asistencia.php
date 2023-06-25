
				<?php 
				require("mysql/conexion.php");
				class Asistencia extends DBA{
					public function alta($id_asistencia,$sid_alumno,$fecha_ingreso,$hora_entrada,$hora_salida) {
						$this->sentencia = "INSERT INTO asistencia VALUES ($id_asistencia,'$sid_alumno','$fecha_ingreso','$hora_entrada','$hora_salida');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM asistencia;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_asistencia,$sid_alumno,$fecha_ingreso,$hora_entrada,$hora_salida){
						$this->sentencia="UPDATE $id_asistencia,'$sid_alumno','$fecha_ingreso','$hora_entrada','$hora_salida' FROM asistencia;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_asistencia,'$sid_alumno','$fecha_ingreso','$hora_entrada','$hora_salida' FROM asistencia;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				