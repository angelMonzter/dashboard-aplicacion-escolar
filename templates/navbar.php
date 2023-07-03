<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 " align="right" id="navbar">
            <div class="col-lg-8">
            </div>
            <div class="izquierda-col col-lg-2">
                <div align="right">
                    <a href="../php/cerrar-sesion.php?cerrar_sesion=true" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Hola! <?php echo $_SESSION['username']; ?></span>
                    </a>
                </div>
            </div>
            <div class="izquierda-col col-lg-2">
                <div align="right">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="../php/cerrar-sesion.php?cerrar_sesion=true" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa-sharp fa-solid fa-circle-xmark"></i>
                                <span class="d-sm-inline d-none">Cerrar sesion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="izquierda-col col-lg-3">
                <div align="right">
                    <a href="#!" class="icono-activado"><i class="fa-solid fa-bars"></i></a>
                    <a href="#!" class="icono-desactivado"><i class="fa-solid fa-xmark"></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>

