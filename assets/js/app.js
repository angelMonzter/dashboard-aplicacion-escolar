$('.icono-activado').on('click', function (e) {
	e.preventDefault();

	$('#sidenav-main').addClass('menu-activo');
	$('.icono-desactivado').css('display', 'block');
	$('.icono-activado').css('display', 'none');
});

$('.icono-desactivado').on('click', function (e) {
	e.preventDefault();

	$('#sidenav-main').removeClass('menu-activo');
	$('.icono-desactivado').css('display', 'none');
	$('.icono-activado').css('display', 'block');
});

/*
function ocultarTarjeta(id) {
	const tareas = $(id);
	tareas.parents('#ocultar_tarjeta').css('display', 'none');
}

const tarjeta = document.querySelector('#tareas');
tarjeta.addEventListener('click', function (e) {
	ocultarTarjeta('#tareas');
});
$('#myTab').on('click', '.nav-link', function (e) {
	e.preventDefault();

	let tabs_menu = $('#myTab .nav-link').attr('aria-selected');

	if (tabs_menu == false) {
		$('#myTab .nav-link').css('background-color', '#f8f9fa');
	}
	console.log(tabs_menu);
});*/

/* Dark Mode */

const button = document.querySelector('#dark-version');

window.addEventListener('load', () => {
	const tema = localStorage.getItem('tema');
	if (tema) {
		document.body.classList.toggle('dark-version', tema === 'dark');
		button.checked = tema === 'dark';
	}
})

button.addEventListener('change', () => {
	//document.body.classList.toggle()
	localStorage.setItem('tema', button.checked ? 'dark' : 'light');
	window.location.reload()

})