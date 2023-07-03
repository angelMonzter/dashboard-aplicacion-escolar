<?php
	abstract class DBA{
		private static $host= 'localhost';
		private static $usuario= 'root';
		private static $pass= '';
		protected $base='app_dashboard_escolar';
		protected $sentencia;
		private $conexion;

		private function abrir_conexion(){
			$this->conexion= new mysqli(self::$host, self::$usuario,
				self::$pass, $this->base);
		}
		private function cerrar_conexion(){
			$this->conexion->close();
		}

		protected function ejecutar_sentencia(){
			$this->abrir_conexion();
			$this->conexion->query($this->sentencia);
		}

		protected function obtener_sentencia(){
			$this->abrir_conexion();
			$result = $this->conexion->query($this->sentencia);
			return $result;
		}

		protected function generator($lenth) {
		  $number = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "n", "m", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

		  for ($i = 0; $i < $lenth; $i++) {
		            $rand_value = rand(0, 34);
		            $rand_number = $number["$rand_value"];

		        if (empty($con)) {
		          $con = $rand_number;
		        } else {
		      $con = "$con" . "$rand_number";
		    }
		  }
		  return $con;
		}
	}
?>
	    			