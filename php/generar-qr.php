<?php

// Genera un token aleatorio
$token = bin2hex(random_bytes(16));

#######falta guardar cada que se genere el codigo qr si este no es usado se tendria que borrar en un determinado tiempo para que no afecte el almacenamiento de la BD

// Almacena el token en la sesión del usuario
session_start();
$_SESSION['login_token'] = $token;

// Devuelve el token como respuesta
echo $token;
    // Comprobar si el método es POST
    /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recuperar los datos enviados en la solicitud
        $data = json_decode(file_get_contents("php://input"), true);

        // Validar los datos recibidos
        if ( !isset($data['accion']) || !isset($data['data']) ) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Error: Campos obligatorios';
            exit;
        }

        // Genera un token aleatorio
        $token = bin2hex(random_bytes(16));

        // Almacena el token en la sesión del usuario
        session_start();
        $_SESSION['login_token'] = $token;

        // Devuelve el token como respuesta
        $respuesta = array(
            'respuesta' => 'token_qr',
            'token' => $token,
        );

        // Devolver el libro recién creado como objeto JSON
        header('Content-Type: application/json');
        echo json_encode($respuesta);
        exit;
    }

    // Si se realiza una solicitud con un método diferente a POST, devolver un error
    header('HTTP/1.1 405 Method Not Allowed');
    exit; */          
 ?>