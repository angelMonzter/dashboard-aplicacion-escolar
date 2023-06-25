
				<?php 
				require("mysql/conexion.php");
				class Calificacion extends DBA{
					public function alta($id_calificacion,$sid_alumno,$sid_materia,$calificacion,$fecha_registro) {
						$this->sentencia = "INSERT INTO calificacion VALUES ($id_calificacion,'$sid_alumno','$sid_materia','$calificacion','$fecha_registro');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM calificacion;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_calificacion,$sid_alumno,$sid_materia,$calificacion,$fecha_registro){
						$this->sentencia="UPDATE $id_calificacion,'$sid_alumno','$sid_materia','$calificacion','$fecha_registro' FROM calificacion;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_calificacion,'$sid_alumno','$sid_materia','$calificacion','$fecha_registro' FROM calificacion;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				