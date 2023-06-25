<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// These must be at the top of your script, not inside a function
$password = $_POST['password'];
$correo = $_POST['correo'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.softwareincorp.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'password@softwareincorp.com';                     // SMTP username
    $mail->Password   = 'w#-A]OP^JI?y';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('password@softwareincorp.com', 'App Escolar');
    $mail->addAddress($correo);// Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'RECUPERAR CONTRASEÑA - APP ESCOLAR';
    $mail->Body    = '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>[Divers]</title>
      <style type="text/css">
        body {
         padding-top: 0 !important;
         padding-bottom: 0 !important;
         padding-top: 0 !important;
         padding-bottom: 0 !important;
         margin:0 !important;
         width: 100% !important;
         -webkit-text-size-adjust: 100% !important;
         -ms-text-size-adjust: 100% !important;
         -webkit-font-smoothing: antialiased !important;
         font-family: arial;
         background-color: white;
       }
      table[class="body"], td[class="cell"] 
      {
        width: 100% !important;
        height:auto !important; 
      }
      
      </style>
     
    </head>
    <body paddingwidth="0" paddingheight="0" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased; background-color: ;" offset="0" toppadding="0" leftpadding="0">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tbody>
        <tr>
          <td><br><br>
            <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="white" align="center" class="MainContainer" style="border: 5px solid white;">
              <tbody style="">
                <tr>
                  <td>
                    <div style="color: black; padding: 40px;">
                      <div style="background-color: #12284c; padding: 20px;" align="center">
                        <img src="https://i.postimg.cc/5yyxDkzQ/ICONE-logo-footer.png" alt="" width="170" height="60">
                      </div>

                      <div style="padding: 0px 40px 40px 40px;">
                        <h2 style="font-size: 40px; border-left: 4px solid black; padding-left: 5px; color:black;">Nueva contraseña</h2>

                        <p> Has recibido <span style="color: green;">tu nueva contraseña, </span> <br> esta puede ser modificada desde tu perfil</p>

                        <p><b>Contraseña: </b> <span style="padding-left: 20px;">'. $password .'</span></p>
                      </div>
                      
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

    </body>
    </html>';

    // Activo condificacción utf-8
    $mail->CharSet = 'UTF-8';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>