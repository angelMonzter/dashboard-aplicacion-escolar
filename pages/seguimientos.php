<?php
$datatable = true;
include_once('../templates/header.php')
?>

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
        // - Submenu
        ?>
        <div class="container-fluid mt-4">
          <div class="align-items-center">
            <div class="col-lg-4 col-sm-7">
              <div class="nav-wrapper position-relative">

                <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">

                  <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="#option1" role="tab" aria-selected="false">
                      Atributos
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#option2" role="tab" aria-selected="false">
                      Cargar Seguimientos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#option3" role="tab" aria-selected="false">
                      Seguimientos Academicos
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#option4" role="tab" aria-selected="false">
                      Registro
                    </a>
                  </li>

                  <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 137px;">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" role="tab" aria-selected="true">➡</a>
                  </div>
                </ul>

              </div>
            </div>
          </div>
        </div>


        <?php
        // - Opciones
        ?>
        <div class="col-12 mt-4 tab-content" role="tablist">

          <?php
          //# Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <!-- Formulario -->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">

                  <h5 class="font-weight-bolder">Agregar Atributo</h5>
                  <form id="atributo">
                    <div class="row align-items-center">
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Elije un sticker</label>
                          <select name="icono" id="icono" class="form-control" aria-label="Default select example" style="width: 100%; border-color: transparent;">
                            <option>Selecciona una opción</option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/001.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/001.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/002.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/002.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/003.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/003.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/004.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/004.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/005.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/005.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/006.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/006.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/007.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/007.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/008.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/008.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/009.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/009.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/010.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/010.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/011.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/011.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/012.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/012.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/013.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/013.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/014.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/014.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/015.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/015.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/016.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/016.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/017.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/017.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/018.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/018.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/019.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/019.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/020.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/020.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/021.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/021.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/022.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/022.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/023.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/023.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/024.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/024.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/025.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/025.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/026.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/026.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/027.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/027.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/028.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/028.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/029.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/029.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/030.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/030.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/031.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/031.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/032.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/032.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/033.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/033.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/034.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/034.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/035.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/035.svg"></option>
                            <option data-img_src="http://localhost/dashboard-app-escolar/assets/img/sticker/036.svg" value="http://localhost/dashboard-app-escolar/assets/img/sticker/036.svg"></option>

                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Nombre</label>
                          <input type="text" class="form-control" name="nombre_atributo" id="nombre_atributo" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Valor</label>
                          <input type="number" class="form-control" name="valor_atributo" id="valor_atributo" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <a href="#" class="btn bg-gradient-success mb-0 me-2" id="add_atributo">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            <!-- datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <table id="tabla_atributo" data-name="atributo.php" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th class="text-center">Sticker</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-center">Sticker</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <?php
          //# Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">
            <!-- Formulario -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 col-md-9 col-lg-9">
                      <h5 class="font-weight-bolder">Como subir un archivo</h5>
                      <p class="text-sm">Los pasos para subir un archivo son los siguientes:</p>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                      <button type="button" class="btn bg-secondary text-white col-12" data-bs-toggle="modal" data-bs-target="#seguimientoModal">
                        <i class="fa-solid fa-circle-info mx-1"></i>
                        Requerimientos de archivo
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <button class="btn bg-info shadow text-center text-white">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                          </button>
                          <p class="text-sm font-weight-normal mb-2"> <b>Paso 1:</b> Subir Archivo</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <button class="btn bg-warning shadow text-center text-white">
                            <i class="fa-regular fa-square-check"></i>
                          </button>
                          <p class="text-sm font-weight-normal mb-2"> <b>Paso 2:</b> Validar Archivo</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <button class="btn bg-success shadow text-center text-white">
                            <i class="fa-regular fa-floppy-disk"></i>
                          </button>
                          <p class="text-sm font-weight-normal mb-2"> <b>Paso 3:</b> Guardar en la Base de Datos</p>
                        </div>
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
                    <div class="mt-3 d-flex justify-content-end">
                      <button type="button" class="btn btn-info">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        Subir Archivo
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="example2" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Archivos</th>
                          <th class="text-center">Fecha de Subida</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr class="text-center">
                          <td>general-file-1613669186365.xlsx</td>
                          <td> 2022-08-16 10:54:57</td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Guardado</span>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="Validar">
                              <i class="fa-regular fa-square-check"></i>
                            </a>
                            <a href="#" class="btn text-white bg-success" data-bs-toggle="tooltip" data-bs-title="Guardar">
                              <i class="fa-regular fa-floppy-disk"></i>
                            </a>
                            <a href="#" class="btn text-white bg-danger" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        <tr class="text-center">
                          <td>general-file-1613669186365.xlsx</td>
                          <td> 2022-08-16 10:54:57</td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Guardado</span>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="Validar">
                              <i class="fa-regular fa-square-check"></i>
                            </a>
                            <a href="#" class="btn text-white bg-success" data-bs-toggle="tooltip" data-bs-title="Guardar">
                              <i class="fa-regular fa-floppy-disk"></i>
                            </a>
                            <a href="#" class="btn text-white bg-danger" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                          </td>
                        </tr>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Archivos</th>
                          <th class="text-center">Fecha de Subida</th>
                          <th class="text-center">Estado</th>
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
          // # Opcion 3
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">
            <!-- Datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <div class="px-1">
                        <button type="button" class="btn btn-outline-info">Eliminar Seleccionados</button>
                        <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="tabla_seguimientos" data-name="seguimiento.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Leido</th>
                          <th class="text-center">Visto</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">

                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Leido</th>
                          <th class="text-center">Visto</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Detalles -->
            <div class="col-12 col-md-9 mx-auto position-relative mt-6">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0 fs-4">Datos del seguimiento</h6>
                </div>
                <div class="card-body pt-4 p-3">

                  <div class="row">
                    <div class="d-flex align-items-stretch">
                      <div class="d-flex flex-column seguimiento_detalles"></div>
                      <div class="ms-auto text-end">
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0 mostrar_detalles" data-id="" href="#!">
                          <i class="material-icons text-sm me-2">delete</i>
                          Cerrar
                        </a>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <form id="seguimiento">
                      <h6 class="mb-0 fs-4">Detalles del Seguimiento</h6>
                      <div class="form-group d-flex">
                        <div class="col-6 px-2 my-4">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Atributo</label>
                            <select name="seguimiento_atributo" id="seguimiento_atributo" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-6 px-2 my-4">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Nombre</label>
                            <input type="text" class="form-control" name="seguimiento_nombre" id="seguimiento_nombre" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 text-end mb-4">
                        <a href="#" class="btn bg-gradient-success mb-0 me-2" id="guardar_seguimiento">Agregar</a>
                        <input type="hidden" class="" name="sid_alumno" id="sid_alumno" value="">
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>


                      <div class="input-group input-group-dynamic mb-4">
                        <label class="input-group">Observacion</label>
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-success mb-0" type="button" id="button-addon2">
                          <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                      </div>
                    </form>
                  </div>

                  <!-- Table -->
                  <div class="row">
                    <div class="table-responsive">
                      <table id="tabla_segui_atributo" data-name="" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                      <button type="button" name="button" class="btn btn-danger m-0">Cancelar</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

          <?php
          // # Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">
            <!-- Datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="table-responsive">
                    <table id="example4" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Responsable</th>
                          <th class="text-center">Fecha de Eliminación</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>APLICACIÓN ESCOLAR PRO </td>
                          <td>VANESSA ZEPEDA MEBARAK </td>
                          <td>KEVIN ZEPEDA </td>
                          <td>2023-03-31 00:13:06 </td>
                          <td>APLICACIÓN ESCOLAR PRO </td>
                          <td>2023-03-31 00:13:06 </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Responsable</th>
                          <th class="text-center">Fecha de Eliminación</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

        <?php
        //- Modales
        ?>
        <!-- Cargar Archivo -->
        <div class="modal fade" id="seguimientoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Cómo cargar el archivo?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>El Archivo debe tener las siguientes cabeceras:</p>
                <ul>
                  <li>Matricula</li>
                  <li>Observaciones</li>
                  <li>NombreEvaluación1</li>
                  <li>NombreEvaluacion2</li>
                  <li>...</li>
                  <li>NombreEvaluacionN</li>
                </ul>
                <p>Puede descargar el siguiente archivo base para cargar su información.</p>
                <a href="https://api.aplicacionescolar.net/general/general-file-1613669186365.xlsx" target="_blank" rel="noopener noreferrer" class="btn btn-success">
                  <i class="fa-solid fa-file-excel"></i>
                  Archivo Base
                </a>
                <p>A continuación una foto de como debería verse el archivo al final:</p>
                <img src="https://aplicacionescolar.net/static/media/seguimientos.ac90d18c.png" alt="calificaciones_image" style="width: 95%; padding: 2%;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
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
  include_once('../templates/script.php');
  ?>
  <!-- Scripts -->
</body>

</html>