<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">App Escolar Configuración</h5>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>

        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">

            <div>
                <h6 class="mb-0">Colores del Menú</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>

            <div class="mt-3">
                <h6 class="mb-0">Fondo del Menú</h6>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-1 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Oscuro</button>
                <button class="btn bg-gradient-dark px-1 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparente</button>
                <button class="btn bg-gradient-dark px-1 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Blanco</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

            <div class="mt-3 d-flex">
                <h6 class="mb-0">Barra Fijada</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Mini-Menú</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Claro / Oscuro</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="w-100 text-center">
                <h6 class="mt-3">Contacto</h6>
                <a href="tel:7223196667" class="btn btn-dark p-3" target="_blank">
                    <i class="fa-solid fa-phone"></i>
                    <br> Teléfono
                </a>
                <a href="https://www.facebook.com" class="btn btn-dark p-3" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                    <br> Facebook
                </a>
                <a href="mailto:appescolar01@gmail.com" class="btn btn-dark p-3" target="_blank">
                    <i class="fa-regular fa-envelope"></i>
                    <br> Correo
                </a>

            </div>
        </div>
    </div>
</div>