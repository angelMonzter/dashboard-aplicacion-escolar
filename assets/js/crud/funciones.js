export function mensaje(mensaje, tipo) {
    Swal.fire({
      icon: tipo,
      title: mensaje,
      //text: 'Something went wrong!',
      //footer: '<a href="">Why do I have this issue?</a>'
    })
}

export function resetform(form_id) {
     $(form_id + ' select').each(function() { this.selectedIndex = 0 });
     $(form_id + ' input[type=text] , ' + form_id + '  textarea').each(function() { this.value = '' });
     $(form_id)[0].reset();
}

let datos_formulario;
export function extraer_datos_form(id_form) {
    datos_formulario = $(id_form).serializeArray();
}


export function accionSimple(datos, archivo) {
  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo,// Archivo PHP que procesará la subida
    type: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
      // Procesar la respuesta del servidor
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Manejar el error en caso de fallo en la solicitud
      console.log(xhr.responseText);
    }
  });
}

export function insertDataFiles(datos, archivo) {
  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo,// Archivo PHP que procesará la subida
    type: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
      // Procesar la respuesta del servidor
      console.log(response);

      const { respuesta, id, modulo } = response;

      const formulario_modulo = "#" + modulo;
      extraer_datos_form(formulario_modulo);

      if (respuesta == "modificacion") {
        if (modulo == "instituto") {
          datos_nuevos[0].innerHTML = datos_formulario[0].value;
        }

        mensaje("Datos editados", "success");
        resetform(formulario_modulo);
      }
      if (respuesta == "alta") {
        if (modulo == "instituto") {
          $("#tabla_instituto").DataTable().row.add([
              datos_formulario[0].value,
              `<td>Sí</td>`,
                `<td>Sí</td>`,
                `<td>Sí</td>`,
                `<td>Sí</td>`,
                `<td>Sí</td>`,
                `<td>Sí</td>`,
                `<td>No</td>`,
                `<td>2023-03-22 11:41:14 </td>`,
                `<td>
                  <a href="javascript:;" class="bg-info shadow border-radius-md p-2 table_button text-white mostrar_detalles" data-id="${id}" data-bs-toggle="tooltip" data-bs-original-title="Detalles">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                  <a href="javascript:;" class="bg-success border-radius-md p-2 table_button text-white editar_fila" data-id="${id}"  data-bs-toggle="tooltip" data-bs-original-title="Editar">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <a href="javascript:;" class="bg-danger border-radius-md p-2 table_button text-white eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-original-title="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </td>`,
            ])
            .draw(false);
        }
        if (modulo == 'rol') {

          //consulta a los privilegios
          let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
          formData.append("accion", "consulta");

          $.ajax({
            url: 'http://localhost/dashboard-aplicacion-escolar/php/privilegios.php',// Archivo PHP que procesará la subida
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              // Procesar la respuesta del servidor
              console.log(response);
              let datos = new FormData(); // Crea un objeto FormData con los datos del formulario
              datos.append("accion", "insertar");
              datos.append("id_rol", id);
              datos.append("id_privilegio", response.id);

              accionSimple(datos, 'privilegios_rol.php');
            },
            error: function(xhr, status, error) {
              // Manejar el error en caso de fallo en la solicitud
              console.log(xhr.responseText);
            }
          });

          const html = `<tr class="text-center">
            <td class="ps-1 text-center" colspan="4">
              <div class="my-auto">
                <span class="text-dark d-block text-sm">${datos_formulario[0].value}</span>
              </div>
            </td>
            <td class="text-center">
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <span class="text-dark d-block text-sm">2</span>
              </div>
            </td>
            <td class="text-center">
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
              </div>
            </td>
            <td>
              <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                <a class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>`;
          $('#tabla_rol tbody').append(html);
        }

        mensaje("Datos agregados", "success");
        resetform(formulario_modulo);
      }

    },
    error: function(xhr, status, error) {
      // Manejar el error en caso de fallo en la solicitud
      console.log(xhr.responseText);
    }
  });
}

export function consultaObj(id_tabla, id_modificar, detalles) {
  
  const archivo = $(id_tabla).attr('data-name');

  let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
  formData.append("accion", "consulta");
  
  if (!id_modificar) {
    formData.append("id_modificar", "");
    formData.append("detalles", "");
  }else{
    $('.id_modificar').val(id_modificar);

    formData.append("id_modificar", id_modificar);
    formData.append("detalles", "");
  }

  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo,// Archivo PHP que procesará la subida
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
      // Procesar la respuesta del servidor
      console.log(response);
      
      const { respuesta, fila, id, modulo } = response;

      let privilegios = [];

      if ( respuesta == "mostrar_datos" ) {
        const numero_filas = id.length;

        if (modulo == 'rol') {
          for (var i = 0; i < numero_filas; i++) {
            const html = `<tr class="text-center">
              <td class="ps-1 text-center" colspan="4">
                <div class="my-auto">
                  <span class="text-dark d-block text-sm">${fila[i].nombre}</span>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                  <span class="text-dark d-block text-sm">2</span>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Estadisticas" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Usuarios y padres" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Mensajes" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Calendario" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Extracurriculares" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Seguimientos" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Calificaciones" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Materias" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Asistencias" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Cobranza" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Tareas" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center" >
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Configuraciones" activo="no">
                </div>
              </td>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                  <a class="btn text-white bg-success editar_fila" data-id="${id[i]}" data-bs-toggle="tooltip" data-bs-title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id[i]}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>`;
            $('#tabla_rol tbody').append(html);
          }

          //let datos = new FormData(); // Crea un objeto FormData con los datos del formulario
          //datos.append("accion", "consulta");
          //datos.append("id_modificar", id);
          //datos.append("detalles", '');

          /*$.ajax({
            url: 'http://localhost/dashboard-aplicacion-escolar/php/privilegios_rol.php',// Archivo PHP que procesará la subida
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              // Procesar la respuesta del servidor
              let array_check = [];
              for (var i = 0; i < numero_filas; i++) {
                const html = `<tr class="text-center">
                    <td class="ps-1 text-center" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm">${fila[i].nombre}</span>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <span class="text-dark d-block text-sm">2</span>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12" rol-id="${id[i]}" value="Estadisticas" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Usuarios y padres" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Mensajes" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Calendario" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Extracurriculares" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Seguimientos" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Calificaciones" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Materias" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Asistencias" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Cobranza" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Tareas" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13" rol-id="${id[i]}" value="Configuraciones" activo="" privilegio-id="">
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <a class="btn text-white bg-success editar_fila" data-id="${fila[i].id_rol}" data-bs-toggle="tooltip" data-bs-title="Editar">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_rol}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>`;
                  $('#tabla_rol tbody').append(html);
                  //console.log(jQuery('[rol-id="' + fila[i].id_rol + '"]'));
                  //array_check.push(jQuery('[rol-id="' + fila[i].id_rol + '"]'));
                  array_check.push($('#tabla_rol .form-check-input').attr('rol-id', fila[i].id_rol));

              }
                  console.log(array_check);

              let array_final = [];
              for (var j = 0; j < array_check[0].length; j++) {
                  //array_final.push(array_check[0][j]);
              }

              for (var m = 0; m < response.length; m++) {
                for (var j = 0; j < array_check[m].length; j++) {
                  //array_final.push(array_check[m][j]);
                  //console.log(array_check[m][j]);
                }
              }
                //for (var j = 0; j < array_check[m].length; j++) {
                //console.log(array_check[m][j]);
                //}

              for (var h = 0; h < array_final.length; h++) {
               // array_final[h].attributes['activo'].value = response.fila[h].activo
               // array_final[h].attributes['privilegio-id'].value = response.fila[h].sid_privilegios
              }
            },
            error: function(xhr, status, error) {
              // Manejar el error en caso de fallo en la solicitud
              console.log(xhr.responseText);
            }
          });*/
        }
      }
      if ( respuesta == "consulta_id" ) {

        if (modulo == 'rol') {
            $('#nombre_rol').val(fila[0].nombre);
        }
      }
    },
    error: function(xhr, status, error) {
      // Manejar el error en caso de fallo en la solicitud
      console.log(xhr.responseText);
    }
  });
}

export function insertData(accion, datos_tabla, archivo) {

  const datos = {
      accion: 'insertar',
      data: datos_tabla,
  }
  console.log(datos);
  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
    method: 'POST', // Método HTTP a utilizar
    data: JSON.stringify(datos),
    contentType: 'application/json',
    success: function(response) {
      // Se ejecuta cuando la petición se completa exitosamente
      console.log(response);

      const { respuesta, id, modulo} = response;

      const formulario_modulo = '#' + modulo;
      extraer_datos_form(formulario_modulo);

      if (respuesta == 'edicion') {

        $("#configuracion_escuela .list-group").css('display', 'block');

        let boton_configuracion = `<a href="#!" class="btn bg-gradient-success mb-0 me-2 editar_configuracion">Editar configuración</a>`;
        let contenedor_boton_configuracion = $('.botones_configuracion');
        contenedor_boton_configuracion.html( boton_configuracion );

        const nombre_instituto_editado = `<strong class="text-dark">Nombre:</strong> &nbsp; ${response.nombre_instituto}`;
        const descripcion_instituto_editado = `<strong class="text-dark">Descripción:</strong> &nbsp; ${response.descripcion_instituto}`;

        let configuracion_lista_nombre = $('#configuracion_escuela')[0].childNodes[2].children[0];
        let configuracion_lista_descripcion = $('#configuracion_escuela')[0].childNodes[2].children[1];

        configuracion_lista_nombre.innerHTML = nombre_instituto_editado;
        configuracion_lista_descripcion.innerHTML = descripcion_instituto_editado;

        $('#configuracion_escuela .align-items-center').remove();

        mensaje('Datos editados', 'success');
      }
      if (respuesta == 'modificacion') {

          const datos_nuevos = jQuery('[data-id="' + id + '"]').parents()[1].childNodes;

          if (modulo == 'usuarios') {
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
              datos_nuevos[1].innerHTML = datos_formulario[1].value;
              datos_nuevos[2].innerHTML = datos_formulario[2].value;
              datos_nuevos[3].innerHTML = datos_formulario[4].value;
          }
          if (modulo == 'niveles') {
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
          }
          if (modulo == 'grupos') {
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
          }
          if (modulo == 'grados') {
              datos_nuevos[1].innerHTML = datos_formulario[1].value;
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
          }
          if (modulo == 'padres') {
              datos_nuevos[1].innerHTML = datos_formulario[0].value;
              datos_nuevos[2].innerHTML = datos_formulario[1].value;
              datos_nuevos[3].innerHTML = datos_formulario[2].value;
          }
          if (modulo == 'tipo_mensajes') {
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
              datos_nuevos[1].innerHTML = datos_formulario[1].value;
          }
          if (modulo == 'estudiantes') {
              datos_nuevos[1].innerHTML = datos_formulario[0].value;
              datos_nuevos[2].innerHTML = datos_formulario[1].value;
              datos_nuevos[3].innerHTML = datos_formulario[2].value;
              datos_nuevos[4].innerHTML = datos_formulario[3].value;
              datos_nuevos[5].innerHTML = datos_formulario[4].value;
              datos_nuevos[6].innerHTML = datos_formulario[5].value;
              datos_nuevos[7].innerHTML = datos_formulario[6].value;
          }
          if (modulo == 'extracurriculares') {
              datos_nuevos[0].innerHTML = datos_formulario[0].value;
          }
          //el sergio 
          if (modulo == 'atributo') {
            datos_nuevos[0].innerHTML = datos_formulario[0].value;
            datos_nuevos[1].innerHTML = datos_formulario[1].value;
            datos_nuevos[2].innerHTML = datos_formulario[2].value;
          }
          if (modulo == 'pago') {
            datos_nuevos[1].innerHTML = datos_formulario[2].value;
            datos_nuevos[2].innerHTML = datos_formulario[0].value;
            datos_nuevos[3].innerHTML = 'VANESSA ZEPEDA MEBARAK';
            datos_nuevos[4].innerHTML = 'KEVIN';
            //falta acomodar más datos de la tabla
          }
          if (modulo == 'scanner') {
            datos_nuevos[0].innerHTML = datos_formulario[0].value;
            datos_nuevos[1].innerHTML = datos_formulario[1].value;
            datos_nuevos[2].innerHTML = datos_formulario[2].value;
            datos_nuevos[3].innerHTML = datos_formulario[3].value;
          }
          if (modulo == 'materia') {
            datos_nuevos[0].innerHTML = datos_formulario[0].value;
            datos_nuevos[1].innerHTML = datos_formulario[1].value;
            
          }
          if (modulo == 'asignar_materia') {

            datos_nuevos[0].innerHTML = 'PREESCOLAR - KINDER 1 - C';
            datos_nuevos[1].innerHTML = datos_formulario[0].value;
            datos_nuevos[2].innerHTML = datos_formulario[1].value;
          }
          //el sergio 

          mensaje('Datos editados', 'success');
          resetform(formulario_modulo);
      }
      if (respuesta == 'alta') {

          if (modulo == 'usuarios') {
              $('#tabla_usuarios').DataTable().row.add([
                  datos_formulario[0].value,
                  datos_formulario[1].value,
                  datos_formulario[2].value,
                  datos_formulario[4].value,
                  `<td>
                      <a class="btn text-white bg-secondary mostrar_detalles" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                      <a class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a class="btn text-white bg-warning cambiar_password" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Cambiar Contraseña" onclick="showMensaje('changePassword')">
                        <i class="fa-solid fa-key"></i>
                      </a>
                      <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>`,
                   
              ]).draw(false);
          }
          if (modulo == 'niveles') {
              $('#tabla_niveles').DataTable().row.add([
                  datos_formulario[0].value,
                   `<td>
                      <a class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'grupos') {
              $('#tabla_grupos').DataTable().row.add([
                  datos_formulario[0].value,
                   `<td>
                      <a class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'grados') {
              $('#tabla_grados').DataTable().row.add([
                  datos_formulario[0].value,
                  datos_formulario[1].value,
                   `<td>
                      <a class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'padres') {
              $('#tabla_padres').DataTable().row.add([
                  `<td>
                    <div class="d-flex align-items-center justify-content-center">
                      <div class="form-check is-filled">
                        <input class="form-check-input" type="checkbox" id="customCheck1">
                      </div>
                    </div>
                  </td>`,
                  datos_formulario[0].value,
                  datos_formulario[1].value,
                  datos_formulario[2].value,
                  'si',
                  `<td>
                    <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Asignar hijo">
                      <i class="fa-solid fa-user-tag"></i>
                    </a>
                    <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="QR">
                      <i class="fa-solid fa-qrcode"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash text-white"></i>
                    </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'tipo_mensajes') {
              $('#tabla_tipo_mensajes').DataTable().row.add([
                `<img src="${datos_formulario[0].value}" class="icono_tabla" alt="">`,
                  datos_formulario[1].value,
                  `<td>
                      <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                   </td>`,
              ]).draw(false);
          }
          if (modulo == 'estudiantes') {
              $('#tabla_estudiantes').DataTable().row.add([
                  `<td>
                      <div class="d-flex align-items-center justify-content-center">
                        <div class="form-check is-filled">
                          <input class="form-check-input" type="checkbox" id="customCheck1">
                        </div>
                      </div>
                  </td>`,
                  datos_formulario[0].value,
                  datos_formulario[1].value,
                  datos_formulario[2].value,
                  datos_formulario[3].value,
                  datos_formulario[4].value,
                  datos_formulario[5].value,
                  datos_formulario[6].value,
                  `<td>
                    <a href="#" class="btn text-white bg-secondary" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'extracurriculares') {
              //console.log(datos_formulario);
              $('#tabla_extracurriculares').DataTable().row.add([
                  datos_formulario[0].value,
                  1,
                  `<td>
                    <a href="#" class="btn text-white bg-secondary" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'mensajes') {
              console.log(datos_formulario);
              $('#tabla_mensajes').DataTable().row.add([
                  `<td>
                      <div class="d-flex align-items-center justify-content-center">
                        <div class="form-check is-filled">
                          <input class="form-check-input" type="checkbox" id="customCheck1">
                        </div>
                      </div>
                  </td>`,
                  datos_formulario[0].value,
                  1,
                  2,
                  datos_formulario[2].value,
                  `<td>
                      <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="URL">
                        <i class="fa-solid fa-link mx-2"></i>0
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn text-white bg-primary" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                        <i class="fa-solid fa-paperclip mx-2"></i></i>0
                      </a>
                    </td>`,
                  'url',
                  datos_formulario[3].value,
                  'si',
                  `<td>
                    <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash text-white"></i>
                    </a>
                  </td>`,
              ]).draw(false);
          }
          if (modulo == 'atributo') {
            $('#tabla_atributo').DataTable().row.add([
              `<td>
                <img src="${datos_formulario[0].value}" class="icono_tabla" alt="">`,
              datos_formulario[1].value,
              datos_formulario[2].value,
              `<td>
                  <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                    <i class="fa-solid fa-trash"></i>
                  </a>
              </td>`,
            ]).draw(false);
          }
          if (modulo == 'pago') {
            $('#tabla_pagos').DataTable().row.add([
              `<td>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="form-check is-filled">
                      <input class="form-check-input" type="checkbox" id="customCheck1">
                    </div>
                  </div>
              </td>`,
              datos_formulario[2].value,
              datos_formulario[0].value,
              `<td>VANESSA ZEPEDA MEBARAK</td>`,
              `<td>KEVIN</td>`,
              datos_formulario[3].value,
              `<td><span class="badge badge-sm bg-gradient-success">Pagado</span></td>`,
              `<td>Manual</td>`,
              datos_formulario[2].value,
              datos_formulario[5].value,
              `<td>
                <a href="#" class="btn text-white bg-secondary" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>`,
            ]).draw(false);
          }
          if (modulo == 'scanner') {
            $('#tabla_scanner').DataTable().row.add([
              datos_formulario[0].value,
              datos_formulario[1].value,
              datos_formulario[2].value,
              datos_formulario[3].value,
              datos_formulario[3].value,
              `<td>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>`
            ]).draw(false);
          }
          if (modulo == 'evento') {
            console.log('Efectivamente');
          }
          if (modulo == 'materia') {
            $('#tabla_materia').DataTable().row.add([
              datos_formulario[0].value,
              datos_formulario[1].value,
              `<td>4</td>`,
              `<td>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
              </td>`
            ]).draw(false); 
          }
          if (modulo == 'asignar_materia') {
            $('#tabla_asignar_materia').DataTable().row.add([
              `<td>PREESCOLAR - KINDER 1 - C  </td>`,
              datos_formulario[0].value,
              datos_formulario[1].value,
              `<td>4</td>`,
              `<td>2023-02-08 12:12:45    </td>`,
              `<td>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
              </td>`
            ]).draw(false); 
          }
          if (modulo == 'seguimiento') {
            $('#tabla_segui_atributo').DataTable().row.add([
              datos_formulario[0].value,
              datos_formulario[1].value,
              `<td>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
              </td>`
            ]).draw(false);
          }
          if (modulo == 'asignar_atributo') {
            $('#tabla_asignar_atributo').DataTable().row.add([
              datos_formulario[0].value,
              datos_formulario[1].value,
              `<td>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
              </td>`
            ]).draw(false);
          }
          if (modulo == 'alumno_extracurriculares') {
            $('#tabla_alumno_extracurricular').DataTable().row.add([
              datos_formulario[0].value,
              datos_formulario[1].value,
              datos_formulario[1].value,
              `<td>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${id}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
              </td>`
            ]).draw(false);
          }
          mensaje('Datos agregados', 'success');
          resetform(formulario_modulo);
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // Se ejecuta cuando hay un error en la petición
      console.log(errorThrown);
    }
  });
}

export function eliminarObj(id_eliminar, archivo) {

    let formData = new FormData(); // Crea un objeto FormData con los datos del formulario
    formData.append("accion", "eliminar");
    formData.append("id", id_eliminar);

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
              url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
              method: 'POST', // Método HTTP a utilizar
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(response) {
                // Se ejecuta cuando la petición se completa exitosamente
                console.log(response);
                jQuery('[data-id="' + response.id + '"]').parents()[2].remove();
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

export function eliminar(id_eliminar, archivo) {

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
              url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
              method: 'POST', // Método HTTP a utilizar
              data: JSON.stringify(datos),
              contentType: 'application/json',
              success: function(response) {
                // Se ejecuta cuando la petición se completa exitosamente
                console.log(response);
                jQuery('[data-id="' + response.id + '"]').parents()[1].remove()
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

export function consulta(id_tabla, id_modificar, detalles) {

    //const tabla = $(id_tabla);
    const archivo = $(id_tabla).attr('data-name');
    let datos;

    if (!id_modificar) {
        const informacion_tabla = {
            id: '',
            detalles: ''
        };

        datos = {
            accion: 'consulta',
            data: informacion_tabla,
        }
    }else{
        $('.id_modificar').val(id_modificar);

        const datos_tabla = {
            id: id_modificar,
            detalles: detalles
        };

        datos = {
            accion: 'consulta',
            data: datos_tabla,
        }
    }

    $.ajax({
      url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
      method: 'POST', // Método HTTP a utilizar
      data: JSON.stringify(datos),
      contentType: 'application/json',
      success: function(response) {
        // Se ejecuta cuando la petición se completa exitosamente
        console.log(response);
        
        const { respuesta, fila, id, modulo } = response;

        if ( respuesta == "consulta_id" ) {

            if (modulo == 'usuarios') {
                $('#nombre').val(fila[0].nombre);
                $('#apellido').val(fila[0].apellido);
                $('#correo').val(fila[0].correo);
                $('#contrasena').val(fila[0].contrasena);
            }
            if (modulo == 'niveles') {
                $('#nombre_nivel').val(fila[0].nombre);
            }
            if (modulo == 'grupos') {
                $('#nombre_grupo').val(fila[0].nombre);
            }
            if (modulo == 'grados') {
                $('#sid_nivel').val(fila[0].sid_nivel);
                $('#nombre_grado').val(fila[0].nombre);
            }
            if (modulo == 'padres') {
                $('#nombre_padre').val(fila[0].nombre);
                $('#apellido_padre').val(fila[0].apellido);
                $('#correo_padre').val(fila[0].correo);
            }
            if (modulo == 'tipo_mensajes') {
                $('#sticker_tipo_mensaje').val(fila[0].icono);
                $('#nombre_tipo_mensaje').val(fila[0].nombre);
            }
            if (modulo == 'estudiantes') {
                $('#nombre_alumno').val(fila[0].nombre);
                $('#apellidos_alumno').val(fila[0].apellido);
                $('#matricula_alumno').val(fila[0].matricula);
                $('#sexo_alumno').val(fila[0].sexo);
                $('#sid_nivel').val(fila[0].sid_nivel);
                $('#sid_grado').val(fila[0].sid_grado);
                $('#sid_grupo').val(fila[0].sid_grupo);
                $('#foto_alumno').val(fila[0].foto);
            }
            if (modulo == 'extracurriculares') {
                $('#nombre_extracurriculares').val(fila[0].nombre);
            }
            if (modulo == 'atributo') {
              $('#icono').val(fila[0].icono);
              $('#nombre_atributo').val(fila[0].nombre);
              $('#valor_atributo').val(fila[0].valor);
            }
            if (modulo == 'pago') {
              $('#pago_matricula').val(fila[0].sid_alumno);
              $('#pago_modo').val(fila[0].modo);
              $('#pago_concepto').val(fila[0].concepto);
              $('#pago_monto').val(fila[0].monto);
            }
            if (modulo == 'scanner') {
              $('#nombre_scanner').val(fila[0].nombre);
              $('#app_scanner').val(fila[0].apellido);
              $('#correo_scanner').val(fila[0].correo);
              $('#user_scanner').val(fila[0].usuario);
              $('#ctr_scanner').val(fila[0].contrasena);
            }
            if (modulo == 'materia') {
              $('#materia_nombre').val(fila[0].nombre);
              $('#materia_grupo').val(fila[0].sid_grupo);
            }
            if (modulo == 'asignar_materia') {
              $('#asignar_profesor').val(fila[0].sid_alumno);
              $('#asignar_materias').val(fila[0].sid_materia);
            }
            if (modulo == 'instituto') {
              $('#nombre_instituto').val(fila[0].nombre);
              $('#descripcion_instituto').val(fila[0].descripcion);
            }
        }
        if ( respuesta == "mostrar_datos" ) {
            const numero_filas = id.length;

            if (modulo == 'usuarios') {
                //usuarios
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_usuarios').DataTable().row.add([
                        fila[i].nombre,
                        fila[i].apellido,
                        fila[i].correo,
                        fila[i].sid_rol,
                        `<td>
                            <a class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_usuario}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn text-white bg-success editar_fila" data-id="${fila[i].id_usuario}" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn text-white bg-warning cambiar_password" data-id="${fila[i].id_usuario}" data-bs-toggle="tooltip" data-bs-title="Cambiar Contraseña" onclick="showMensaje('changePassword')">
                              <i class="fa-solid fa-key"></i>
                            </a>
                            <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_usuario}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'niveles') {
                //niveles
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_niveles').DataTable().row.add([
                        fila[i].nombre,
                        `<td>
                            <a class="btn text-white bg-success editar_fila" data-id="${fila[i].id_nivel}" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_nivel}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>`,
                         
                    ]).draw(false);
                }
            }
            if (modulo == 'grupos') {
                //grupos
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_grupos').DataTable().row.add([
                        fila[i].nombre,
                        `<td>
                            <a class="btn text-white bg-success editar_fila" data-id="${fila[i].id_grupo}" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_grupo}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>`,
                         
                    ]).draw(false);
                }
            }
            if (modulo == 'grados') {
                //grados

                console.log(fila);
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_grados').DataTable().row.add([
                        fila[i].nombre,
                        fila[i].id_grado,
                        `<td>
                            <a class="btn text-white bg-success editar_fila" data-id="${fila[i].id_grado}" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#listar-usuarios-password" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_grado}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'padres') {
                //padres
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_padres').DataTable().row.add([
                        `<td>
                          <div class="d-flex align-items-center justify-content-center">
                            <div class="form-check is-filled">
                              <input class="form-check-input check" type="checkbox" id="customCheck1" value="${fila[i].id_padre}">
                            </div>
                          </div>
                        </td>`,
                        fila[i].nombre,
                        fila[i].apellido,
                        fila[i].correo,
                        `<td>
                          <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Asignar hijo">
                            <i class="fa-solid fa-user-tag"></i>
                          </a>
                          <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_padre}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                            <i class="fa-solid fa-eye"></i>
                          </a>
                          <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_padre}" data-bs-toggle="tooltip" data-bs-title="Editar">
                            <i class="fa-regular fa-pen-to-square"></i>
                          </a>
                          <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="QR">
                            <i class="fa-solid fa-qrcode"></i>
                          </a>
                          <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_padre}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash text-white"></i>
                          </a>
                        </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'tipo_mensajes') {
                //tipo de mensajes
                //console.log(fila);
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_tipo_mensajes').DataTable().row.add([
                        `<img src="${fila[i].icono}" class="icono_tabla" alt="">`,
                        fila[i].nombre,
                        `<td>
                            <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_tipo_mensaje}" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_tipo_mensaje}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                         </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'estudiantes') {
                //tipo de mensajes
                //console.log(fila);
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_estudiantes').DataTable().row.add([
                        `<td>
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="form-check is-filled">
                                <input class="form-check-input" type="checkbox" id="customCheck1">
                              </div>
                            </div>
                        </td>`,
                        fila[i].nombre,
                        fila[i].apellido,
                        fila[i].matricula,
                        fila[i].sexo,
                        fila[i].sid_nivel,
                        fila[i].sid_grado,
                        fila[i].sid_grupo,
                        `<td>
                          <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                            <i class="fa-solid fa-eye"></i>
                          </a>
                          <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Editar">
                            <i class="fa-regular fa-pen-to-square"></i>
                          </a>
                          <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'extracurriculares') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_extracurriculares').DataTable().row.add([
                  fila[i].nombre,
                  1,
                  `<td>
                    <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_extracurricular}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_extracurricular}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_extracurricular}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>`,
                ]).draw(false);
              }
            }
            if (modulo == 'mensajes') {
                //tipo de mensajes
                //console.log(fila);
                for (var i = 0; i < numero_filas; i++) {
                    $('#tabla_mensajes').DataTable().row.add([
                        `<td>
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="form-check is-filled">
                                <input class="form-check-input" type="checkbox" id="customCheck1">
                              </div>
                            </div>
                        </td>`,
                        fila[i].sid_tipo,
                        1,
                        2,
                        fila[i].asunto,
                        `<td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="URL">
                              <i class="fa-solid fa-link mx-2"></i>0
                            </a>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-primary" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                              <i class="fa-solid fa-paperclip mx-2"></i></i>0
                            </a>
                          </td>`,
                        fila[i].url,
                        fila[i].fecha_envio,
                        fila[i].mensaje_programado,
                        `<td>
                          <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_mensaje}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                            <i class="fa-solid fa-eye"></i>
                          </a>
                          <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_mensaje}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash text-white"></i>
                          </a>
                        </td>`,
                    ]).draw(false);
                }
            }
            if (modulo == 'atributo') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_atributo').DataTable().row.add([
                  `<td>
                    <img src="${fila[i].icono}" class="icono_tabla" alt="">`,
                  fila[i].nombre,
                  fila[i].valor,
                  `<td>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_atributo}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_atributo}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>`,
                ]).draw(false);
              }
            }
            if (modulo == 'pago') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_pagos').DataTable().row.add([
                    `<td class="sorting_1">
                        <div class="d-flex align-items-center justify-content-center">
                          <div class="form-check is-filled">
                            <input class="form-check-input" type="checkbox" id="customCheck1">
                          </div>
                        </div>
                    </td>`,
                    fila[i].concepto,
                    fila[i].sid_alumno,
                    `<td>VANESSA ZEPEDA MEBARAK</td>`,
                    `<td>KEVIN</td>`,
                    fila[i].monto,
                    `<td><span class="badge badge-sm bg-gradient-success">Pagado</span></td>`,
                    `<td>Manual</td>`,
                    fila[i].modo,
                    fila[i].fecha_pago,
                    `<td>
                      <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_pago}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_pago}" data-bs-toggle="tooltip" data-bs-title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_pago}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>`,
                ]).draw(false);
              }
            }
            if (modulo == 'scanner') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_scanner').DataTable().row.add([
                    fila[i].nombre,
                    fila[i].apellido,
                    fila[i].correo,
                    fila[i].usuario,
                    fila[i].usuario,
                    `<td>
                      <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_scanner}" data-bs-toggle="tooltip" data-bs-title="Editar">
                          <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_scanner}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                          <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>`
                ]).draw(false);
              }

            }
            if (modulo == 'materia') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_materia').DataTable().row.add([
                    fila[i].nombre,
                    fila[i].sid_grado,
                    `<td>4</td>`,
                    `<td>
                      <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_materia}" data-bs-toggle="tooltip" data-bs-title="Editar">
                          <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_materia}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                          <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>`
                ]).draw(false);    
              }
            }
            if (modulo == 'asignar_materia') {
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_asignar_materia').DataTable().row.add([
                `<td>PREESCOLAR - KINDER 1 - C    </td>`,
                fila[i].sid_alumno,
                fila[i].sid_materia,
                `<td>4</td>`,
                `<td>2023-02-08 12:12:45    </td>`,
                `<td>
                  <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_asignar_materia}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                  <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_asignar_materia}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                  </a>
                </td>`
                ]).draw(false);    
              }
            }
            if (modulo == 'seguimiento') {
              // console.log(fila);
              for (var i = 0; i < numero_filas; i++) {
                $('#tabla_seguimientos').DataTable().row.add([
                  `<td class="sorting_1">
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="form-check is-filled">
                                <input class="form-check-input" type="checkbox" id="customCheck1">
                              </div>
                            </div>
                        </td>`,
                  fila[i].nombre + ' ' + fila[i].apellido,
                  fila[i].nombre_padre + ' ',
                  fila[i].estudiante + ' ' + fila[i].app_alumno,
                  fila[i].fecha_envio,
                  ` <td>
                      <span class="badge badge-sm bg-gradient-success">Si</span>
                      </td>`,
                  fila[i].fecha_envio,
                  `<td>
                      <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_seguimiento}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                          <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_seguimiento}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                          <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>`
                ]).draw(false);
              }
            } 
            if (modulo == 'asignar_atributo') {
              // for (var i = 0; i < numero_filas; i++) {
              //   $('#tabla_asignar_atributo').DataTable().row.add([
              //     fila[i].sid_atributo,
              //     fila[i].nombre + ' ',
              //     `<td>
              //         <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_asignar_atributo}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
              //             <i class="fa-solid fa-trash"></i>
              //         </a>
              //       </td>`
              //   ]).draw(false);
              // }
            }
            if (modulo == 'asignar_extracurricular') {
              // for (var i = 0; i < numero_filas; i++) {
              //   $('#tabla_alumno_extracurricular').DataTable().row.add([
              //     fila[i].id_alumno_extracurricular,
              //     fila[i].sid_extracurricular,
              //     fila[i].sid_alumno,
              //     `<td>
              //         <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_alumno_extracurricular}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
              //             <i class="fa-solid fa-trash"></i>
              //         </a>
              //       </td>`
              //   ]).draw(false);
              // }
            }
        }
        if ( respuesta == "detalles" ) {
          if (modulo == 'usuarios') {

            const usuario_detalles = $('.usuario_detalles');

            if (usuario_detalles.length == 0) {
              const detalles_extra = `<hr class="horizontal gray-light my-2">
                                      <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nombres:</strong> &nbsp; ${fila[0].nombre} </li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Apellidos:</strong> &nbsp; ${fila[0].apellido}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Correo:</strong> &nbsp; ${fila[0].correo}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Rol:</strong> &nbsp; ${fila[0].sid_rol}</li>
                                      </ul>`;

              $('#informacion_perfil').html(detalles_extra);
            }else{
              const detalles_extra = `<h6 class="mb-3 fs-5">${fila[0].nombre} ${fila[0].apellido}</h6>
                                    <span class="mb-2 text-sm">Correo electrónico: <span class="text-dark font-weight-bold ms-sm-2">${fila[0].correo}</span></span>
                                    <span class="mb-2 text-sm">Rol: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sid_rol}</span></span>
                                    <span class="mb-2 text-sm">Institución: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].nombre}</span></span>
                                    <span class="mb-2 text-sm">Creado: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].creacion} </span></span>
                                    <span class="mb-2 text-sm">Modificado: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].modificacion} </span></span>`;

              usuario_detalles.html(detalles_extra);
            }
          }
          if (modulo == 'usuario_perfil') {
            
                                    
          }
          if (modulo == 'estudiantes') {
            const detalles_extra = `<h6 class="mb-3 fs-5">${fila[0].nombre} ${fila[0].apellido}</h6>
                                    <span class="mb-2 text-sm">Matrícula: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].matricula} </span></span>
                                    <span class="mb-2 text-sm">Nombre del padre: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].nombre}</span></span>
                                    <span class="mb-2 text-sm">Sexo: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sexo}</span></span>
                                    <span class="mb-2 text-sm">Nivel: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sid_nivel}</span></span>
                                    <span class="mb-2 text-sm">Grado: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sid_grado}</span></span>
                                    <span class="mb-2 text-sm">Grupo: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sid_grupo}</span></span>
                                    <span class="mb-2 text-sm">Creado: <span class="text-dark ms-sm-2 font-weight-bold">2022-07-29 13:36:22</span></span>`;
            $('.infomacion_estudiante').html(detalles_extra);

            const detalles_extra_dos = `<h6 class="mb-3 fs-5">Datos Adicionales</h6>
                                        <span class="mb-2 text-sm">Contacto de emergencia 1: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>
                                        <span class="mb-2 text-sm">Teléfono: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>
                                        <span class="mb-2 text-sm">Contacto de emergencia 2: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>
                                        <span class="mb-2 text-sm">Teléfono 2: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>
                                        <span class="mb-2 text-sm">Tipo de Sangre: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>
                                        <span class="mb-2 text-sm">Alergias: <span class="text-dark ms-sm-2 font-weight-bold">No Registrado</span></span>`;
            $('.infomacion_estudiante_extra').html(detalles_extra_dos);
            
          }

          if (modulo == 'pago') {
            const detalles_extra = `<span class="mb-2 text-sm">Código: <span class="text-dark font-weight-bold ms-sm-2">dd1eba43fdaea8ae4cddf7b402598c9e</span></span>
                                    <span class="mb-2 text-sm">Concepto: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].concepto}</span></span>
                                    <span class="mb-2 text-sm">Matrícula: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].sid_penalidad}</span></span>
                                    <span class="mb-2 text-sm">Tutor: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].sid_penalidad} </span></span>
                                    <span class="mb-2 text-sm">Estudiante: <span class="text-dark ms-sm-2 font-weight-bold"> KEVIN ZEPEDA </span></span>
                                    <span class="mb-2 text-sm">Tipo: <span class="text-dark ms-sm-2 font-weight-bold"> Manual </span></span>`;
            $('.datos_pago').html(detalles_extra);

            const detalles_extra_dos = `<span class="mb-2 text-sm">Modo de pago: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].modo}</span></span>
                                        <span class="mb-2 text-sm">Monto: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].monto} </span></span>
                                        <span class="mb-2 text-sm">Penalidad: <span class="text-dark ms-sm-2 font-weight-bold"> 0.00 </span></span>
                                        <span class="mb-2 text-sm">Monto total: <span class="text-dark ms-sm-2 font-weight-bold"> 1113 </span></span>
                                        <span class="mb-2 text-sm">Estado: <span class="text-dark ms-sm-2 font-weight-bold"> <span class="badge badge-sm bg-gradient-warning">En espera</span> </span></span>
                                        <span class="mb-2 text-sm">Enviado: <span class="text-dark ms-sm-2 font-weight-bold"> 2022-05-09 16:54:58 </span></span>`;
            $('.datos_pago_extra').html(detalles_extra_dos);
            
          }
          if (modulo == 'instituto') {
            const detalles_extra = `<hr class="horizontal gray-light my-2">
                                    <ul class="list-group">
                                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nombre:</strong> &nbsp; ${fila[0].nombre}</li>
                                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Descripción:</strong> &nbsp; ${fila[0].descripcion}</li>
                                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Fecha de inicio de licencia:</strong> &nbsp; ${fila[0].fecha_inicio_licencia}</li>
                                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Datos bancarios:</strong> &nbsp; ${fila[0].banco}</li>
                                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Políticas de privacidad:</strong> &nbsp; <a style="text-decoration: underline;" href="http://localhost/dashboard-app-escolar-admin/archivos/${fila[0].politicas}">${fila[0].politicas}</a></li>
                                    </ul>`;

            $('#configuracion_escuela').html(detalles_extra);

          }

          if (modulo == 'seguimiento') {
            const detalles_extra = `<h6 class="mb-3 fs-5">${fila[0].estudiante} ${fila[0].app_alumno}</h6>
                                      <span class="mb-2 text-sm">Padre: <span class="text-dark font-weight-bold ms-sm-2">${fila[0].nombre_padre} ${fila[0].apellido_padre} </span></span>
                                      <span class="mb-2 text-sm">Usuario: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].nombre} ${fila[0].apellido}</span></span>
                                      <span class="mb-2 text-sm">Enviado: <span class="text-dark ms-sm-2 font-weight-bold">${fila[0].fecha_registro}</span></span>
                                      <span class="mb-2 text-sm">Leído: <span class="badge badge-sm bg-gradient-success">Si</span></span>
                                      <span class="mb-2 text-sm">Visto: <span class="text-dark ms-sm-2 font-weight-bold"> ${fila[0].fecha_envio} </span></span>`;
            $('.seguimiento_detalles').html(detalles_extra);
            document.getElementById("sid_alumno_atributo").value = fila[0].sid_alumno;
            document.getElementById("fecha_atributo_seguimiento").value = fila[0].fecha_registro;

            const datos_form = {
              fecha_registro : fila[0].fecha_registro,
              sid_alumno : fila[0].sid_alumno,
              id: '2133j'
            }

            const datos = {
              accion: 'atributo',
              data: datos_form,
            }

            console.log(datos);
            $.ajax({
              url: 'http://localhost/dashboard-aplicacion-escolar/php/asignar_atributo.php',// Archivo PHP que procesará la subida
              method: 'POST', // Método HTTP a utilizar
              data: JSON.stringify(datos),
              contentType: 'application/json',
              success: function(response) {
                // Procesar la respuesta del servidor
                console.log(response);
                const { respuesta,id, fila, modulo } = response;
                const numero_filas = id.length;
                var tablaEstudiante = document.getElementById('tabla_asignar_atributo');
                var filasDatos = tablaEstudiante.getElementsByTagName('td');
                for (var i = 0; i < filasDatos.length; i++) {
                  filasDatos[i].style.display = 'none';
                }
                for (var i = 0; i < numero_filas; i++) {
                  $('#tabla_asignar_atributo').DataTable().row.add([
                    fila[i].sid_atributo,
                    fila[i].nombre + ' ',
                    `<td>
                        <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_asignar_atributo}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                      </td>`
                  ]).draw(false);
                }
              },
              error: function(xhr, status, error) {
                // Manejar el error en caso de fallo en la solicitud
                console.log(xhr.responseText);
              }
            });
          }
          if (modulo == 'extracurriculares') {
            const detalles_extra = `<h6 class="mb-3 fs-5">${fila[0].nombre}</h6>
                                    <span class="mb-2 text-sm">N° Estudiantes: <span class="text-dark font-weight-bold ms-sm-2">2</span></span>`;
            $('.extracurricular_detalle').html(detalles_extra);
            document.getElementById("sid_extracurricular").value = fila[0].id_extracurricular;

            const datos_form = {
              id_extracurricular : fila[0].id_extracurricular,
              sid_alumno : fila[0].nombre,
              id: '2133j'
            }

            const datos = {
              accion: 'asignar_extracurricular',
              data: datos_form,
            }

            console.log(datos);
            $.ajax({
              url: 'http://localhost/dashboard-aplicacion-escolar/php/alumno_extracurricular.php',// Archivo PHP que procesará la subida
              method: 'POST', // Método HTTP a utilizar
              data: JSON.stringify(datos),
              contentType: 'application/json',
              success: function(response) {
                // Procesar la respuesta del servidor
                console.log(response);
                const { respuesta,id, fila, modulo } = response;
                console.log(fila);
                console.log(respuesta);
                console.log(id);
                const numero_filas = id.length;
                var tablaEstudiante = document.getElementById('tabla_alumno_extracurricular');
                var filasDatos = tablaEstudiante.getElementsByTagName('td');
                for (var i = 0; i < filasDatos.length; i++) {
                  filasDatos[i].style.display = 'none';
                }
                for (var i = 0; i < numero_filas; i++) {
                  $('#tabla_alumno_extracurricular').DataTable().row.add([
                    fila[i].nombre,
                    fila[i].apellido + ' ',
                    fila[i].matricula + ' ',
                    `<td>
                        <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_alumno_extracurricular}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                      </td>`
                  ]).draw(false);
                }
              },
              error: function(xhr, status, error) {
                // Manejar el error en caso de fallo en la solicitud
                console.log(xhr.responseText);
              }
            });
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Se ejecuta cuando hay un error en la petición
        console.log(errorThrown);
      }
    });
}

export function filtros(datos_form, archivo) {
  const datos = {
    accion: 'mostrar_filtros',
    data: datos_form,
}
console.log(datos);
console.log(archivo);
  $.ajax({
      url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
      method: 'POST', // Método HTTP a utilizar
      data: JSON.stringify(datos),
      contentType: 'application/json',
      success: function(response) {
        // Se ejecuta cuando la petición se completa exitosamente
        console.log(response);

        const { respuesta,id, fila, modulo } = response;

        if (respuesta == 'filtro') {
          const numero_filas = id.length;
          console.log(numero_filas);
          console.log(fila);
          if (modulo == 'estudiantes') {
            var tablaEstudiante = document.getElementById('tabla_estudiantes');
            var filasDatos = tablaEstudiante.getElementsByTagName('td');
            for (var i = 0; i < filasDatos.length; i++) {
              filasDatos[i].style.display = 'none';
            }
            for (var i = 0; i < numero_filas; i++) {
              $('#tabla_estudiantes').DataTable().row.add([
                  `<td>
                      <div class="d-flex align-items-center justify-content-center">
                        <div class="form-check is-filled">
                          <input class="form-check-input" type="checkbox" id="customCheck1">
                        </div>
                      </div>
                  </td>`,
                  fila[i].nombre_estudiante,
                  fila[i].app_estudiante,
                  fila[i].matricula,
                  fila[i].sexo,
                  fila[i].nombre_nivel,
                  fila[i].grado,
                  fila[i].grupo,
                  `<td>
                    <a href="#" class="btn text-white bg-secondary mostrar_detalles" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Detalles">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="#" class="btn text-white bg-success editar_fila" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn text-white bg-danger eliminar_fila" data-id="${fila[i].id_alumno}" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>`,
              ]).draw(false);
          }
          }
        }
      }
  });
}

export function datos_select(id_select, archivo) {

  var id_tabla = $(id_select);
  const datos_tabla = {
    id: 'IA98s',
    detalles: ''
};
  const datos = {
    accion: 'mostrar_select',
    data: datos_tabla,
  }

  console.log(datos);
  console.log(archivo);

  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
    method: 'POST', // Método HTTP a utilizar
    data: JSON.stringify(datos),
    contentType: 'application/json',
    success: function (response) {
      // Se ejecuta cuando la petición se completa exitosamente
      console.log(response);
      const { respuesta, arreglo } = response;

      arreglo.forEach(function(item) {
        var option = $('<option>').text(item.nombre).val(item.id);
        id_tabla.append(option);
      });
    }
  });
}

export function exportExcel(datos_formulario, archivo) {


  const datos = {
    accion: 'excel',
    data: datos_formulario,
  }

  console.log(datos);
  console.log(archivo);

  $.ajax({
    url: 'http://localhost/dashboard-aplicacion-escolar/php/' + archivo, // URL de tu API
    method: 'POST', // Método HTTP a utilizar
    data: JSON.stringify(datos),
    contentType: 'application/json',
    success: function (response) {
      // Se ejecuta cuando la petición se completa exitosamente
      console.log(response);
    }
  });
}