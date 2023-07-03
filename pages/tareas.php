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
                  <h6 class="font-weight-bolder">Tareas</h6>
                  <div class="row align-items-center">
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
                      <br>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Profesor</label>
                        <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
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
                      <button type="button" class="btn btn-outline-success">Exportar Excelent</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="example5" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">URLS</th>
                          <th class="text-center">Archivos</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Creado</th>
                          <th class="text-center">Materia</th>
                          <th class="text-center">Profesor</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>
                            <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="URL">
                              <i class="fa-solid fa-link mx-2"></i>0
                            </a>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-primary" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                              <i class="fa-solid fa-paperclip mx-2"></i>0
                            </a>
                          </td>
                          <td>PREESCOLAR</td>
                          <td>MATERNAL</td>
                          <td>A</td>
                          <td>2023-02-08 12:16:24</td>
                          <td>ARTES</td>
                          <td>Isabel Hernandez</td>
                          <td>
                            <a href="#" class="btn text-white bg-secondary" data-bs-toggle="tooltip" data-bs-title="Detalles">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="#" class="btn text-white bg-danger" data-bs-toggle="tooltip" data-bs-title="Eliminar">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">URLS</th>
                          <th class="text-center">Archivos</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Creado</th>
                          <th class="text-center">Materia</th>
                          <th class="text-center">Profesor</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Detalles -->
            <!-- Detalles Usuario -->
            <div class="col-9 mx-auto position-relative mt-6">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0 fs-4">Detalle de la tarea</h6>
                </div>

                <div class="card-body pt-4 p-3">
                  <div class="row">
                    <div class="d-flex">

                      <ul class="list-group col-12 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column">
                            <span class="mb-2 text-sm">Materia: <span class="text-dark font-weight-bold ms-sm-2">Edicación Fisíca</span></span>
                            <span class="mb-2 text-sm">Preescolar: <span class="text-dark ms-sm-2 font-weight-bold">mensualidad</span></span>
                            <span class="mb-2 text-sm">Grado: <span class="text-dark ms-sm-2 font-weight-bold">1110IIS087</span></span>
                            <span class="mb-2 text-sm">Grupo: <span class="text-dark ms-sm-2 font-weight-bold"> VANESSA ZEPEDA MEBARAK </span></span>
                            <span class="mb-2 text-sm">Mensaje de Tarea: <span class="text-dark ms-sm-2 font-weight-bold"> Colorear pag 3 </span></span>
                          </div>

                        </li>
                      </ul>


                    </div>
                  </div>
                </div>

                <div class="py-3">
                  <div class="card-header pb-0 px-3 mb-3">
                    <h6 class="mb-0 fs-4">Estudiantes a los que se envió la tarea</h6>

                    <div class="row py-4 mx-2 bg-gray-100 border-radius-lg oculto">
                      <div class="col-lg-3">
                        <br>
                        <span class="mb-2 text-sm">Materia: <span class="text-dark font-weight-bold ms-sm-2">Edicación Fisíca</span></span>
                        <br>
                        <span class="mb-2 text-sm">Alumno: <span class="text-dark ms-sm-2 font-weight-bold">KEVIN ZEPEDA</span></span>
                      </div>
                      <div class="col-lg-4">
                        <!-- Select - option -->
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Estado</label>
                          <select name="" id="" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">Revisado </option>
                            <option value="1">Revisado con observación</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <br>
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Observaciones</label>
                          <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                          <blockquote class="text-sm"><b>Nota: </b> la observación no puede sobrepasar los 70 caractéres.</blockquote>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="mt-3 d-flex justify-content-end">
                          <button class="btn bg-gradient-danger mb-0 me-2 btnOcultar" type="button" name="button">Cerrar</button>
                          <button class="btn bg-gradient-success mb-0 me-2" type="button" name="button">Enviar revisión</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="px-4">
                    <div class="table-responsive">
                      <table id="example6" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">Alumno</th>
                            <th class="text-center">Imagenes</th>
                            <th class="text-center">Documentos</th>
                            <th class="text-center">Mensaje</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Observación</th>
                            <th class="text-center">Creado</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td>Monica Orive </td>
                            <td>
                              <a href="#" class="btn text-white bg-info" data-bs-toggle="tooltip" data-bs-title="imgane">
                                <i class="fa-solid fa-link mx-2"></i>0
                              </a>
                            </td>
                            <td>
                              <a href="#" class="btn text-white bg-primary" data-bs-toggle="tooltip" data-bs-title="Adjunto">
                                <i class="fa-solid fa-paperclip mx-2"></i>0
                              </a>
                            </td>
                            <td>Mensaje</td>
                            <td><span class="badge badge-sm bg-gradient-secondary">Pendiente</span></td>
                            <td>A</td>
                            <td>2023-02-08 12:16:24</td>
                            <td>
                              <a href="#" class="bg-success shadow border-radius-md p-2 table_button text-white btnMostrar" data-bs-toggle="tooltip" data-bs-original-title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-center">Alumno</th>
                            <th class="text-center">Imagenes</th>
                            <th class="text-center">Documentos</th>
                            <th class="text-center">Mensaje</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Observación</th>
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