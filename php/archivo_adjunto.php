
				<?php 
				require("mysql/conexion.php");
				class Archivo_adjunto extends DBA{
					public function alta($id_archivo,$url) {
						$this->sentencia = "INSERT INTO archivo_adjunto VALUES ($id_archivo,'$url');";
						$this->ejecutar_sentencia();
					}
					public function consulta() {
						$this->sentencia = "SELECT * FROM archivo_adjunto;";
						return $this->obtener_sentencia();
					}
					public function modificar($id_archivo,$url){
						$this->sentencia="UPDATE $id_archivo,'$url' FROM archivo_adjunto;";
						$this->ejecutar_sentencia();
					}
					public function eliminar(){
						$this->sentencia="DELETE $id_archivo,'$url' FROM archivo_adjunto;";
						$this->ejecutar_sentencia();
					}
				}
				?>
				