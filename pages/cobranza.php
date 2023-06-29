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
        //- Submenu
        ?>
        <div class="container-fluid mt-4">
          <div class="align-items-center">
            <div class="col-sm-12 col-lg-7">
              <div class="nav-wrapper position-relative">

                <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#option1" role="tab" aria-selected="false">
                      Registro de cobranzas
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Cargar cobranza
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option3" aria-selected="false">
                      Nuevo pago
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option4" aria-selected="false">
                      Modificar penalidad
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
        //- Opciones
        ?>
        <div class="col-12 mt-4 tab-content" role="tablist">

          <?php
          //# Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <!--filtro-->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Filtrar mensajes</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Desde</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Hasta</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Estado</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="mt-3" align="right">
                        <button class="btn btn-success mb-0 me-2" type="button" name="button">Filtrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <button type="button" class="btn btn-outline-danger">Eliminar Seleccionados</button>
                      <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="tabla_pagos" data-name="pago.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Seccionar</th>
                          <th class="text-center">Concepto</th>
                          <th class="text-center">Matrícula</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Monto</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Modo</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Seccionar</th>
                          <th class="text-center">Concepto</th>
                          <th class="text-center">Matrícula</th>
                          <th class="text-center">Padre</th>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Monto</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Modo</th>
                          <th class="text-center">Enviado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <!-- Detalles Usuario -->
            <div class="col-9 mx-auto position-relative mt-6">
              <div class="card oculto">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0 fs-4">Datos del Pago</h6>
                </div>

                <div class="card-body pt-4 p-3">
                  <div class="row">
                    <div class="d-flex">

                      <ul class="list-group col-6 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column datos_pago">
                            <span class="mb-2 text-sm">Código: <span class="text-dark font-weight-bold ms-sm-2">dd1eba43fdaea8ae4cddf7b402598c9e</span></span>
                            <span class="mb-2 text-sm">Concepto: <span class="text-dark ms-sm-2 font-weight-bold">mensualidad</span></span>
                            <span class="mb-2 text-sm">Matrícula: <span class="text-dark ms-sm-2 font-weight-bold">1110IIS087</span></span>
                            <span class="mb-2 text-sm">Tutor: <span class="text-dark ms-sm-2 font-weight-bold"> VANESSA ZEPEDA MEBARAK </span></span>
                            <span class="mb-2 text-sm">Estudiante: <span class="text-dark ms-sm-2 font-weight-bold"> KEVIN ZEPEDA </span></span>
                            <span class="mb-2 text-sm">Tipo: <span class="text-dark ms-sm-2 font-weight-bold"> Manual </span></span>
                          </div>

                        </li>
                      </ul>

                      <ul class="list-group col-6 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column datos_pago_extra">
                            <span class="mb-2 text-sm">Modo de pago: <span class="text-dark ms-sm-2 font-weight-bold">Monto</span></span>
                            <span class="mb-2 text-sm">Monto: <span class="text-dark ms-sm-2 font-weight-bold"> 1113.00 </span></span>
                            <span class="mb-2 text-sm">Penalidad: <span class="text-dark ms-sm-2 font-weight-bold"> 0.00 </span></span>
                            <span class="mb-2 text-sm">Monto total: <span class="text-dark ms-sm-2 font-weight-bold"> 1113 </span></span>
                            <span class="mb-2 text-sm">Estado: <span class="text-dark ms-sm-2 font-weight-bold"> <span class="badge badge-sm bg-gradient-warning">En espera</span> </span></span>
                            <span class="mb-2 text-sm">Enviado: <span class="text-dark ms-sm-2 font-weight-bold"> 2022-05-09 16:54:58 </span></span>
                          </div>

                          <div class="ms-auto text-end">
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0 mostrar_detalles" data-id="" href="javascript:;">
                              <i class="material-icons text-sm me-2">delete</i>
                              Cerrar
                            </a>
                          </div>

                        </li>
                      </ul>

                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <?php
          //# Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">

            <!-- Formulario - Pasos-->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                    <div>
                      <h5 class="font-weight-bolder">Como subir un archivo</h5>
                      <p class="text-sm">Los pasos para subir un archivo son los siguientes:</p>
                    </div>
                    <div>
                      <button type="button" class="btn bg-secondary text-white" data-bs-toggle="modal" data-bs-target="#archivoModal">
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
                            <span class="badge badge-sm bg-gradient-secondary">Subido</span>
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
          //# Opcion 3
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">

            <!-- Formulario -->
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Registrar un Pago</h5>

                  <form id="pago">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Matrícula</label>
                          <input type="text" class="form-control w-100" name="pago_matricula" id="pago_matricula" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Modo de Pago</label>
                          <input type="text" class="form-control w-100" name="pago_modo" id="pago_modo" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Concepto</label>
                          <input type="email" class="form-control w-100" name="pago_concepto" id="pago_concepto" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Monto</label>
                          <input type="email" class="form-control w-100" name="pago_monto" id="pago_monto" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" name="penalidad" id="penalidad" value="" checked="">
                          <label class="custom-control-label" for="customCheck1">AGREGAR PENALIDAD(10.00%)</label>
                        </div>
                        <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" name="status" id="status" value="" checked="">
                          <label class="custom-control-label" for="customCheck1">PAGADO</label>
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_pago">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

          <?php
          //? Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">

            <!-- Formulario -->
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Modificar penalidad</h5>

                  <div class="row">
                    <div class="col-lg-10">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Penalidad</label>
                        <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="mt-3" align="right">
                        <button class="btn bg-gradient-success mb-0 me-2" type="button" name="button">Enviar</button>
                      </div>
                    </div>
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
        <div class="modal fade" id="archivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <li>Concepto</li>
                  <li>Monto</li>
                </ul>
                <p>Puede descargar el siguiente archivo base para cargar su información.</p>
                <a href="https://api.aplicacionescolar.net/general/general-file-1613669186365.xlsx" target="_blank" rel="noopener noreferrer" class="btn btn-success">
                  <i class="fa-solid fa-file-excel"></i>
                  Archivo Base
                </a>
                <p>A continuación una foto de como debería verse el archivo al final:</p>
                <img src="https://aplicacionescolar.net/static/media/usuariosDB.5b3d1a14.png" alt="calificaciones_image" style="width: 95%; padding: 2%;">
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