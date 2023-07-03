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
                      Niveles, Grados, Grupos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Configuración de ciclos
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php
        //# Opciones 1
        ?>
        <div class="col-12 mt-4 tab-content" role="tablist">

          <?php
          //? Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <div class="row">
              <div class="col-xl-6 mt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="font-weight-bolder">Agregar Nivel</h5>
                    <form id="niveles">
                      <div class="row align-items-center">
                        <div class="col-lg-12">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="form-label">Nombre</label>
                            <input type="email" class="form-control w-100" aria-describedby="emailHelp" id="nombre_nivel" name="nombre_nivel" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                        <div class="mt-3" align="right">
                          <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_nivel">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-xl-6 mt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="font-weight-bolder">Agregar Grupo</h5>

                    <form id="grupos">
                      <div class="row align-items-center">
                        <div class="col-lg-12">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="form-label">Nombre</label>
                            <input type="email" class="form-control w-100" aria-describedby="emailHelp" id="nombre_grupo" name="nombre_grupo" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                        <div class="mt-3" align="right">
                          <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_grupo">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>


            <div class="row">

              <div class="col-12 col-md-6 mt-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="font-weight-bolder mb-4 mt-2">Niveles</h5>
                    <div class="table-responsive">
                      <table id="tabla_niveles" data-name="nivel.php" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 mt-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="font-weight-bolder mb-4 mt-2">Grupos</h5>
                    <div class="table-responsive">
                      <table id="tabla_grupos" data-name="grupo.php" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 mt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="font-weight-bolder">Agregar Grado</h5>

                    <form id="grados">
                      <div class="row align-items-center">
                        <div class="col-lg-6">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Nivel</label>
                            <select name="sid_nivel" id="sid_nivel" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                              <option value="1">Nivel </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="form-label">Nombre</label>
                            <input type="email" class="form-control w-100" aria-describedby="emailHelp" id="nombre_grado" name="nombre_grado" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                        <!--<div class="col-lg-4">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="form-label">Orden</label>
                            <input type="email" class="form-control w-100" aria-describedby="emailHelp" id="orden_grado" name="orden_grado" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>-->
                        <div class="mt-3" align="right">
                          <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_grado">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
              
              <div class="col-12 mt-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="font-weight-bolder mb-4 mt-2">Grados</h5>
                    <div class="table-responsive">
                      <table id="tabla_grados" data-name="grado.php" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <!--<th class="text-center">Orden</th>-->
                            <th class="text-center">Nivel</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                         
                        </tbody>
                        <tfoot>
                          <tr>
                            <!--<th class="text-center">Orden</th>-->
                            <th class="text-center">Nivel</th>
                            <th class="text-center">Nombre</th>
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
          //? Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">
            <!-- Form -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Agregar Ciclo</h5>
                  <form id="ciclos">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Ciclo</label>
                          <input type="text" class="form-control w-100" aria-describedby="emailHelp" id="nombre_ciclo" name="nombre_ciclo" onfocus="focused(this)" onfocusout="defocused(this)">
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

            <!-- datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">

                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3 d-flex justify-content-end">
                      <button type="button" class="btn btn-info">
                        Pasar ciclo
                      </button>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table id="tabla_ciclos" data-name="ciclo.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Ciclo</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">

                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Ciclo</th>
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