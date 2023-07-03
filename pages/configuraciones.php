<?php include_once('../templates/header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">

  <?php include_once('../templates/aside.php'); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include_once('../templates/navbar.php') ?>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <!-- Content -->

      <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
          <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
          <div class="row gx-4 mb-2">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">Richard Davis</h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row mt-3">
              <div class="col-12 col-md-6 col-xl-6 mt-md-0 mt-4 position-relative">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Información de perfil</h6>
                      </div>
                      <div class="col-md-4 text-end">
                        <a href="javascript:;">
                          <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Mi perfil</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3" id="informacion_perfil" data-name="usuario.php" usuario="<?php echo $_SESSION['id_usuario']; ?>">
                  </div>
                </div>
                <hr class="vertical dark">
              </div>
              <div class="col-12 col-md-6 col-xl-6 mt-md-0 mt-4 position-relative">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Configuración de escuela</h6>
                      </div>
                      <div class="col-md-4 text-end">
                        <a href="javascript:;">
                          <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3" id="configuracion_escuela" data-name="instituto.php" instituto="<?php echo $_SESSION['sid_instituto']; ?>">
                  </div>
                  <div class="col-12 d-flex justify-content-end">
                    <div class="mt-3 botones_configuracion">
                      <a href="#!" class="btn bg-gradient-success mb-0 me-2 editar_configuracion">Editar configuración</a>
                    </div>
                  </div>
                </div>
                <hr class="vertical dark">
              </div>
            </div>
            <div class="row mt-4">

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