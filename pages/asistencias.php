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
                      Listar asistencias
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Listar estudiantes
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option3" aria-selected="false">
                      Listar scanners
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option4" aria-selected="false">
                      Nuevo scanner
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

            <!-- Form - Filtrar -->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Listar Asistencias</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-2">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Desde</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Hasta</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <!-- Select - option -->
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Nivel</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <!-- Select - option -->
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Grado</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <!-- Select - option -->
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Grupo</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mt-3" align="right">
                        <button class="btn bg-gradient-success mb-0 me-2" type="button" name="button">Filtrar</button>
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
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Fecha y Hora</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Registrado por</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>KEVIN ZEPEDA</td>
                          <td>PREESCOLAR</td>
                          <td>KINDER 1 </td>
                          <td>A</td>
                          <td>2022-11-03 09:51:25 </td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Ingreso</span>
                          </td>
                          <td>AV. HIDALGO ZEPEDA</td>
                        </tr>
                        <tr class="text-center">
                          <td>KEVIN ZEPEDA</td>
                          <td>PREESCOLAR</td>
                          <td>KINDER 1 </td>
                          <td>A</td>
                          <td>2022-11-03 09:51:25 </td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Ingreso</span>
                          </td>
                          <td>AV. HIDALGO ZEPEDA</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Estudiante</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Fecha y Hora</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Registrado por</th>
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

            <!-- Form -->
            <div class="col-xl-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Filtrar mensajes</h6>
                  <div class="row align-items-center">
                    <div class="col-lg-3">
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Nivel</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Grado</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Grupo</label>
                        <select name="" id="" class="form-control" aria-label="Default select example">
                          <option selected>Selecciona una opción</option>
                          <option value="1">opt1 </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mt-3 text-end">
                        <button class="btn bg-gradient-success mb-0 me-2" type="button" name="button">Filtrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Table -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <button type="button" class="btn btn-outline-info">Descargar QRs</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="example2" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Matrícula</th>
                          <th>Padre</th>
                          <th>Sexo</th>
                          <th>Nivel</th>
                          <th>Grado</th>
                          <th>Grupo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>ivan</td>
                          <td>sanchez vargas</td>
                          <td>1110IISO88</td>
                          <td>juanito perez perez</td>
                          <td>M</td>
                          <td>PRIMARIA</td>
                          <td>PRIMERO</td>
                          <td>A</td>
                          <td>
                            <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="QR">
                              <i class="fa-solid fa-qrcode"></i>
                            </a>
                            <a class="btn text-white bg-secondary" data-bs-toggle="tooltip" data-bs-title="Detalles">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Matrícula</th>
                          <th>Padre</th>
                          <th>Sexo</th>
                          <th>Nivel</th>
                          <th>Grado</th>
                          <th>Grupo</th>
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

                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example6" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Fecha y Hora</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Registrado por</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>2023-01-18 10:23:11</td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Ingreso</span>
                          </td>
                          <td>AV. HIDALGO ZEPEDA</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Fecha y Hora</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Registrado por</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="mt-4 text-end">
                        <button class="btn bg-gradient-danger mb-0 me-2" type="button" name="button">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <?php
          //? Opcion 3
          ?>

          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">

            <!-- Table -->
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header">

                  <div class="table-responsive">
                    <table id="tabla_scanner" data-name="scanner.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Correo Electrónico</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Institucion</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Correo Electrónico</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Institucion</th>
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
          //? Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">

            <!-- Formulario -->
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Registrar un scanner</h5>

                  <form id="scanner">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Nombres</label>
                          <input type="text" class="form-control w-100" name="nombre_scanner" id="nombre_scanner" aria-describedby="emailHelp"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Apellidos</label>
                          <input type="text" class="form-control w-100" name="app_scanner" id="app_scanner" aria-describedby="emailHelp"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Correo electrónico</label>
                          <input type="email" class="form-control w-100" name="correo_scanner" id="correo_scanner" aria-describedby="emailHelp"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="form-label">Usuario</label>
                              <input type="text" class="form-control w-100" name="user_scanner" id="user_scanner" aria-describedby="emailHelp"
                                onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="form-label">Contraseña</label>
                              <input type="password" class="form-control w-100" name="ctr_scanner" id="ctr_scanner" aria-describedby="emailHelp"
                                onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mt-4" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_scanner">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </form>

                </div>
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