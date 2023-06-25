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
                      Calificaciones
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Cargar Calificaciones
                    </a>
                  </li>

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

            <!-- Datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <div class="px-5">
                        <button type="button" class="btn btn-outline-danger">Eliminar Seleccionados</button>
                        <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                      </div>
                    </div>
                  </div>
                  <table id="example4" class="table table-striped" style="width:100%">
                    <thead>
                      <tr class="text-center">
                        <th class="text-center">Seleccionar</th>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Ciclo</th>
                        <th class="text-center">Nivel</th>
                        <th class="text-center">Grado</th>
                        <th class="text-center">Grupo</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td>
                          <div class="d-flex align-items-center justify-content-center">
                            <div class="form-check is-filled">
                              <input class="form-check-input" type="checkbox" id="customCheck1">
                            </div>
                          </div>
                        </td>
                        <td>Luis</td>
                        <td>2022-2023</td>
                        <td>PREESCOLAR</td>
                        <td>KINDER 1</td>
                        <td>A</td>
                        <td>
                          <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Generar reporte">
                            <i class="fa-regular fa-file"></i>
                          </a>
                          <a href="#" class="btn text-white bg-danger" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          <div class="d-flex align-items-center justify-content-center">
                            <div class="form-check is-filled">
                              <input class="form-check-input" type="checkbox" id="customCheck1">
                            </div>
                          </div>
                        </td>
                        <td>Luis</td>
                        <td>2022-2023</td>
                        <td>PREESCOLAR</td>
                        <td>KINDER 1</td>
                        <td>A</td>
                        <td>
                          <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="Generar reporte">
                            <i class="fa-regular fa-file"></i>
                          </a>
                          <a href="#" class="btn text-white bg-danger" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-center">Seleccionar</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Correo Eléctronico</th>
                        <th class="text-center">Inició sesión</th>
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

            <!-- Form -->
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
                    <table id="example" class="table table-striped" style="width:100%">
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
                  <li>Promedio general</li>
                  <li>Final</li>
                  <li>Ciclo</li>
                  <li>Periodo</li>
                  <li>Materia 1</li>
                  <li>Materia 2</li>
                </ul>
                <p>Puede descargar el siguiente archivo base para cargar su información.</p>
                <a href="https://api.aplicacionescolar.net/general/general-file-1601304456015.xlsx" target="_blank" rel="noopener noreferrer" class="btn btn-success">
                  <i class="fa-solid fa-file-excel"></i>
                  Archivo Base
                </a>
                <p>A continuación una foto de como debería verse el archivo al final:</p>
                <img src="/static/media/extras.64399ba0.png" alt="calificaciones_image" style="width: 90%; padding: 2%;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- Content -->

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