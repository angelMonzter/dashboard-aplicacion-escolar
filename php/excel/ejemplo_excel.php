<?php

require_once "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$documento = new Spreadsheet();

# Como ya hay una hoja por defecto, la obtenemos, no la creamos
$hojaDeProductos = $documento->getActiveSheet();

# Escribir encabezado de los productos
$encabezado = ["Nombre del contratante", "Fecha de emisión", "Fecha de renovación", "Numero de póliza", "Día de cobro", "Forma de pago", "Conducto de cobro", "Aseguradora"];
# El último argumento es por defecto A1 pero lo pongo para que se explique mejor
$hojaDeProductos->fromArray($encabezado, null, 'A1');

# Comenzamos en la 2 porque la 1 es del encabezado
//require_once("../conexion_simple.php");

$numeroDeFila = 2;

//include 'usuario.php'
//new Usuario
//obj->consulta_individual_auto();
//while
#CONSULTA GMM
/*if (empty($filtro_inicio) && empty($filtro_fin)) {
	if ($result = $conn->query("SELECT *, p.status AS status_pago FROM cliente c LEFT JOIN gmm g ON c.cliente_id = g.cliente_sid LEFT JOIN pago p ON p.seguro_sid = g.gmm_id LEFT JOIN seguro_persona sp ON sp.propsecto_sid = c.prospecto_sid LEFT JOIN aseguradora_persona ap ON ap.seguro_persona_sid = sp.seguro_perona_id LEFT JOIN aseguradora a ON a.aseguradora_id = ap.aseguradora_sid LEFT JOIN planes pla ON pla.planes_id = sp.seguro_sid WHERE sp.seguro_sid = 'xxxx1' ")) {

	    while ( $fila_gmm = $result->fetch_assoc() ){
	    	$cobranza[] = $fila_gmm;
		}
	}
}else{
	if ($result = $conn->query("SELECT *, p.status AS status_pago FROM cliente c LEFT JOIN gmm g ON c.cliente_id = g.cliente_sid LEFT JOIN pago p ON p.seguro_sid = g.gmm_id LEFT JOIN seguro_persona sp ON sp.propsecto_sid = c.prospecto_sid LEFT JOIN aseguradora_persona ap ON ap.seguro_persona_sid = sp.seguro_perona_id LEFT JOIN aseguradora a ON a.aseguradora_id = ap.aseguradora_sid LEFT JOIN planes pla ON pla.planes_id = sp.seguro_sid WHERE sp.seguro_sid = 'xxxx1' AND g.fecha_emision <= '$filtro_fin' AND g.fecha_renovacion >= '$filtro_inicio' ")) {

	    while ( $fila_gmm = $result->fetch_assoc() ){
	    	$cobranza[] = $fila_gmm;
		}
	}
}


for ($i=0; $i < count($cobranza); $i++) { 
	# Escribirlos en el documento
	if (empty($cobranza[$i]["nombre_contratante"])) {
    	$hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, '-');//$cobranza[$i]["nombre"] . ' ' . $cobranza[$i]["apellido"]
	}else{
    	$hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $cobranza[$i]["nombre_contratante"]);
	}
    $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $cobranza[$i]["fecha_emision"]);
    if (empty($cobranza[$i]["fecha_renovacion"])) {
    	$hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, '-');
	}else{
    	$hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $cobranza[$i]["fecha_renovacion"]);
	}
    $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $cobranza[$i]["numero_poliza"]);
    $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $cobranza[$i]["dia_cobro"]);
    $hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, $cobranza[$i]["forma_pago"]);
    $hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, $cobranza[$i]["conducto_cobro"]);
    $hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, $cobranza[$i]["nombre_seguro"]);
    $numeroDeFila++;
}*/

# Escribirlos en el documento
$hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, 'angel');
$hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, '10-10-2020');
$hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, '10-11-2020');
$hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, '10-11-2020');
$hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, '10-11-2020');
$hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, '10-11-2020');
$hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, '10-11-2020');
$hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, '10-11-2020');

// Write an .xlsx file  
$date = date('d-m-y-'.substr((string)microtime(), 1, 8));
$date = str_replace(".", "", $date);
$filename = "export_".$date.".xlsx";

try {
    $writer = new Xlsx($documento);
    $writer->save($filename);
    $content = file_get_contents($filename);
} catch(Exception $e) {
    exit($e->getMessage());
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . urlencode($filename) .'"' );

echo $content;  // this actually send the file content to the browser

unlink($filename);

/*
$filename = "cobranza.xlsx";

$writer = new Xlsx($documento);
$writer->save($filename);
$content = file_get_contents($filename);

header("Content-Disposition: attachment; filename=".$filename);

exit($content);

# Crear un "escritor"
$writer = new Xlsx($documento);
# Le pasamos la ruta de guardado
$writer->save('Exportado.xlsx');
exit;

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Descarga_excel.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
*/