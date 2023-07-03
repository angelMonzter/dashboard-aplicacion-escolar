import { 
  mensaje, 
  resetform,
  extraer_datos_form,
  insertData,
  eliminar,
  consulta,
  insertDataFiles,
  consultaObj,
  eliminarObj,
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
    let informacion_perfil = $('#informacion_perfil');
    let informacion_perfil = $('#informacion_perfil');

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

let sid_instituto;

$('.botones_configuracion').on('click', '.editar_configuracion', function (e) {
    e.preventDefault();

    sid_instituto = $("#configuracion_escuela").attr('instituto');
  
    let configuracion_escuela = $('#configuracion_escuela');

    let configuracion =   `<div class="row align-items-center">
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Nombre</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" name="nombre_instituto" id="nombre_instituto" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Descripción</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" name="descripcion_instituto" id="descripcion_instituto" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>`;

    configuracion_escuela.append( configuracion );

    $("#configuracion_escuela .list-group").css('display', 'none');

    consulta('#configuracion_escuela', sid_instituto, '');

    let boton_configuracion = `<a href="#!" class="btn bg-gradient-info mb-0 me-2 guardar_configuracion">Guardar configuración</a>`;
    let contenedor_boton_configuracion = $('.botones_configuracion');
    contenedor_boton_configuracion.html( boton_configuracion ); 
});

$('.botones_configuracion').on('click', '.guardar_configuracion', function (e) {
    e.preventDefault();

    let nombre_instituto = $('#nombre_instituto').val();
    let descripcion_instituto = $('#descripcion_instituto').val();

    const datos_tabla = {
        nombre: nombre_instituto,
        descripcion: descripcion_instituto,
        id: sid_instituto
    };

    insertData('insertar', datos_tabla, 'instituto.php');
});

$('#rol').submit(function(e) {
    e.preventDefault(); // Evita que se envíe el formulario de manera convencional

    let formData = new FormData(this); // Crea un objeto FormData con los datos del formulario
    formData.append("accion", "insertar");

    insertDataFiles(formData, "rol.php");
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

$('#mensajes').on('submit', function (e) {
  e.preventDefault();

  let formData = new FormData(this); // Crea un objeto FormData con los datos del formulario
  formData.append("accion", "insertar");

  insertDataFiles(formData, "mensaje.php");
});

$('#ciclos').on('submit', function (e) {
  e.preventDefault();

  let formData = new FormData(this); // Crea un objeto FormData con los datos del formulario
  formData.append("accion", "insertar");

  insertDataFiles(formData, "ciclo.php");
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
  setTimeout(function() {
      window.location.href = 'pages/usuarios.php';
  }, 2000);
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

$('#guardar_seguimiento').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#seguimiento').serializeArray();

  const datos_tabla = {
    atributo: datos_formulario[0].value,
    nombre: datos_formulario[1].value,
    sid_alumno: datos_formulario[2].value,
    id: datos_formulario[3].value,
  };
  console.log(datos_tabla);
  insertData('insertar', datos_tabla, 'seguimiento.php');
});

$('#guardar_extra_alumno').on('click', function (e) {
  e.preventDefault();

  const datos_formulario = $('#alumno_extracurricular').serializeArray();

  const datos_tabla = {
    extra_estudiante: datos_formulario[0].value,
    sid_extracurricular: datos_formulario[1].value,
    //id: datos_formulario[3].value,
  };
  //console.log(datos_formulario);
  insertData('insertar', datos_tabla, 'alumno_extracurricular.php');
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

$('#tabla_rol').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminarObj(id_eliminar, 'rol.php');
});

$('#tabla_ciclos').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminarObj(id_eliminar, 'ciclo.php');
});

$('#tabla_seguimientos').on('click', '.eliminar_fila', function (e) {
  e.preventDefault();

  const id_eliminar = $(this).attr('data-id');

  eliminar(id_eliminar, 'seguimiento.php');
});
//MODIFICAR

$('#tabla_usuarios').on('click', '.editar_fila', function (e) {
    e.preventDefault();

    const id_modificar = $(this).attr('data-id');
    
    consulta('#tabla_usuarios', id_modificar, '');
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

$('#tabla_rol').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');
 
  consultaObj('#tabla_rol', id_modificar, '');
});

$('#tabla_ciclos').on('click', '.editar_fila', function (e) {
  e.preventDefault();

  const id_modificar = $(this).attr('data-id');
 
  consultaObj('#tabla_ciclos', id_modificar, '');
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
                    mensaje('Nueva contraseña enviada', 'success');
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

function eliminarRegistrosMultiple(registrosSeleccionados, archivo) {

    const datos_tabla = {
        id: '',
        registros: registrosSeleccionados
    };

    const datos = {
        accion: 'eliminar_multiple',
        data: datos_tabla,
    }

    if (!archivo) {
        //notificacion
        //error
    }else{
        Swal.fire({
          title: '¿Esta seguro?',
          text: "Los cambios no podran revertise",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar'
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              url: 'http://localhost/dashboard-app-escolar/php/' + archivo, // URL de tu API
              method: 'POST', // Método HTTP a utilizar
              data: JSON.stringify(datos),
              contentType: 'application/json',
              success: function(response) {
                // Se ejecuta cuando la petición se completa exitosamente
                console.log(response);
                //jQuery('[data-id="' + response.id + '"]').parents()[1].remove()
              },
              error: function(jqXHR, textStatus, errorThrown) {
                // Se ejecuta cuando hay un error en la petición
                console.log(errorThrown);
              }
            });
            mensaje('Eliminado', 'success');
          }
        })
    }
}

let qrContainer;
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
}

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

function mostrarDetalles(id_datos){
  const tabla = jQuery('[data-id="' + id_datos + '"]').parents('div.card');
  //const tabla = jQuery('[data-id="' + id_datos + '"]').parents('div.card').css('display', 'none');
  let mostrar = $('.oculto');

  tabla.css('display', 'none');
  mostrar.css('display', 'block');

  let valor_cerrar = $('.mostrar_detalles').filter('a.btn-link').attr('data-id');
  if (!valor_cerrar) {
    $('.mostrar_detalles').filter('a.btn-link').attr('data-id', id_datos);
  }
}

function ocultarDetalles(id_datos){
  const tabla = jQuery('[data-id="' + id_datos + '"]').parents('div.card');
  //const tabla = jQuery('[data-id="' + id_datos + '"]').parents('div.card').css('display', 'none');
  let mostrar = $('.oculto');

  tabla.css('display', 'block');
  mostrar.css('display', 'none');
    let valor_cerrar = $('.mostrar_detalles').filter('a.btn-link').attr('data-id');
  if (valor_cerrar) {
    $('.mostrar_detalles').filter('a.btn-link').attr('data-id', '');
  }
}

$('#tabla_usuarios').on('click', '.mostrar_detalles', function (e) {
  e.preventDefault();

  const id_datos = $(this).attr('data-id');

  mostrarDetalles(id_datos);

  consulta('#tabla_usuarios', id_datos, 'detalles');
});

$('#tabla_estudiantes').on('click', '.mostrar_detalles', function (e) {
  e.preventDefault();

  const id_datos = $(this).attr('data-id');

  mostrarDetalles(id_datos);

  consulta('#tabla_estudiantes', id_datos, 'detalles');
});

$('#tabla_pagos').on('click', '.mostrar_detalles', function (e) {
  e.preventDefault();

  const id_datos = $(this).attr('data-id');

  mostrarDetalles(id_datos);

  consulta('#tabla_pagos', id_datos, 'detalles');
});

$('.mostrar_detalles').on('click', function (e) {
  e.preventDefault();

  const id_datos = $(this).attr('data-id');

  ocultarDetalles(id_datos);
});

//ELIMINAR MULTIPLES

let registrosSeleccionados = [];
$('.eliminar_fila_multiple').on('click', function (e) {
  e.preventDefault();

  eliminarRegistrosMultiple(registrosSeleccionados, 'padre.php');
});

//asignar roles
$('#tabla_rol').on('change', '.form-check-input', function (e) {
console.log('hola');
  //verificar primero si esta activo el privilegio
  let privilegio_activo = $(this).attr('activo');
console.log(privilegio_activo);
  
  let privilegio = $(this).val();
  let rol_id = $(this).attr('rol-id');
  let privilegio_valor = jQuery('[value="' + privilegio + '"]');

  if (privilegio_activo == 'no') {

    for (var i = 0; i < privilegio_valor.length; i++) {
      console.log(privilegio_valor[i].getAttribute('rol-id'));
      if (privilegio_valor[i].getAttribute('rol-id') == rol_id) {
        console.log(privilegio_valor.is(":checked"));
        if (privilegio_valor.is(":checked") == false) {
          let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
          formData.append("accion", "insertar");
          formData.append("sid_rol", rol_id);
          formData.append("nombre_privilegio", privilegio);
          formData.append("activo", "no");
          formData.append("id_modificar", "si");

          insertDataFiles(formData, "privilegios_rol.php");
          setTimeout(function() {
              window.location.href = 'pages/usuarios.php';
          }, 2000);

          console.log('modificamos activo a no');
        }else{
          let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
          formData.append("accion", "insertar");
          formData.append("sid_rol", rol_id);
          formData.append("nombre_privilegio", privilegio);
          formData.append("activo", "si");
          formData.append("id_modificar", "si");

          insertDataFiles(formData, "privilegios_rol.php");
          setTimeout(function() {
              window.location.href = 'pages/usuarios.php';
          }, 2000);

          console.log('paso, modificamos activo a si');
        }
      }
    }

  }else{
    for (var i = 0; i < privilegio_valor.length; i++) {
      console.log(privilegio_valor[i].getAttribute('rol-id'));
      if (privilegio_valor[i].getAttribute('rol-id') == rol_id) {
        console.log(privilegio_valor.is(":checked"));
        if (privilegio_valor.is(":checked") == true) {
          console.log('modificamos activo a si');
        }else{
          let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
          formData.append("accion", "insertar");
          formData.append("sid_rol", rol_id);
          formData.append("nombre_privilegio", privilegio);
          formData.append("activo", "no");
          formData.append("id_modificar", "si");

          insertDataFiles(formData, "privilegios_rol.php");
          setTimeout(function() {
              window.location.href = 'pages/usuarios.php';
          }, 2000);

          console.log('no paso, modificamos activo a no');
        }
      }
    }

  }

  /*if (!privilegio_activo) {
    //aqui damos de alta

    for (var i = 0; i < privilegio_valor.length; i++) {
      console.log(privilegio_valor[i].getAttribute('rol-id'));
      if (privilegio_valor[i].getAttribute('rol-id') == rol_id) {
        console.log(privilegio_valor.is(":checked"));
        console.log('paso, aqui damos de alta');

        let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
        formData.append("accion", "insertar");
        formData.append("sid_rol", rol_id);
        formData.append("nombre_privilegio", privilegio);
        formData.append("activo", "si");
        console.log(formData);

        //insertDataFiles(formData, "privilegio_rol.php");
      }
    }
  }else{
    
  }*/


    //console.log(rol_id);
  
  
  /*let rol_id = $(this).val();
  let check_activo = jQuery('[value="' + rol_id + '"]');
  let rol_activo = check_activo.is(":checked");
console.log(rol_id);
console.log(check_activo);
console.log(rol_activo);
  if (rol_activo == true) {
    //if ($(this.checked)){

        const id_check = $(this).attr('data-id');
        const value_check = $(this).val();
        const privilegio_activo = $(this).attr('activo');

        if (!privilegio_activo) {
          let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
          formData.append("accion", "insertar");
          formData.append("sid_rol", id_check);
          formData.append("nombre_privilegio", value_check);
          formData.append("check_activo", "si");
          console.log('inserta');

          insertDataFiles(formData, "privilegio_rol.php");
          //.form-switch .form-check-input:checked
        }else{
          console.log('solo se modifica a si');
        }

    //}
  }else{
    console.log('mandamos modificar el estado de si a no');
  }*/
});

function addClass() {
  $('#mensaje_estudiante').addClass('oculto');
  $('#mensaje_nivel').addClass('oculto');
  $('#mensaje_masivo').addClass('oculto');
  $('#mensaje_especifico').addClass('oculto');
  $('#mensaje_extracurricular').addClass('oculto');
}

$('#receptor').on('change', function (e) {
  e.preventDefault();

  const receptor = $(this).val();

  switch (parseInt(receptor)) {
    case 1:

      addClass();
      $('#mensaje_estudiante').removeClass('oculto');
      break;
    case 2:

      addClass();
      $('#mensaje_nivel').removeClass('oculto');
      break;
    case 3:

      addClass();
      $('#mensaje_masivo').removeClass('oculto');
      break;
    case 4:

      addClass();
      $('#mensaje_especifico').removeClass('oculto');
      break;
    case 5:

      addClass();
      $('#mensaje_extracurricular').removeClass('oculto');
      break;
    default:

      addClass();
      mensaje('Seleccione un receptor','warning');
  }

});

function accesoModulos() {

  /*switch (parseInt(receptor)) {
    case 1:

      addClass();
      $('#mensaje_estudiante').removeClass('oculto');
      break;
    case 2:

      addClass();
      $('#mensaje_nivel').removeClass('oculto');
      break;
    case 3:

      addClass();
      $('#mensaje_masivo').removeClass('oculto');
      break;
    case 4:

      addClass();
      $('#mensaje_especifico').removeClass('oculto');
      break;
    case 5:

      addClass();
      $('#mensaje_extracurricular').removeClass('oculto');
      break;
    default:

  }*/
}

$('#mas_archivo').on('click', function (e) {
  e.preventDefault();
  
  let grupo_input = $('.archivo_mensaje');

  if (grupo_input.length == 5) {
    mensaje('Solo puede subir 5 archivos por mensaje', 'warning');
  }else{
    let input = '<input type="file" class="form-control archivo_mensaje" aria-describedby="emailHelp" name="archivo[]" id="archivo" onfocus="focused(this)" onfocusout="defocused(this)">';

    $('.inputs_archivo').append(input);
  }

});

$('#menos_archivo').on('click', function (e) {
  e.preventDefault();
  
  let grupo_input = $('.archivo_mensaje');

  if (grupo_input.length == 1) {
    mensaje('Agrega otro', 'warning');
  }else{
    const numero_archivos = grupo_input.length - 1;
    grupo_input[numero_archivos].remove();
  }

});

$('#mas_url').on('click', function (e) {
  e.preventDefault();
  
  let grupo_input = $('.url_mensaje');

  if (grupo_input.length == 5) {
    mensaje('Solo puede subir 5 url por mensaje', 'warning');
  }else{
    let input = '<input type="text" class="form-control w-100 url_mensaje" name="url[]" id="url" aria-describedby="emailHelp">';

    $('.inputs_url').append(input);
  }

});

$('#menos_url').on('click', function (e) {
  e.preventDefault();
  
  let grupo_input = $('.url_mensaje');

  if (grupo_input.length == 1) {
    mensaje('Agrega otro', 'warning');
  }else{
    const numero_archivos = grupo_input.length - 1;
    grupo_input[numero_archivos].remove();
  }
});

$( document ).ready(function() {

    consulta('#tabla_usuarios', '','');
    consulta('#tabla_niveles', '','');
    consulta('#tabla_grupos', '','');
    consulta('#tabla_grados', '','');
    consulta('#tabla_padres', '','');
    consulta('#tabla_tipo_mensajes', '','');
    consulta('#tabla_estudiantes', '','');
    consulta('#tabla_extracurriculares', '','');
    consulta('#tabla_atributo', '','');
    consulta('#tabla_pagos', '','');
    consulta('#tabla_scanner', '','');
    consulta('#tabla_materia', '','');
    consulta('#tabla_asignar_materia', '','');
    consultaObj('#tabla_mensajes', '','');
    consultaObj('#tabla_rol', '','');
    consultaObj('#tabla_ciclos', '','');

    const sid_instituto = $("#configuracion_escuela").attr('instituto');
    const id_usuario = $("#informacion_perfil").attr('usuario');

    if (!sid_instituto) {
    }else{
      consulta('#configuracion_escuela', sid_instituto, 'detalles');
      console.log(sid_instituto);
    }

    if (!id_usuario) {
    }else{
      consulta('#informacion_perfil', id_usuario, 'detalles');
      console.log(id_usuario);
    }
    
    qrContainer = document.getElementById("qr-container");
    if (!qrContainer) {
    }else{
      generarQR(qrContainer);
    }
    //obtenerTokenCamara();

    // Escucha el evento de escaneo de código QR
    /*qrContainer.addEventListener('click', function() {
      //aqui escaneamos el codigo qr con el celular en ves de utliziar el PROMT
      const tokenEscaneado = prompt("Escanea el código QR con tu dispositivo móvil");
      verificarToken(tokenEscaneado);
    });*/

    $('#tabla_padres').on('change', '.check', function (e) {
      if ($(this.checked)){
          registrosSeleccionados.push($(this).val());
      }
    });

    //---------------------------------------------------------------

    function datos_select(id_select) {
      var id_tabla = $(id_select);

      $.each(response.id_tabla, function(index, item) {
        var option = $('<option>').text(item.nombre).val(item.id_nivel);
        id_tabla.append(option);
      });
    }

    let id_instituto = ('#sid_instituto');

    $.ajax({
      url: 'http://localhost/dashboard-app-escolar/php/sids.php',
      type: 'POST',
      data: {
        id: id_instituto,
      },
      dataType: 'json',
      success: function(response){

        datos_select('#sid_nivel');
        datos_select('#sid_grado');
        datos_select('#sid_grupo');
        datos_select('#sid_rol');
        datos_select('#sid_tipo');

        var estudiante = $('#sid_estudiante');
        var pago_alumno = $('#pago_matricula');
        var calendario = $('#nivel_evento');
        var calendario_grado = $('#grado_evento');
        var calendario_grupo = $('#grupo_evento');
        var profesor = $('#asignar_profesor');

        $.each(response.profesor, function(index, item) {
          var option = $('<option>').text(item.nombre_profesor).val(item.id_profesor);
          profesor.append(option);
        });

        var materia = $('#asignar_materias');

        $.each(response.materia, function(index, item) {
          var option = $('<option>').text(item.nombre_materia).val(item.id_materia);
          materia.append(option);
        });

        
        var asignar_nivel = $('#asignar_nivel');

        $.each(response.nivel, function(index, item) {
          var option = $('<option>').text(item.nombre).val(item.id_nivel);
          asignar_nivel.append(option);
        });
        
        var asignar_grado = $('#asignar_grado');

        $.each(response.grado, function(index, item) {
          var option = $('<option>').text(item.nombre_grado).val(item.id_grado);
          asignar_grado.append(option);
        });

        var asignar_grupo = $('#asignar_grupo');

        $.each(response.grupo, function(index, item) {
          var option = $('<option>').text(item.nombre_grupo).val(item.id_grupo);
          asignar_grupo.append(option);
        });

        var materia_grado = $('#materia_grado');

        $.each(response.grado, function(index, item) {
          var option = $('<option>').text(item.nombre_grado).val(item.id_grado);
          materia_grado.append(option);
        });


        var seguimiento = $('#seguimiento_atributo');

        $.each(response.atributo, function(index, item) {
          var option = $('<option>').text(item.nombre_atributo).val(item.id_atributo);
          seguimiento.append(option);
        });

        var extra_estudiante = $('#extra_estudiante');

        $.each(response.estudiante, function(index, item) {
          var option = $('<option>').text('Nombre: '+ item.nombre_alumno + ' ' + item.apellido + ' Matrícula: ' + item.matricula).val(item.id_alumno);
          extra_estudiante.append(option);
        });
      }
    });


    var img_src;
    var template;
    function custom_template(obj) {
      var data = $(obj.element).data();
      var text = $(obj.element).text();

      // console.log(data);
      //console.log(text);

      if (data && data["img_src"]) {
        img_src = data["img_src"];
        template = $(
          '<div><img src="' +
            img_src +
            '" style="width:30%;height:15%;"/><p style="font-weight: 700;font-size:14pt;text-align:center;" align=center>' +
            text +
            "</p></div>"
        );
        console.log(img_src);

        return template;
  
      }
    }
    var options = {
      templateSelection: custom_template,
      templateResult: custom_template,
    };
    $("#icono").select2(options);
    $("#sticker_tipo_mensaje").select2(options);
    $(".select2-container--default .select2-selection--single").css({
      height: "70px",
    });

});


//mensaje de modificacion