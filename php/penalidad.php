
				<?php 
				require("mysql/conexion.php");
				class Penalidad extends DBA{
					public function alta($id_penalidad,$porcentaje,$sid_instituto) {
						$this->sentencia = "INSERT INTO penalidad VALUES ($id_penalidad,'$porcentaje','$sid_instituto');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM penalidad;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_penalidad,$porcentaje,$sid_instituto){
						$this->sentencia="UPDATE $id_penalidad,'$porcentaje','$sid_instituto' FROM penalidad;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_penalidad,'$porcentaje','$sid_instituto' FROM penalidad;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				