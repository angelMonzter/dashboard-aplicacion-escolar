<?php 
require("conexion.php");
class Administrador extends DBA{
	public function alta($id_admin,$nombre,$apellido,$correo,$contrasena,$privilegios) {
		$this->sentencia = "INSERT INTO administrador VALUES ('$id_admin','$nombre','$apellido','$correo','$contrasena','$privilegios');";
		return $this->ejecutar_sentencia();
	}
	public function consulta() {
		$this->sentencia = "SELECT * FROM administrador;";
		return $this->obtener_sentencia();
	}
	public function consultar_id($id) {
		$this->sentencia = "SELECT * FROM administrador WHERE id_admin = '$id';";
		return $this->obtener_sentencia();
	}
	public function consulta_correo($correo_input) {
        $this->sentencia = "SELECT * FROM administrador WHERE correo = '$correo_input'";
        return $this->obtener_sentencia();
    }
	public function modificar($nombre,$apellido,$correo,$contrasena,$privilegios,$id_admin){
		$this->sentencia="UPDATE administrador SET nombre = '$nombre',apellido = '$apellido',correo = '$correo',contrasena = '$contrasena',privilegios = '$privilegios' WHERE id_admin = '$id_admin';";  
		return $this->ejecutar_sentencia();
	}
	public function modificar_password($contrasena,$correo){
        $this->sentencia="UPDATE administrador SET contrasena = '$contrasena' WHERE correo = '$correo';";
        return $this->ejecutar_sentencia();
    }
	public function eliminar($id){
		$this->sentencia="DELETE FROM administrador WHERE id_admin = '$id';";
		return $this->ejecutar_sentencia();
	}
	public function id($value){
		return $this->generator($value);
	}
}

 // Comprobar si el método es POST
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Recuperar los datos enviados en la solicitud
	$data = json_decode(file_get_contents("php://input"), true);

	// Validar los datos recibidos
	if ( !isset($data['accion']) || !isset($data['data']) ) {
		header('HTTP/1.1 400 Bad Request');
		echo 'Error: Campos obligatorios';
		exit;
	}
	
	$datos_tabla = $data['data'];

	$obj = new Administrador();
	
	if ($data['accion'] === 'insertar') {

		$id = $datos_tabla['id'];

		$nombre = $datos_tabla['nombre'];
		$apellido = $datos_tabla['apellidos'];
		$correo = $datos_tabla['email'];
		$privilegios = 'A';

		// Generar el hash de la contraseña
		$password = $datos_tabla['contrasena'];
        $contrasena = password_hash($password, PASSWORD_DEFAULT);
		
		if (empty($id)) {

			$id = $obj->id(5);

			$resultado = $obj->alta($id,$nombre,$apellido,$correo,$contrasena,$privilegios);
								
			$respuesta = array(
				'respuesta' => 'alta',
				'resultado' => $resultado,
				'modulo' => 'administrador',
			);
		}else{

			$resultado = $obj->modificar($nombre,$apellido,$correo,$contrasena,$privilegios,$id);

			$respuesta = array(
				'respuesta' => 'modificacion',
				'id' => $id,
				'resultado' => $resultado,
				'modulo' => 'administrador',
			);
		}
	}

	if ($data['accion'] === 'iniciar_sesion') {

        // Obtener los datos del formulario de inicio de sesión
        $username = $datos_tabla['username'];
        $password = $datos_tabla['password'];

        $resultado = $obj->consulta_correo($username);
        while ( $fila = $resultado->fetch_assoc() ){
            // Acceder a los datos
            $correo = $fila['correo'];
            $contrasena = $fila['contrasena'];
            $id_admin = $fila['id_admin'];
        }

        if ($username === $correo) {
            
            // Verificar si la contraseña ingresada coincide con el hash almacenado
            if ( password_verify($password, $contrasena) ) {

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id_admin'] = $id_admin;

                $respuesta = array(
                    'status' => 'success',
                );
            } else {
                $respuesta = array(
                    'status' => 'error',
                );
            }
        }else{
            $respuesta = array(
                'status' => 'error',
            );
        }
    }

    if ($data['accion'] === 'recuperar_contraseña') {

        // Obtener el correo 
        $correo_input = $datos_tabla['correo'];

        $resultado = $obj->consulta_correo($correo_input);
        while ( $fila = $resultado->fetch_assoc() ){
            // Acceder a los datos
            $correo = $fila['correo'];
        }

        if ($correo_input === $correo) {
            # generamos la contraseña
            $password = $obj->id(10);
            // Generar el hash de la contraseña
            $contrasena = password_hash($password, PASSWORD_DEFAULT);
            
            $resultado = $obj->modificar_password($contrasena,$correo);

            $respuesta = array(
                'respuesta' => 'modificacion_password',
                'modulo' => 'usuarios',
                'password' => $password,
                'correo' => $correo,
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    }

	require("funciones.php");

    
    if ($data['accion'] === 'eliminar') {
    	$id = $datos_tabla['id']; 

        $respuesta = eliminarFila($id, $obj);
    }

    if ($data['accion'] === 'consulta') {
    	$id = $datos_tabla['id']; 

        $respuesta = consultarFilas($id, $obj, 'id_admin', 'administrador', '');
    }

	// Devolver el libro recién creado como objeto JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
	exit;
}

// Si se realiza una solicitud con un método diferente a POST, devolver un error
header('HTTP/1.1 405 Method Not Allowed');
exit;			

?>
