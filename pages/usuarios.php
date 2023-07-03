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
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" role="tab" href="#option1" aria-selected="false">
                      Cargar Bases de Datos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option2" aria-selected="false">
                      Listar Usuarios
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option3" aria-selected="false">
                      Listar Roles
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option4" aria-selected="false">
                      Listar Padres
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option5" aria-selected="false">
                      Listar Estudiantes
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" href="#option6" aria-selected="false">
                      Cargar Fotografías
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
          //# Opcion 1
          ?>
          <div class="my-4 tab-pane fade show active" role="tabpanel" id="option1">
            <!-- Formulario - Pasos-->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 col-md-9 col-lg-9"> <!-- Agregar 1 -->
                      <h5 class="font-weight-bolder">Como subir un archivo</h5>
                      <p class="text-sm">Los pasos para subir un archivo son los siguientes:</p>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3"><!-- Agregar 2 y col-12 ↓↓↓ -->
                      <button type="button" class="btn bg-secondary text-white col-12" data-bs-toggle="modal" data-bs-target="#archivoModal">
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

          <?php
          //# Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">

            <!--Add Usuario-->
            <div class="col-xl-12 my-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <h6 class="font-weight-bolder">Agregar Usuario</h6>

                  <form id="usuarios">
                    <div class="row align-items-center">
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Nombre</label>
                          <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Apellido</label>
                          <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic my-3">
                          <label class="input-group">Email</label>
                          <input type="text" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Password</label>
                          <input type="password" class="form-control" name="contrasena" id="contrasena" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Confirmar Password</label>
                          <input type="password" class="form-control" id="" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="input-group">Rol</label>
                          <select name="sid_rol" id="sid_rol" class="form-control" aria-label="Default select example">
                            <option selected>Selecciona una opción</option>
                            <option value="1">Rol </option>
                            <option value="o58v1">Profesor</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-12 d-flex justify-content-end">
                        <div class="mt-3">
                          <a href="#!" class="btn bg-gradient-success mb-0" id="guardar">Agregar</a>
                          <input type="hidden" class="id_modificar" name="id_modificar" value="">
                        </div>
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

                  <div class="table-responsive">
                    <table id="tabla_usuarios" data-name="usuario.php" class="table table-striped display" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Correo Electrónico</th>
                          <th class="text-center">Rol</th>
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
                          <th class="text-center">Rol</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Detalles Usuario -->
            <div class="col-12 col-md-9 mx-auto position-relative mt-6">
              <div class="card oculto">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0 fs-4">Datos de Usuario</h6>
                </div>

                <div class="card-body pt-4 p-3">
                  <div class="row">
                    <div class="d-flex align-items-stretch">

                      <ul class="list-group col-12 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">


                          <div class="d-flex flex-column usuario_detalles">
                          </div>

                          <div class="ms-auto text-end">
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0 mostrar_detalles" data-id="" href="#!">
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
          //! Opcion 3 - Pendiente
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">

            <!-- Formulario -->
            <div class="mt-3 mb-6 col-lg-12">

              <form id="rol">
                <div class="card">
                  <div class="card-body d-flex flex-wrap">
                    <div class="col-md-11 col-12 px-3">
                      <div class="input-group input-group-dynamic mt-3">
                        <label class="input-group">Nombre del rol</label>
                        <input type="text" class="form-control" name="nombre_rol" id="nombre_rol" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                    </div>
                    <div class="col-1 d-flex ">
                      <div class="mt-5">
                        <input type="submit" class="btn bg-gradient-success mb-0" value="Agregar">
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </form>

            </div>

            <!-- Table -->
            <div class="card mt-4" id="roles">
              <div class="card-header">
                <h5>Listar Roles</h5>
              </div>
              <div class="card-body pt-0">

                <div id="tabla_rol" data-name="rol.php" class="table-responsive">
                  <table class="mb-0 roles">
                    <thead class="pb-2">
                      <tr>
                        <th class="ps-1" colspan="4">
                          <p class="mb-0">Nombre</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Usuarios usandolo</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Estadísticas</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Usuarios y padres</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Mensajes</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Calendario</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Extracurriculares</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Seguimientos</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Calificaciones</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Materias</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Asistencias</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Cobranza</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Tareas</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Configuraciones</p>
                        </th>
                        <th class="text-center">
                          <p class="mb-0">Acciones</p>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>

          </div>

          <?php
          //? Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">

            <!-- addPadre - Form -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Agregar Padre</h5>
                  <form id="padres">
                    <div class="row align-items-center">
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Nombres</label>
                          <input type="text" class="form-control w-100" aria-describedby="emailHelp" id="nombre_padre" name="nombre_padre" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Apellidos</label>
                          <input type="text" class="form-control w-100" aria-describedby="emailHelp" id="apellido_padre" name="apellido_padre" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group input-group-dynamic mt-3">
                          <label class="form-label">Correo Electrónico</label>
                          <input type="email" class="form-control w-100" aria-describedby="emailHelp" id="correo_padre" name="correo_padre" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_padres">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
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
                  <div class="col-12 mt-2 mb-4">
                    <div class="mt-3" align="right">
                      <div class="px-1">
                        <button type="button" class="btn btn-outline-danger eliminar_fila_multiple">Eliminar Seleccionados</button>
                        <button type="button" class="btn btn-outline-success">Exportar Excel</button>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="tabla_padres" data-name="padre.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Correo Eléctronico</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr class="text-center">
                          <td>
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="form-check is-filled">
                                <input class="form-check-input" type="checkbox" id="customCheck1">
                              </div>
                            </div>
                          </td>
                          <td>Luis</td>
                          <td>REBOLLAR TOVAR</td>
                          <td>soporte@appescolarv4.com</td>
                          <td>
                            <a class="btn text-white bg-info btnMostrar" data-bs-toggle="tooltip" data-bs-title="Asignar un hijo">
                              <i class="fa-solid fa-user-tag"></i>
                            </a>
                            </a>
                            <a class="btn text-white bg-secondary" data-bs-toggle="tooltip" data-bs-title="Detalles">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="#" class="btn text-white bg-success" data-bs-toggle="tooltip" data-bs-title="Editar">
                              <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="QR">
                              <i class="fa-solid fa-qrcode"></i>
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
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Asignar un hijo -->
            <div class="col-12 col-md-9 mx-auto position-relative mt-6 oculto">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Asignar un hijo</h5>
                  <div class="row align-items-center">
                    <div class="row mt-4 col-12">
                      <div class="form-group d-flex flex-wrap">
                        <div class="col-12 col-lg-4 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Nombres</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                        <div class="col-12 col-lg-4 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Apellidos</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                        <div class="col-12 col-lg-4 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Matricula</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4 col-12">
                      <div class="form-group d-flex flex-wrap">
                        <div class="col-12 col-lg-3 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Sexo</label>
                            <select name="" id="" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                              <option value="1">Masculino </option>
                              <option value="1">Femenino </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 col-lg-3 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Nivel</label>
                            <select name="" id="" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                              <option value="1">Rol </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 col-lg-3 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Grado</label>
                            <select name="" id="" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                              <option value="1">Rol </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 col-lg-3 px-2">
                          <div class="input-group input-group-dynamic mt-3">
                            <label class="input-group">Grupo</label>
                            <select name="" id="" class="form-control" aria-label="Default select example">
                              <option selected>Selecciona una opción</option>
                              <option value="1">Rol </option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                      <button type="button" name="button" class="btn btn-danger m-2 btnOcultar">Cerrar</button>
                      <button type="button" name="button" class="btn btn-success m-2">Guardar</button>
                    </div>


                  </div>
                </div>
              </div>
            </div>

            <!-- Detalles 2 -->
            <div class="col-12 col-md-9 mx-auto position-relative mt-6">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0 fs-4">Datos del padre</h6>
                </div>
                <div class="card-body pt-4 p-3">

                  <div class="row">
                    <div class="d-flex align-items-stretch">

                      <ul class="list-group col-12 col-md-12 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <span class="mb-2 text-sm">Nombres: <span class="text-dark ms-sm-2 font-weight-bold">Adrian</span></span>
                            <span class="mb-2 text-sm">Apellidos: <span class="text-dark font-weight-bold ms-sm-2">REBOLLAR TOVAR</span></span>
                            <span class="mb-2 text-sm">Correo electrónico: <span class="text-dark font-weight-bold ms-sm-2">soporte@appescolarv4.com</span></span>
                            <span class="mb-2 text-sm">Creado: <span class="text-dark font-weight-bold ms-sm-2">2021-08-16 10:11:00</span></span>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="list-group col-12 col-md-12 p-2">
                      <h6 class="mb-0 fs-5">Estudiantes Relacionados</h6>
                      <div class="table-responsive">
                        <table id="example2" class="table table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th class="text-center">Nombres</th>
                              <th class="text-center">Apellidos</th>
                              <th class="text-center">Matricula</th>
                              <th class="text-center">Nivel</th>
                              <th class="text-center">Grado</th>
                              <th class="text-center">Grupo</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-center">
                              <td>CARMEN</td>
                              <td>REBOLLAR GARCIA </td>
                              <td>soporte123</td>
                              <td>PRIMARIA</td>
                              <td>SEGUNDO</td>
                              <td>A</td>
                              <td>
                                <a class="btn text-white bg-secondary" data-bs-toggle="tooltip" data-bs-title="Detalles">
                                  <i class="fa-solid fa-eye"></i>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th class="text-center">Nombres</th>
                              <th class="text-center">Apellidos</th>
                              <th class="text-center">Matricula</th>
                              <th class="text-center">Nivel</th>
                              <th class="text-center">Grado</th>
                              <th class="text-center">Grupo</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>

                    </div>
                  </div>

                  <!-- table -->
                  <div class="row">
                    <div class="card-body pt-2">
                      <h6 class="mb-0 fs-4">Mensajes Enviados</h6>
                      <div class="row mt-4">
                        <div class="table-responsive">
                          <table id="example2" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th class="text-center">Asunto</th>
                                <th class="text-center">Estudiante</th>
                                <th class="text-center">Mensaje</th>
                                <th class="text-center">Tipo de mensaje</th>
                                <th class="text-center">Leído</th>
                                <th class="text-center">Enviado</th>
                                <th class="text-center">Visto</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center">
                                <td>BIENVENIDA</td>
                                <td>CARMEN REBOLLAR GARCIA</td>
                                <td>REGRESAMOS A CLASES RECUERD ...</td>
                                <td>Actividades</td>
                                <td>
                                  <span class="badge badge-sm bg-gradient-success">Sí</span>
                                </td>
                                <td>2023-03-31 00:41:50</td>
                                <td>2021-08-18 11:42:46 </td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th class="text-center">Asunto</th>
                                <th class="text-center">Estudiante</th>
                                <th class="text-center">Mensaje</th>
                                <th class="text-center">Tipo de mensaje</th>
                                <th class="text-center">Leído</th>
                                <th class="text-center">Enviado</th>
                                <th class="text-center">Visto</th>
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
          //? Opcion 5
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option5">

            <!-- addEstudiante - Form -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="font-weight-bolder">Agregar Estudiante</h5>

                  <form id="estudiantes">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Nombres</label>
                              <input type="text" class="form-control w-100" name="nombre_alumno" id="nombre_alumno" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Apellidos</label>
                              <input type="text" class="form-control w-100" name="apellidos_alumno" id="apellidos_alumno" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Matricula</label>
                              <input type="text" class="form-control w-100" name="matricula_alumno" id="matricula_alumno" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Sexo</label>
                              <select name="sexo_alumno" id="sexo_alumno" class="form-control" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Nivel</label>
                              <select name="sid_nivel" id="sid_nivel" class="form-control" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="1">Rol </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Grado</label>
                              <select name="sid_grado" id="sid_grado" class="form-control" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="1">Rol </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Grupo</label>
                              <select name="sid_grupo" id="sid_grupo" class="form-control" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="1">Rol </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="input-group input-group-dynamic mt-3">
                              <label class="input-group">Foto</label>
                              <input type="text" class="form-control w-100" name="foto_alumno" id="foto_alumno" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="mt-3" align="right">
                        <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_alumnos">Agregar</a>
                        <input type="hidden" class="id_modificar" name="id_modificar" value="">
                      </div>

                    </div>
                  </form>

                </div>
              </div>
            </div>

            <!-- Filtro -->
            <div class="mt-3 mb-6 col-lg-12">
              <div class="card">
                <div class="card-body d-flex flex-wrap align-items-center">

                  <div class="col-lg-3 px-3">
                    <div class="input-group input-group-outline mt-4">
                      <label class="form-label">Buscar</label>
                      <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                  </div>

                  <div class="col-md-3 col-12 px-3">
                    <div class="input-group input-group-dynamic mt-3">
                      <label class="input-group">Nivel</label>
                      <select name="" id="" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona una opción</option>
                        <option value="1">Rol </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-12 px-3">
                    <div class="input-group input-group-dynamic mt-3">
                      <label class="input-group">Grado</label>
                      <select name="" id="" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona una opción</option>
                        <option value="1">Rol </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-12 px-3">
                    <div class="input-group input-group-dynamic mt-3">
                      <label class="input-group">Grupo</label>
                      <select name="" id="" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona una opción</option>
                        <option value="1">Rol </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="mt-3 text-end">
                      <button class="btn bg-gradient-success mb-0 me-2" type="button" name="button">Filtrar</button>
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
                    <table id="tabla_estudiantes" data-name="alumno.php" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Matrícula</th>
                          <th class="text-center">Sexo</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Seleccionar</th>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Matrícula</th>
                          <th class="text-center">Sexo</th>
                          <th class="text-center">Nivel</th>
                          <th class="text-center">Grado</th>
                          <th class="text-center">Grupo</th>
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
                  <h6 class="mb-0 fs-4">Información del estudiante</h6>
                </div>

                <div class="card-body pt-4 p-3">
                  <div class="row">
                    <div class="d-flex">

                      <ul class="list-group col-6 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column infomacion_estudiante">
                          </div>

                        </li>
                      </ul>

                      <ul class="list-group col-6 p-2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column infomacion_estudiante_extra">
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
          //? Opcion 6
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option6">

            <!-- Turotial -->
            <div class="col-xl-12 mt-3 mb-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 col-md-9 col-lg-9">
                      <h5 class="font-weight-bolder">Como subir un archivo</h5>
                      <p class="text-sm">Los pasos para subir un archivo son los siguientes:</p>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                      <button type="button" class="btn bg-secondary text-white col-12" data-bs-toggle="modal" data-bs-target="#fotoModal">
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
                            <i class="fa-regular fa-file-zipper"></i>
                          </button>
                          <p class="text-sm font-weight-normal mb-2"> <b>Paso 2:</b> Descomprimir Archivo</p>
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

            <!-- Table -->
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
                    <table id="example6" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">Archivos</th>
                          <th class="text-center">Fecha de Subida</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <td>fotos alumnos.zip</td>
                          <td> 2022-08-16 11:24:11</td>
                          <td>
                            <span class="badge badge-sm bg-gradient-success">Guardado</span>
                          </td>
                          <td>
                            <a href="#" class="btn text-white bg-warning" data-bs-toggle="tooltip" data-bs-title="Validar">
                              <i class="fa-regular fa-file-zipper"></i>
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
                  <li>NombresP (Nombres del padre)</li>
                  <li>ApellidosP (Apellidos del padre)</li>
                  <li>Correo</li>
                  <li>NombresH (Nombres del estudiante)</li>
                  <li>ApellidosH (Apellidos del estudiante)</li>
                  <li>Matricula</li>
                  <li>Nivel</li>
                  <li>Grado</li>
                  <li>Grupo</li>
                  <li>Sexo (M / F)</li>
                </ul>
                <p>Adicionalmente también se puede considerar:</p>
                <ul>
                  <li>Contacto de emergencia 1</li>
                  <li>Teléfono 1</li>
                  <li>Contacto de emergencia 1</li>
                  <li>Teléfono 2</li>
                  <li>Tipo de sangre</li>
                  <li>Alergias</li>
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
        <!-- Agregar Rol de Usuario -->
        <div class="modal fade" id="rolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Rol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control " aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <p>Permisos:</p>

                <div class="d-flex justify-content-evenly">
                  <div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Estadísticas</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Usuarios y padres</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Mensajes</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Calendario</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Extracurriculares</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Seguimientos</label>
                    </div>
                  </div>

                  <div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Calificaciones</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Materias</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Asistencias</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Cobranza</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Tareas</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Configuraciones</label>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Crear nuevo rol</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Cargar Archivo -->
        <div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Cómo subir Fotografías?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <ul>
                  <li>Las fotografías deben tener por nombre la <b>matrícula del estudiante</b>.</li>
                  <li>Deben tener extensión <b>".jpg"</b>. <b>Ejemplo "MAT-211.jpg"</b></li>
                  <li>Recuerda que debes cargar la carpeta comprimida en (.zip o .rar) <b>no máximo de 20mb</b></li>
                </ul>
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