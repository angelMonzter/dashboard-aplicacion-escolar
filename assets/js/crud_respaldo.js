import { 
  mensaje, 
  resetform,
  extraer_datos_form,
  insertData,
  eliminar,
  consulta,
} from './crud/funciones.js';

$('.editar_perfil').on('click', function (e) {
    e.preventDefault();

    let informacion_perfil = $('#informacion_perfil');

    let form_perfil =   `<div class="row align-items-center">
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Nombre</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Apellido</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic my-3">
                              <label class="input-group">Correo</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic my-3">
                              <label class="input-group">Rol</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                        </div>`;
    informacion_perfil.html( form_perfil ); 

    /*const datos_formulario = $('#usuarios').serializeArray();

    const datos_tabla = {
        nombre: datos_formulario[0].value,
        apellido: datos_formulario[1].value,
        correo: datos_formulario[2].value,
        contrasena: datos_formulario[3].value,
        sid_rol: datos_formulario[4].value,
        id: datos_formulario[5].value
    };


  insertData('insertar', datos_tabla, 'usuario.php');
    insertData(datos, 'usuario.php');*/
});

$('.editar_configuracion').on('click', function (e) {
    e.preventDefault();

    let confifuracion_escuela = $('#confifuracion_escuela');

    let configuracion =   `<div class="row align-items-center">
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Nombre</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Descripción</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic my-3">
                              <label class="input-group">Datos bancarios</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                        </div>`;
    confifuracion_escuela.html( configuracion ); 

    /*const datos_formulario = $('#usuarios').serializeArray();

    const datos_tabla = {
        nombre: datos_formulario[0].value,
        apellido: datos_formulario[1].value,
        correo: datos_formulario[2].value,
        contrasena: datos_formulario[3].value,
        sid_rol: datos_formulario[4].value,
        id: datos_formulario[5].value
    };


    insertData('insertar', datos_tabla, 'usuario.php');
    insertData(datos, 'usuario.php');*/
});

$('#guardar').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#usuarios').serializeArray();

  const datos_tabla = {
      nombre: datos_formulario[0].value,
      apellido: datos_formulario[1].value,
      correo: datos_formulario[2].value,
      contrasena: datos_formulario[3].value,
      sid_rol: datos_formulario[4].value,
      id: datos_formulario[5].value
  };

  insertData('insertar', datos_tabla, 'usuario.php');
});

$('#guardar_nivel').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#niveles').serializeArray();

  const datos_tabla = {
      nombre: datos_formulario[0].value,
      sid_institucion: 2,
      id: datos_formulario[1].value
  };

  insertData('insertar', datos_tabla, 'nivel.php');
});

$('#guardar_grupo').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#grupos').serializeArray();

  const datos_tabla = {
      nombre_grupo: datos_formulario[0].value,
      sid_grado: 2,
      id: datos_formulario[1].value
  };

  insertData('insertar', datos_tabla, 'grupo.php');
});

$('#guardar_grado').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#grados').serializeArray();

  const datos_tabla = {
      sid_nivel: datos_formulario[0].value,
      nombre_grado: datos_formulario[1].value,
      id: datos_formulario[2].value
  };

  insertData('insertar', datos_tabla, 'grado.php');
});

$('#guardar_padres').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#padres').serializeArray();

  const datos_tabla = {
      nombre_padre: datos_formulario[0].value,
      apellido_padre: datos_formulario[1].value,
      correo_padre: datos_formulario[2].value,
      id: datos_formulario[3].value
  };

  insertData('insertar', datos_tabla, 'padre.php');
});
$('#guardar_tipo_mensajes').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#tipo_mensajes').serializeArray();

  const datos_tabla = {
      sticker_tipo_mensaje: datos_formulario[0].value,
      nombre_tipo_mensaje: datos_formulario[1].value,
      id: datos_formulario[2].value
  };

  insertData('insertar', datos_tabla, 'tipo_mensaje.php');
});
$('#guardar_alumnos').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#estudiantes').serializeArray();

  const datos_tabla = {
      nombre_alumno: datos_formulario[0].value,
      apellidos_alumno: datos_formulario[1].value,
      matricula_alumno: datos_formulario[2].value,
      sexo_alumno: datos_formulario[3].value,
      sid_nivel: datos_formulario[4].value,
      sid_grado: datos_formulario[5].value,
      sid_grupo: datos_formulario[6].value,
      foto_alumno: datos_formulario[7].value,
      id: datos_formulario[8].value
  };

  insertData('insertar', datos_tabla, 'alumno.php');
});
$('#guardar_extracurriculares').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#extracurriculares').serializeArray();

  const datos_tabla = {
      nombre_extracurricular: datos_formulario[0].value,
      id: datos_formulario[1].value
  };

  insertData('insertar', datos_tabla, 'extracurricular.php');
});
$('#guardar_mensajes').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#mensajes').serializeArray();
  console.log(datos_formulario);

  const datos_tabla = {
      sid_tipo: datos_formulario[0].value,
      sid_estudiante: datos_formulario[1].value,
      asunto_mensaje: datos_formulario[2].value,
      fecha_envio_mensaje: datos_formulario[3].value,
      hora_envio_mensaje: datos_formulario[4].value,
      minutos_envio_mensaje: datos_formulario[5].value,
      repetir_mensaje: datos_formulario[6].value,
      periodo_mensaje: datos_formulario[7].value,
      fecha_fin_mensaje: datos_formulario[8].value,
      id: datos_formulario[9].value,
  };


  insertData('insertar', datos_tabla, 'mensaje.php');
});

$('#add_atributo').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#atributo').serializeArray();

  const datos_tabla = {
    icono: datos_formulario[0].value,
    nombre_atributo: datos_formulario[1].value,
    valor_atributo: datos_formulario[2].value,
    id: datos_formulario[3].value
  };

  insertData('insertar', datos_tabla, 'atributo.php');
});

$('#guardar_pago').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#pago').serializeArray();

  const datos_tabla = {
    matricula: datos_formulario[0].value,
    modo: datos_formulario[1].value,
    concepto: datos_formulario[2].value,
    monto: datos_formulario[3].value,
    penalidad: datos_formulario[4].value,
    status: datos_formulario[5].value,
    id: datos_formulario[6].value,

  };

  insertData('insertar', datos_tabla, 'pago.php');
});

$('#guardar_scanner').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#scanner').serializeArray();

  const datos_tabla = {
    nombre_scanner: datos_formulario[0].value,
    app_scanner: datos_formulario[1].value,
    correo_scanner: datos_formulario[2].value,
    user_scanner: datos_formulario[3].value,
    ctr_scanner: datos_formulario[4].value,
    id: datos_formulario[5].value,
  };

  insertData('insertar', datos_tabla, 'scanner.php');
});

$('#guardar_evento').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#evento').serializeArray();

  const datos_tabla = {
    nombre_evento: datos_formulario[0].value,
    fecha_evento: datos_formulario[1].value,
    todos: datos_formulario[2].value,
    nivel_evento: datos_formulario[3].value,
    grado_evento: datos_formulario[4].value,
    grupo_evento: datos_formulario[5].value,
    id: datos_formulario[6].value,
  };

  insertData('insertar', datos_tabla, 'evento.php');
});

$('#guardar_materia').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#materia').serializeArray();

  const datos_tabla = {
    nombre: datos_formulario[0].value,
    grupo: datos_formulario[1].value,
    id: datos_formulario[2].value,
  };

  insertData('insertar', datos_tabla, 'materia.php');
});

$('#guardar_asignar_materia').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#asignar_materia').serializeArray();

  const datos_tabla = {
    profesor: datos_formulario[0].value,
    materia: datos_formulario[1].value,
    nivel: datos_formulario[2].value,
    grado: datos_formulario[3].value,
    grupo: datos_formulario[4].value,
    id: datos_formulario[5].value,
  };

  insertData('insertar', datos_tabla, 'asignar_materia.php');
});

$('#tabla_usuarios').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');

    eliminar(id_eliminar, 'usuario.php');
});

$('#tabla_niveles').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');
    
    eliminar(id_eliminar, 'nivel.php');
});

$('#tabla_grupos').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');

    eliminar(id_eliminar, 'grupo.php');
});
$('#tabla_grados').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');

    eliminar(id_eliminar, 'grado.php');
});
$('#tabla_padres').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');

    eliminar(id_eliminar, 'padre.php');
});

$('#tabla_tipo_mensajes').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');
    
    eliminar(id_eliminar, 'tipo_mensaje.php');
});

$('#tabla_estudiantes').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');
    
    eliminar(id_eliminar, 'alumno.php');
});

$('#tabla_extracurriculares').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');
    
    eliminar(id_eliminar, 'extracurricular.php');
});

$('#tabla_mensajes').on('click', '.eliminar_fila', function (e) {
    e.preventDefault();

    const id_eliminar = $(this).attr('data-id');
    
    eliminar(id_eliminar, 'mensaje.php');
});

$('#tabla_atributo').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'atributo.php');
});

$('#tabla_pagos').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'pago.php');
});
$('#tabla_scanner').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'scanner.php');
});
$('#tabla_materia').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'materia.php');
});

$('#tabla_asignar_materia').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'asignar_materia.php');
});

//MODIFICAR

$('#tabla_usuarios').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');
    
    consulta('#tabla_usuarios', id_modificar);
});

$('#tabla_niveles').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_niveles', id_modificar);
});

$('#tabla_grupos').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_grupos', id_modificar);
});

$('#tabla_grados').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_grados', id_modificar);
});

$('#tabla_padres').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_padres', id_modificar);
});

$('#tabla_tipo_mensajes').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_tipo_mensajes', id_modificar);
});

$('#tabla_estudiantes').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_estudiantes', id_modificar);
});

$('#tabla_extracurriculares').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');

    consulta('#tabla_extracurriculares', id_modificar);
});
$('#tabla_atributo').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');

  consulta('#tabla_atributo', id_modificar);
});

$('#tabla_pagos').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');

  consulta('#tabla_pagos', id_modificar);
});

$('#tabla_scanner').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');

  consulta('#tabla_scanner', id_modificar);
});

$('#tabla_materia').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');

  consulta('#tabla_materia', id_modificar);
});

$('#tabla_asignar_materia').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');
 
  consulta('#tabla_asignar_materia', id_modificar);
});

$('.iniciar_sesion').on('click', function(e) {
    e.preventDefault();
    
    var datos_formulario = $('#datos_sesion').serializeArray();

    const datos_tabla = {
        username: datos_formulario[0].value,
        password: datos_formulario[1].value,
    };

    const datos = {
        accion: 'iniciar_sesion',
        data: datos_tabla,
    }

    $.ajax({
      url: 'http://localhost/dashboard-app-escolar/php/usuario.php', // URL de tu API
      method: 'POST', // Método HTTP a utilizar
      data: JSON.stringify(datos),
      contentType: 'application/json',
      success: function(response) {
        // Se ejecuta cuando la petición se completa exitosamente
        console.log(response);

        const { status } = response;

        if (status == 'success') {
            mensaje('Correcto', 'success');

            setTimeout(function() {
                window.location.href = 'pages/dashboard.php';
            }, 2000);
        }else{
            mensaje('Usuario o contraseña incorrectos', 'warning');
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Se ejecuta cuando hay un error en la petición
        console.log(errorThrown);
      }
    });
});

$('.recuperar_password').on('click', function(e) {
    e.preventDefault();
    
    var datos_formulario = $('#recuperar_password').serializeArray();

    const datos_tabla = {
        correo: datos_formulario[0].value,
    };

    const datos = {
        accion: 'recuperar_contraseña',
        data: datos_tabla,
    }

    $.ajax({
      url: 'http://localhost/dashboard-app-escolar/php/usuario.php', // URL de tu API
      method: 'POST', // Método HTTP a utilizar
      data: JSON.stringify(datos),
      contentType: 'application/json',
      success: function(response) {
        // Se ejecuta cuando la petición se completa exitosamente
        console.log(response);

        const { respuesta, password, correo } = response;

        if (respuesta == 'modificacion_password') {
          $.ajax({
                type: "POST",
                url: 'php/enviar_password.php',
                data:{
                  correo,
                  password 
                },
                success: function (data){
                  console.log(data);
                    $('#recuperar_password')[0].reset();
                    mensaje('Contraseña enviada', 'success');
                }
            });
            return false;
        }else{
            mensaje('El correo no existe', 'warning');
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Se ejecuta cuando hay un error en la petición
        console.log(errorThrown);
      }
    });
});

function eliminarRegistrosMultiple() {
    // Obtener los registros seleccionados
    var registrosSeleccionados = [];
    $('#tablaRegistros input[type="checkbox"]:checked').each(function() {
        registrosSeleccionados.push($(this).val());
    });

    // Realizar una petición AJAX para eliminar los registros seleccionados
    $.ajax({
        url: 'eliminar_registros.php',
        type: 'POST',
        data: { registros: registrosSeleccionados },
        success: function() {
            // Recargar los registros después de la eliminación
            cargarRegistros();
        }
    });
}

/*let qrContainer;
function generarQR(qrContainer) {
  
  // Genera el código QR
  const qrCode = new QRCode(qrContainer, {
    width: 200,
    height: 200
  });

  obtenerToken(qrCode);
}

function obtenerToken(qrCode) {
  // Llama al backend PHP para obtener el token
  fetch('http://localhost/dashboard-app-escolar/php/generar-qr.php')
    .then(response => response.text())
    .then(token => qrCode.makeCode(token));
}*/

// Verifica el token escaneado por el usuario
/*function verificarToken(tokenEscaneado) {
  fetch('http://localhost/dashboard-app-escolar/php/login_status_qr.php?token=' + tokenEscaneado)
    .then(response => response.text())
    .then(result => {
      if (result === 'success') {
        alert("Inicio de sesión exitoso");
      } else {
        alert("Token inválido. Inténtalo de nuevo.");
      }
    });
}*/

/*
function obtenerTokenCamara() {
  // Verificar si el navegador admite el acceso a la cámara
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      // Obtener acceso a la cámara
      navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
      .then(function(stream) {
          // Mostrar el video en la página
          let video = document.getElementById('video');
          video.srcObject = stream;
          video.play();

          // Capturar fotograma del video y analizar el código QR
          let canvas = document.getElementById('canvas');
          let context = canvas.getContext('2d');
/*
          setInterval(function() {
              /*context.drawImage(video, 0, 0, 320, 240);
              const imageData = canvas.toDataURL('image/png');

              // Enviar los datos de la imagen al servidor para el análisis del código QR

              $.ajax({
                  url: 'http://localhost/dashboard-app-escolar/php/login_status_qr.php',
                  method: 'POST',
                  dataType: 'json',
                  data: {

                    #####agregar
                    const datos = {
        accion: 'recuperar_contraseña',
        data: datos_tabla,
    } 
                      imageData: imageData
                  },
                  success: function(response) {
                      if (response.status === 'success') {
                          // Redireccionar a la página de inicio después de iniciar sesión
                          window.location.href = 'dashboard.php';
                      } else {
                          $('#qr-data').html('Escaneando código QR...');
                      }
                  },
                  error: function() {
                      $('#qr-data').html('Error al enviar los datos de la imagen al servidor.');
                  }
              });*/
          /*}, 2000);
      })
      .catch(function(error) {
          $('#qr-data').html('No se pudo acceder a la cámara: ' + error);
      });
  } else {
      $('#qr-data').html('El navegador no admite el acceso a la cámara.');
  }
}
*/
$( document ).ready(function() {

    consulta('#tabla_usuarios', '');
    consulta('#tabla_niveles', '');
    consulta('#tabla_grupos', '');
    consulta('#tabla_grados', '');
    consulta('#tabla_padres', '');
    consulta('#tabla_tipo_mensajes', '');
    consulta('#tabla_estudiantes', '');
    consulta('#tabla_extracurriculares', '');
    consulta('#tabla_mensajes', '');
    consulta('#tabla_atributo', '');
    consulta('#tabla_pagos', '');
    consulta('#tabla_scanner', '');
    consulta('#tabla_materia', '');
    consulta('#tabla_asignar_materia', '');
    
    
    //qrContainer = document.getElementById("qr-container");
    //generarQR(qrContainer);
    //obtenerTokenCamara();

    // Escucha el evento de escaneo de código QR
    /*qrContainer.addEventListener('click', function() {
      //aqui escaneamos el codigo qr con el celular en ves de utliziar el PROMT
      const tokenEscaneado = prompt("Escanea el código QR con tu dispositivo móvil");
      verificarToken(tokenEscaneado);
    });*/

});


