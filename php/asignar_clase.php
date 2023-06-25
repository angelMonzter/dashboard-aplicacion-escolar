
				<?php 
				require("mysql/conexion.php");
				class Asignar_clase extends DBA{
					public function alta($id_asignar_clase,$sid_materia,$sid_profesor) {
						$this->sentencia = "INSERT INTO asignar_clase VALUES ($id_asignar_clase,'$sid_materia','$sid_profesor');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM asignar_clase;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_asignar_clase,$sid_materia,$sid_profesor){
						$this->sentencia="UPDATE $id_asignar_clase,'$sid_materia','$sid_profesor' FROM asignar_clase;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_asignar_clase,'$sid_materia','$sid_profesor' FROM asignar_clase;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				