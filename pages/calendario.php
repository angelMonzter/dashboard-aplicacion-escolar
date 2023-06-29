<?php include_once('../templates/header.php') ?>

<body class="g-sidenav-show  bg-gray-200">
  <!-- ASIDE / MENU IZQUIERDO  -->
  <?php include_once('../templates/aside.php') ?>
  <!-- ASIDE / MENU IZQUIERDO  -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include_once('../templates/navbar.php') ?>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <!-- Content -->
      <div class="row">
        <div class="col-xl-7">
          <div class="card card-calendar">
            <div class="card-body p-3">
              <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-5">
          <div class="calendario card">
            <div class="card-body">

              <form id="evento">
                <h5 class="font-weight-bolder">Nuevo Evento</h5>
                <div class="input-group input-group-dynamic mt-3">
                  <label class="form-label">Nombre del Evento</label>
                  <input type="email" class="form-control w-100 mb-2" name="nombre_evento" id="nombre_evento" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                  <p><b>Nota:</b> el nombre del evento no puede sobrepasar los 120 caractéres.</p>
                </div>
                <div class="input-group input-group-static my-3">
                  <label>Fecha</label>
                  <input type="date" name="fecha_evento" id="fecha_evento" class="form-control">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="todos_evento" id="todos_evento" value="" id="fcustomCheck1" checked="">
                  <label class="custom-control-label" for="customCheck1">Para toda la escuela</label>
                </div>
                <div class="input-group input-group-dynamic mt-3">
                  <label class="input-group">Nivel</label>
                  <select name="nivel_evento" id="nivel_evento" class="form-control" aria-label="Default select example">
                    <option selected>Selecciona una opción</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Prepa">Prepa</option>

                  </select>
                </div>
                <div class="input-group input-group-dynamic mt-3">
                  <label class="input-group">Grado</label>
                  <select name="grado_evento" id="grado_evento" class="form-control" aria-label="Default select example">
                    <option selected>Selecciona una opción</option>
                    <option value="1">1°</option>
                    <option value="2">2°</option>
                    <option value="3">3°</option>

                  </select>
                </div>
                <div class="input-group input-group-dynamic mt-3">
                  <label class="input-group">Grupo</label>
                  <select name="grupo_evento" id="grupo_evento" class="form-control" aria-label="Default select example">
                    <option selected>Selecciona una opción</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>

                  </select>
                </div>
                <div class="mt-3" align="right">
                  <a href="#!" class="btn bg-gradient-success mb-0 me-2" id="guardar_evento">Agregar</a>
                  <input type="hidden" class="id_modificar" name="id_modificar" value="">
                </div>
              </form>

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
  $calendario = true;
  include_once('../templates/script.php');
  ?>
  <!-- Scripts -->

</body>

</html>