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
                      Extracurriculares
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Cargar extracurriculares
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
          //? Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <!-- Form -->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Extracurriculares</h5>

                  <form id="extracurriculares">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Nombre</label>
                          <input type="text" class="form-control w-100" id="nombre_extracurriculares" name="nombre_extracurriculares" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_extracurriculares">Agregar</a>
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
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="tabla_extracurriculares" data-name="extracurricular.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">N° Estudiantes</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Acciones</th>
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
                  <h6 class="mb-0 fs-4">Editar un extracurricular</h6>
                </div>
                <div class="card-body pt-4 p-3">

                  <div class="row">
                    <div class="d-flex align-items-stretch">

                      <ul class="list-group col-12 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column extracurricular_detalle" id="">

                          </div>

                        </li>
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0 mostrar_detalles" data-id="" href="#!">
                          <i class="material-icons text-sm me-2">delete</i>
                          Cerrar
                        </a>
                      </ul>

                    </div>
                  </div>

                  <div class="row">
                    <form id="alumno_extracurricular">
                      <h6 class="mb-0 fs-4">Estudiantes</h6>
                      <div class="form-group d-flex">
                        <div class="col-12 px-2 my-4">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Agregar estudiante</label>
                            <select name="extra_estudiante" id="extra_estudiante" class="form-control" aria-label="Default select example">
                              <option selected>Estudiante</option>
                            </select>
                          </div>
                          <div class="mt-3" align="right">
                            <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_extra_alumno">Agregar</a>
                            <!-- <input type="hidden" class="id_modificar" name="id_modificar" value=""> -->
                            <input type="hidden" class="sid_extracurricular" name="sid_extracurricular" id="sid_extracurricular" value="">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <!-- table -->
                  <div class="row">
                    <div class="card-body pt-2">
                      <div class="row mt-4">
                        <div class="table-responsive">
                          <table id="tabla_alumno_extracurricular" data_name="" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellidos</th>
                                <th class="text-center">Matricula</th>
                                <th class="text-center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody class="text_center">

                            </tbody>
                            <tfoot>
                              <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellidos</th>
                                <th class="text-center">Matricula</th>
                                <th class="text-center">Acciones</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>

                      </div>
                      <div class="d-flex justify-content-end mt-4">
                        <button type="button" name="button" class="btn btn-danger m-0">Cancelar</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <?php
          //? Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">

            <!-- tutorial -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                    <div>
                      <h5 class="font-weight-bolder">Como subir un archivo</h5>
                      <p class="text-sm">Los pasos para subir un archivo son los siguientes:</p>
                    </div>
                    <div>
                      <button type="button" class="btn bg-secondary text-white" data-bs-toggle="modal" data-bs-target="#ayuda">
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

      </div>
      <!-- Cargar Archivo -->
      <div class="modal fade" id="ayuda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <li>Extra 1</li>
                <li>Extra 2</li>
                <li>Extra 3</li>
                <li>...</li>
                <li>Extra N</li>
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