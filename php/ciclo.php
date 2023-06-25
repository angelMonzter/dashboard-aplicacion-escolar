
				<?php 
				require("mysql/conexion.php");
				class Ciclo extends DBA{
					public function alta($id_ciclo,$nombre) {
						$this->sentencia = "INSERT INTO ciclo VALUES ($id_ciclo,'$nombre');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM ciclo;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_ciclo,$nombre){
						$this->sentencia="UPDATE $id_ciclo,'$nombre' FROM ciclo;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_ciclo,'$nombre' FROM ciclo;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				