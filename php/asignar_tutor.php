
				<?php 
				require("mysql/conexion.php");
				class Asignar_tutor extends DBA{
					public function alta($id_asignar_tutor,$sid_padre,$sid_alumno) {
						$this->sentencia = "INSERT INTO asignar_tutor VALUES ($id_asignar_tutor,'$sid_padre','$sid_alumno');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM asignar_tutor;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_asignar_tutor,$sid_padre,$sid_alumno){
						$this->sentencia="UPDATE $id_asignar_tutor,'$sid_padre','$sid_alumno' FROM asignar_tutor;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_asignar_tutor,'$sid_padre','$sid_alumno' FROM asignar_tutor;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				