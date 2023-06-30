<?php
$datatable = true;
include_once('../templates/header.php')
?>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<body class="g-sidenav-show  bg-gray-200">
  <!-- ASIDE / MENU IZQUIERDO  -->
  <?php include_once('../templates/aside.php') ?>
  <!-- ASIDE / MENU IZQUIERDO  -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include_once('../templates/navbar.php') ?>
    <!-- Navbar -->

    <div class="container-fluid py-4">
      <!-- Content -->
      <div class="row">

        <?php
        //- Submenu
        ?>
        <div class="container-fluid mt-4">
          <div class="align-items-center">
            <div class="col-sm-12 col-lg-7">
              <div class="nav-wrapper position-relative">

                <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#option1" role="tab" aria-selected="false">
                      Mensajes
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Nuevo Mensaje
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option3" aria-selected="false">
                      Tipos de mensaje
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option4" aria-selected="false">
                      Historial
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option5" aria-selected="false">
                      Registro
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php
        //- Opciones
        ?>
        <div class="col-12 mt-4 tab-content" role="tablist">

          <?php
          //? Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <!--filtro-->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Filtrar mensajes</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Desde</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Hasta</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="mt-3" align="right">
                        <button class="btn bg-gradient-primary mb-0 me-2" type="button" name="button">Filtrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--datatable-->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3 d-flex justify-content-end">
                      <button type="button" class="btn btn-outline-danger mx-2">Eliminar Seleccionados</button>
                      <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="tabla_mensajes" data-name="mensaje.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Tipo de envío</th>
                          <th class="text-center">N. Destinatarios</th>
                          <th class="text-center">Asunto</th>
                          <th class="text-center">Urls</th>
                          <th class="text-center">Adjuntos</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Programado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Tipo de envío</th>
                          <th class="text-center">N. Destinatarios</th>
                          <th class="text-center">Asunto</th>
                          <th class="text-center">Urls</th>
                          <th class="text-center">Adjuntos</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Programado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          //? Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">

            <!-- Formulario -->
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Enviar mensaje a estudiante</h5>

                  <form id="mensajes">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Receptor</label>
                          <select name="receptor" id="receptor" class="form-control" aria-label="Default select example">
                            <option selected value="0">Selecciona una opción</option>
                            <option value="1">Estudiantes</option>
                            <option value="2">Nivel grado y grupo</option>
                            <option value="3">Masivo </option>
                            <option value="4">Específico </option>
                            <option value="5">Extracurricular </option>
                          </select>
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Tipo de Mensaje</label>
                          <select name="sid_tipo" id="sid_tipo" class="form-control" aria-label="Default select example">
                            <option selected value="0">Selecciona una opción</option>
                            <option value="1">opt1 </option>
                          </select>
                        </div>

                        <div id="mensaje_estudiante" class="oculto">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Estudiante</label>
                            <select name="sid_estudiante" id="sid_estudiante" class="form-control" aria-label="Default select example">
                              <option selected value="0">Selecciona una opción</option>
                              <option value="1">opt1 </option>
                            </select>
                          </div>
                        </div>
                        <div id="mensaje_nivel" class="oculto">

                          <div class="row">
                            <div class="col-lg-4">
                              <div class="input-group input-group-dynamic mt-3">
                                <label class="input-group">Nivel</label>
                                <select name="sid_nivel" id="sid_nivel" class="form-control" aria-label="Default select example">
                                  <option selected value="0">Selecciona una opción</option>
                                  <option value="1">opt1 </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="input-group input-group-dynamic mt-3">
                                <label class="input-group">Grado</label>
                                <select name="sid_grado" id="sid_grado" class="form-control" aria-label="Default select example">
                                  <option selected value="0">Selecciona una opción</option>
                                  <option value="1">opt1 </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="input-group input-group-dynamic mt-3">
                                <label class="input-group">Grupo</label>
                                <select name="sid_grupo" id="sid_grupo" class="form-control" aria-label="Default select example">
                                  <option selected value="0">Selecciona una opción</option>
                                  <option value="1">opt1 </option>
                                </select>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div id="mensaje_masivo" class="oculto">
                          <div class="input-group input-group-dynamic mt-3">
                            <div class="alert alert-success alert-dismissible text-white" role="alert" style="width:100%;">
                              <span class="text-sm">A simple success alert with <a href="javascript:;" class="alert-link text-white">an example link</a>. Give it a click if you like.</span>
                              <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="mensaje_especifico" class="oculto">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Destinatario</label>
                            <select name="destinatario" id="destinatario" class="form-control" aria-label="Default select example">
                              <option selected value="0">Selecciona una opción</option>
                              <option value="1">opt1 </option>
                            </select>
                          </div>
                        </div>
                        <div id="mensaje_extracurricular" class="oculto">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Grupo extracurricular</label>
                            <select name="sid_extracurricular" id="sid_extracurricular" class="form-control" aria-label="Default select example">
                              <option selected value="0">Selecciona una opción</option>
                              <option value="1">opt1 </option>
                            </select>
                          </div>
                        </div>

                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Asunto</label>
                          <input type="text" class="form-control w-100" name="asunto_mensaje" id="asunto_mensaje" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Mensaje</label>
                          <textarea id="editor" name="mensaje"></textarea>
                        </div>

                      </div>
                      <div class="col-lg-6">

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="respuesta_rapida_mensaje" value="si" id="fcustomCheck1 respuesta_rapida_mensaje" checked="">
                              <label class="custom-control-label" for="customCheck1">PERMITIR RESPUESTA RÁPIDA</label>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="programado_mensaje" value="si" id="fcustomCheck1 programado_mensaje" checked="">
                              <label class="custom-control-label" for="customCheck1">¿ES UN MENSAJE PROGRAMADO?</label>
                            </div>
                          </div>
                        </div>

                        <div class="input-group input-group-static my-3">
                          <label>Fecha de envío</label>
                          <input type="date" id="fecha_envio_mensaje" name="fecha_envio_mensaje" class="form-control">
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Hora de Envío</label>
                          <select name="hora_envio_mensaje" id="hora_envio_mensaje" name="hora_envio_mensaje" class="form-control" aria-label="Default select example">
                            <option selected>Hora</option>
                            <option value="1">1</option>
                          </select>
                          <span class="mx-2 mt-2">:</span>
                          <select name="minutos_envio_mensaje" id="minutos_envio_mensaje" name="minutos_envio_mensaje" class="form-control" aria-label="Default select example">
                            <option selected>Minutos</option>
                            <option value="1">30 </option>
                          </select>
                        </div>

                        <div class="form-check">
                          <br>
                          <input class="form-check-input" type="checkbox" value="si" name="repetir_mensaje" id="fcustomCheck1 repetir_mensaje" checked="">
                          <label class="custom-control-label" for="customCheck1">Repetir</label>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Periodo</label>
                              <select name="periodo_mensaje" id="periodo_mensaje" class="form-control" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Fecha Fin</label>
                              <input type="date" class="form-control" id="fecha_fin_mensaje" name="fecha_fin_mensaje" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-11">
                            <label class="mb-0">Adjuntar Archivo</label>
                            <div class="inputs_archivo">
                              <input type="file" class="form-control archivo_mensaje" aria-describedby="emailHelp" name="archivo" id="archivo" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-1">
                            <div class="mt-3" align="right">
                              <button class="btn bg-gradient-primary mb-0 me-2 mt-2" type="button" id="mas_archivo">
                                <i class="fa-solid fa-plus"></i>
                              </button>
                              <button class="btn bg-gradient-danger mb-0 me-2 mt-2" type="button" id="mas_url">
                                <i class="fa-solid fa-trash-can"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-11">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">URL</label>
                              <div class="inputs_url" style="width: 100%;">
                                <input type="text" class="form-control url_mensaje" aria-describedby="emailHelp" name="url" id="url" onfocus="focused(this)" onfocusout="defocused(this)">
                              </div>
                            </div>
                          </div>
                          <div class="col-1">
                            <div class="mt-3" align="right">
                              <button class="btn bg-gradient-primary mb-0 me-2 mt-2" type="button" id="mas_url">
                                <i class="fa-solid fa-plus"></i>
                              </button>
                              <button class="btn bg-gradient-danger mb-0 me-2 mt-2" type="button" id="mas_url">
                                <i class="fa-solid fa-trash-can"></i>
                              </button>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="mt-3" align="right">
                        <input type="submit" class="btn bg-gradient-success mb-0 me-2" value="Agregar">
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>

          <?php
          //? Opcion 3
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">

            <!-- Formulario -->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Tipo de Mensaje</h5>

                  <form id="tipo_mensajes">
                    <div class="row align-items-center">
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Sticker</label>
                          <select name="sticker_tipo_mensaje" id="sticker_tipo_mensaje" class="form-control" aria-label="Default select example" style="width: 100%; border-color: transparent;">
                            <option selected>Selecciona una opción</option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/001.svg" value="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/001.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/002.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/002.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/003.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/003.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/004.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/004.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/005.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/005.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/006.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/006.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/007.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/007.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/008.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/008.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/009.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/009.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/010.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/010.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/011.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/011.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/012.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/012.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/013.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/013.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/014.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/014.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/015.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/015.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/016.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/016.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/017.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/017.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/018.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/018.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/019.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/019.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/020.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/020.svg"></option>
                            <option data-img_src="http://localhost/dashboard-aplicacion-escolar/assets/img/Tipo mensaje/021.svg" value="http://localhost/dashboard-app-escolar/assets/img/Tipo mensaje/021.svg"></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Nombre</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" name="nombre_tipo_mensaje" id="nombre_tipo_mensaje" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_tipo_mensajes">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Table -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <table id="tabla_tipo_mensajes" data-name="tipo_mensaje.php" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th class="text-center">Icono</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-center">Icono</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <?php
          //? Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">

            <!--filtro-->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Filtrar historial</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Desde</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Hasta</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="mt-3" align="right">
                        <button class="btn bg-gradient-primary mb-0 me-2" type="button" name="button">Filtrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="example4" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Emisor</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Leído</th>
                          <th class="text-center">Respuesta</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Visto</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>APLICACIÓN ESCOLAR PRO</td>
                          <td>VANESSA ZEPEDA MEBARAK</td>
                          <td>KEVIN ZEPEDA</td>
                          <td>PREESCOLAR</td>
                          <td>KINDER 1</td>
                          <td>A</td>
                          <td><span class="badge badge-sm bg-gradient-success">Sí</span></td>
                          <td>si</td>
                          <td>2023-03-31 00:41:50 </td>
                          <td>2023-03-31 01:24:21</td>
                        </tr>
                        <tr class="text-center">
                          <td>APLICACIÓN ESCOLAR PRO</td>
                          <td>VANESSA ZEPEDA MEBARAK</td>
                          <td>KEVIN ZEPEDA</td>
                          <td>PREESCOLAR</td>
                          <td>KINDER 1</td>
                          <td>A</td>
                          <td><span class="badge badge-sm bg-gradient-danger">No</span></td>
                          <td>si</td>
                          <td>2023-03-31 00:41:50 </td>
                          <td>2023-03-31 01:24:21</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Emisor</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Leído</th>
                          <th class="text-center">Respuesta</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Visto</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <?php
          //? Opcion 5
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option5">

            <!--filtro-->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Filtrar registro</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Desde</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Hasta</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="mt-3" align="right">
                        <button class="btn bg-gradient-primary mb-0 me-2" type="button" name="button">Filtrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="example5" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Asunto</th>
                          <th class="text-center">Emisor</th>
                          <th class="text-center">Fecha de Envío</th>
                          <th class="text-center">URLS</th>
                          <th class="text-center">Adjuntos</th>
                          <th class="text-center">Responsable</th>
                          <th class="text-center">Fecha de Eliminación</th>
                          <th class="text-center">Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>PRUEBA</td>
                          <td>APLICACIÓN ESCOLAR PRO</td>
                          <td>2022-11-03 09:51:25 </td>
                          <td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="URL">
                              <i class="fa-solid fa-link mx-2"></i>0
                            </a>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-i" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                              <i class="fa-solid fa-paperclip mx-2"></i>0
                            </a>
                          </td>
                          <td>PRUEBA APLICACIÓN ESCOLAR PRO</td>
                          <td>2023-03-31 00:41:50 </td>
                          <td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Restaurar">
                              Restaurar
                            </a>
                          </td>
                        </tr>
                        <tr class="text-center">
                          <td>PRUEBA</td>
                          <td>APLICACIÓN ESCOLAR PRO</td>
                          <td>2022-11-03 09:51:25 </td>
                          <td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="URL">
                              <i class="fa-solid fa-link mx-2"></i>0
                            </a>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-i" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                              <i class="fa-solid fa-paperclip mx-2"></i>0
                            </a>
                          </td>
                          <td>PRUEBA APLICACIÓN ESCOLAR PRO</td>
                          <td>2023-03-31 00:41:50 </td>
                          <td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Restaurar">
                              Restaurar
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Asunto</th>
                          <th class="text-center">Emisor</th>
                          <th class="text-center">Fecha de Envío</th>
                          <th class="text-center">URLS</th>
                          <th class="text-center">Adjuntos</th>
                          <th class="text-center">Responsable</th>
                          <th class="text-center">Fecha de Eliminación</th>
                          <th class="text-center">Acción</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
      <!-- Content -->

      <!-- Side Config -->
      <?php include_once('../templates/configside.php') ?>
      <!-- Side Config -->


      <!-- Footer -->
      <?php include_once('../templates/footer.php') ?>
      <!-- Footer -->

    </div>

  </main>

  <!-- Scripts -->
  <?php
  $textarea = true;
  include_once('../templates/script.php');
  ?>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <!-- Scripts -->
</body>

</html>