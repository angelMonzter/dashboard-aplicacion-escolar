
				<?php 
				require("mysql/conexion.php");
				class Alumno_extracurricular extends DBA{
					public function alta($id_alumnoextra,$sid_extracurricular,$sid_alumno,$fecha_ingreso) {
						$this->sentencia = "INSERT INTO alumno_extracurricular VALUES ($id_alumnoextra,'$sid_extracurricular','$sid_alumno','$fecha_ingreso');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM alumno_extracurricular;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_alumnoextra,$sid_extracurricular,$sid_alumno,$fecha_ingreso){
						$this->sentencia="UPDATE $id_alumnoextra,'$sid_extracurricular','$sid_alumno','$fecha_ingreso' FROM alumno_extracurricular;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_alumnoextra,'$sid_extracurricular','$sid_alumno','$fecha_ingreso' FROM alumno_extracurricular;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				