<?php
session_start();
require_once '../vendor/tarfin-labs/zbar-php/src/ZBar.php';

// Comprobar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Recuperar los datos enviados en la solicitud
  $data = json_decode(file_get_contents("php://input"), true);

  // Validar los datos recibidos
  if (!isset($data['accion']) || !isset($data['data'])) {
    header('HTTP/1.1 400 Bad Request');
    echo 'Error: Campos obligatorios';
    exit;
  }

  $datos_tabla = $data['data'];

  if ($data['accion'] === 'iniciar_sesion_qr') {
    
    $imageData = $datos_tabla['imageData'];

    // Decodificar la imagen base64
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $imageData = base64_decode($imageData);

    // Crea una instancia del objeto ZBarImageScanner
    //$scanner = new ZBarImageScanner();
    //$scanner = new ZBarScanner();
    //$zbar = new \TarfinLabs\ZbarPhp\Zbar($imagePath);
    //$code = $zbar->scan();

    // Guardar la imagen en un archivo temporal
    //$tempFilename = 'temp.png';
    //$imageData = file_put_contents($tempFilename, $imageData);
//
//    //$grayImageData = imagecreatefromstring($imageData);
    //imagefilter($grayImageData, IMG_FILTER_GRAYSCALE);

    //$scanner = new \TarfinLabs\ZbarPhp\Zbar($tempFilename);
    //$barcode = $zbar->scan();

    $respuesta = array(
        'status' => 'success',
        'status2' => $tempFilename,
    );
    // Convierte la imagen en escala de grises para un mejor rendimiento de escaneo
    /*

    // Configura el escáner para buscar códigos QR
    $scanner->setConfig(0, ZBAR_CFG_ENABLE, 1);
    $scanner->setConfig(ZBAR_QRCODE, ZBAR_CFG_ENABLE, 1);

    // Analizar el código QR utilizando una biblioteca de terceros como "ZBar"
    $barcode = $scanner->scan($grayImageData);*/

    // Verificar el código QR y realizar la lógica de inicio de sesión
    // Aquí deberías implementar tu propia lógica de autenticación y autorización
    // Puedes comparar el código QR recibido con una base de datos o un conjunto predefinido de códigos QR válidos

    //en ves de obtener el de sesion se hace una consulta a base de datos para obtener este valor y comparar
    /*$token_guardado = $_SESSION['login_token'];

    if ($barcode === $token_guardado) {
        // Código QR válido, iniciar sesión correctamente
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['usuario'] = 'a perro';

        $respuesta = array(
            'status' => 'success'
        );
    } else {
        // Código QR no válido
        $respuesta = array(
            'status' => 'error'
        );
    }
*/
    // Eliminar el archivo temporal
    unlink($tempFilename);
       
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
