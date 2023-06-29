<?php
$datatable = true;
include_once('../templates/header.php');
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
                      Materias
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Asignación de Materias
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
          //? Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">

            <!-- addMateria - Form -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">

                  <form id="materia">
                    <h5 class="font-weight-bolder">Agregar Materia</h5>
                    <div class="row align-items-center">
                      <div class="col-lg-5">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Nombre</label>
                          <input type="text" class="form-control w-100" name="materia_nombre" id="materia_nombre" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Grupo</label>
                          <input type="text" class="form-control w-100" name="materia_grupo" id="materia_grupo" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="mt-3" align="center">
                          <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_materia">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            <!-- Datatable -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="table-responsive">
                    <table id="tabla_materia" data-name="materia.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr class="text-center">
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Código</th>
                          <th class="text-center">Grupos Asignados</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Código</th>
                          <th class="text-center">Grupos Asignados</th>
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

            <!-- addPadre - Form -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">

                  <form id="asignar_materia">
                    <h5 class="font-weight-bolder">Asignar Materia</h5>
                    <div class="row align-items-center">
                      <div class="col-lg-3">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Seleccione un profesor</label>
                          <select name="asignar_profesor" id="asignar_profesor" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">Padre 1</option>
                            <option value="2">Padre 2</option>
                            <option value="3">Padre 3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Seleccione una materia</label>
                          <select name="asignar_materias" id="asignar_materia" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">Español</option>
                            <option value="2">Matematicas</option>
                            <option value="3">Ciencias</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Nivel</label>
                          <select name="asignar_nivel" id="asignar_nivel" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">Primaria </option>
                            <option value="2">Secundaria </option>
                            <option value="3">Prepa</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Grado</label>
                          <select name="asignar_grado" id="asignar_grado" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">1 </option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Grupo</label>
                          <select name="asignar_grupo" id="asignar_grupo" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">A </option>
                            <option value="2">B </option>
                            <option value="3">C </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="mt-3" align="right">
                          <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_asignar_materia">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
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
                  <div class="table-responsive">
                    <table id="tabla_asignar_materia" data-name="asignar_materia.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Nivel - Grado - Grupo</th>
                          <th class="text-center">Materia</th>
                          <th class="text-center">Profesor</th>
                          <th class="text-center">Tareas Asignadas</th>
                          <th class="text-center">Creado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Nivel - Grado - Grupo</th>
                          <th class="text-center">Materia</th>
                          <th class="text-center">Profesor</th>
                          <th class="text-center">Tareas Asignadas</th>
                          <th class="text-center">Creado</th>
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