
				<?php 
				require("mysql/conexion.php");
				class Profesor extends DBA{
					public function alta($id_profesor,$nombre,$apellido) {
						$this->sentencia = "INSERT INTO profesor VALUES ($id_profesor,'$nombre','$apellido');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM profesor;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_profesor,$nombre,$apellido){
						$this->sentencia="UPDATE $id_profesor,'$nombre','$apellido' FROM profesor;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_profesor,'$nombre','$apellido' FROM profesor;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				