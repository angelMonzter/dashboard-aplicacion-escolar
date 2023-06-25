<?php include_once('../templates/header.php') ?>

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
            
          </div>
          <?php
          //? Opcion 2
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option2">

          </div>
          <?php
          //? Opcion 3
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option3">

          </div>
          <?php
          //? Opcion 4
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option4">

          </div>
          <?php
          //? Opcion 5
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option5">

          </div>
          <?php
          //? Opcion 6
          ?>
          <div class="my-4 tab-pane fade" role="tabpanel" id="option6">


          </div>

        </div>
        <?php
        //- Modales
        ?>
        <!-- Cargar Archivo -->
        <div class="modal fade" id="ayuda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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