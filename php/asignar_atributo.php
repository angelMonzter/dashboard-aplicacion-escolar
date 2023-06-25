
				<?php 
				require("mysql/conexion.php");
				class Asignar_atributo extends DBA{
					public function alta($id_asignar_atributo,$sid_atributo,$sid_alumno,$fecha_registro) {
						$this->sentencia = "INSERT INTO asignar_atributo VALUES ($id_asignar_atributo,'$sid_atributo','$sid_alumno','$fecha_registro');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM asignar_atributo;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_asignar_atributo,$sid_atributo,$sid_alumno,$fecha_registro){
						$this->sentencia="UPDATE $id_asignar_atributo,'$sid_atributo','$sid_alumno','$fecha_registro' FROM asignar_atributo;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_asignar_atributo,'$sid_atributo','$sid_alumno','$fecha_registro' FROM asignar_atributo;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				