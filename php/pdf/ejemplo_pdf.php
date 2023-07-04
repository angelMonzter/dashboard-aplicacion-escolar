<?php
/*require_once("../cliente.php");
   $obj = new Cliente();
   
   $filtro_inicio = $_GET['inicio_filtro'];
   $filtro_fin = $_GET['fin_filtro'];

   $resultado = $obj->consulta_individual_gmm($filtro_inicio, $filtro_fin);
   while ( $fila_gmm = $resultado->fetch_assoc() ){
	   $cobranza[] = $fila_gmm;
   }*/

/*$html = '
	<html>
	<head>
	<style>
	body {font-family: sans-serif;
		font-size: 10pt;
	}
	p {	margin: 0pt; }
	table.items {
		border: 0.1mm solid #000000;
	}
	td { vertical-align: top; }
	.items td {
		border-left: 0.1mm solid #000000;
		border-right: 0.1mm solid #000000;
	}
	table thead td { background-color: #EEEEEE;
		text-align: center;
		border: 0.1mm solid #000000;
		font-variant: small-caps;
	}
	.items td.blanktotal {
		background-color: #EEEEEE;
		border: 0.1mm solid #000000;
		background-color: #FFFFFF;
		border: 0mm none #000000;
		border-top: 0.1mm solid #000000;
		border-right: 0.1mm solid #000000;
	}
	.items td.totals {
		text-align: right;
		border: 0.1mm solid #000000;
	}
	.items td.cost {
		text-align: "." center;
	}
	</style>
	</head>
	<body>

	<!--mpdf
	<htmlpageheader name="myheader">
	<table width="100%"><tr>
	<td width="50%" style="color:#0000BB; ">
	<span style="font-weight: bold; font-size: 14pt;">Sistema Previs.</span>
	<br />Direccion
	<br />Toluca
	<br />
	<br />
	<span style="font-family:dejavusanscondensed;">&#9742;</span>73223231</td>
	<td width="50%" style="text-align: right;">Reporte No.<br /><span style="font-weight: bold; font-size: 12pt;">029</span></td>
	</tr></table>
	</htmlpageheader>

	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	Page {PAGENO} of {nb}
	</div>
	</htmlpagefooter>

	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->

	<div style="text-align: right">Date: 13 Enero 2022</div>

	<br />

	<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
	<thead>
	<tr>
	<tr>
		<th>Nombre del contratante</th>
		<th>Fecha de emisión</th>
		<th>Fecha de renovación</th>
		<th>Numero de póliza</th>
		<th>Día de cobro</th>
		<th>Forma de pago</th>
		<th>Conducto de cobro</th>
		<th>Aseguradora</th>
	</tr>
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->
';
	for ($i=0; $i < count($cobranza); $i++) { 
	$html .= '<tr>
		<td>'. $cobranza[$i]["nombre_contratante"] .'</td>
		<td>'. date("d-m-Y", strtotime($cobranza[$i]["fecha_emision"])) .'</td>
		<td>'. date("d-m-Y", strtotime($cobranza[$i]["fecha_renovacion"])) .'</td>
		<td>'. $cobranza[$i]["numero_poliza"] .'</td>
		<td>'. $cobranza[$i]["dia_cobro"] .'</td>
		<td>'. $cobranza[$i]["forma_pago"] .'</td>
		<td>'. $cobranza[$i]["conducto_cobro"] .'</td>
		<td>'. $cobranza[$i]["nombre_seguro"] .'</td>
	</tr>';
	}
	$html .= '<!-- END ITEMS HERE -->
	<!--<tr>
	<td class="blanktotal" colspan="3" rowspan="6"></td>
	<td class="totals">Subtotal:</td>
	<td class="totals cost">&pound;1825.60</td>
	</tr>
	<tr>
	<td class="totals">Tax:</td>
	<td class="totals cost">&pound;18.25</td>
	</tr>
	<tr>
	<td class="totals">Shipping:</td>
	<td class="totals cost">&pound;42.56</td>
	</tr>
	<tr>
	<td class="totals"><b>TOTAL:</b></td>
	<td class="totals cost"><b>&pound;1882.56</b></td>
	</tr>
	<tr>
	<td class="totals">Deposit:</td>
	<td class="totals cost">&pound;100.00</td>
	</tr>
	<tr>
	<td class="totals"><b>Balance due:</b></td>
	<td class="totals cost"><b>&pound;1782.56</b></td>
	</tr>-->
	</tbody>
	</table>

	<div style="text-align: center; font-style: italic;"></div>

	</body>
	</html>
';*/

$html = '
	<html>
	<head>
	<style>
	body {font-family: Calibri, sans-serif;
		font-size: 12pt;
	}
	p {	margin: 0pt; }
	table.items {
		//border: 0.1mm solid #000000;
	}
	td { vertical-align: top; }
	.items td {
	//	border-left: 0.1mm solid #000000;
	//	border-right: 0.1mm solid #000000;
	}
	table thead td { background-color: #EEEEEE;
		text-align: center;
	//	border: 0.1mm solid #000000;
		font-variant: small-caps;
	}
	tr{
		text-align: center;
		align : "center";
	}
	.items td.blanktotal {
		background-color: #EEEEEE;
	//	border: 0.1mm solid #000000;
		background-color: #FFFFFF;
	//	border: 0mm none #000000;
	//	border-top: 0.1mm solid #000000;
	//	border-right: 0.1mm solid #000000;
	}
	.items td.totals {
		text-align: right;
	//	border: 0.1mm solid #000000;
	}
	.items td.cost {
		text-align: "." center;
	}
	.horizontal-line {
        border: none;
        border-top: 1px solid black;
        margin: 5px 0;
    }
	</style>
	</head>
	<body>

	<!--mpdf
	<htmlpageheader name="myheader">
	<table width="100%"><tr>
	<td width="90%" align="center" style="color:#000000; ">
	<span style="font-weight: bold; font-size: 18pt;">Boleta de Evaluación.</span>
	<br />APLICACIÓN ESCOLAR PRO
	<br />2022-2023
	<br />
	<br />
	</td>
	</tr>
	</table>
	<img src="https://i.postimg.cc/7Yg6KjbD/aplicacion-pro.png" alt="Descripción de la imagen">
	</htmlpageheader>

	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	Page {PAGENO} of {nb}
	</div>
	</htmlpagefooter>

	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->


	<br /><br>

	<table align="center" class="items" width="90%" style="font-size: 12pt;">
		<tbody>
			<tr align="center">
				<td>Sergio</td>
				<td>Ramirez Aguilar</td>
				<td>1520INI099</td>
			</tr>
			<tr>
	        	<td colspan="3"><hr class="horizontal-line"> <!-- Línea horizontal --></td>
	    	</tr>
			<tr>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Matrícula</th>
			</tr>
		</tbody>
	</table>

	<br>
	<table align="center" class="items" width="90%" style="font-size: 12pt;">
		<tbody>
			<tr align="center">
				<td>UPVT</td>
				<td>Preparatoria</td>
				<td>4to</td>
				<td>B</td>
			</tr>
			<tr>
	        	<td colspan="4"><hr class="horizontal-line"> <!-- Línea horizontal --></td>
	    	</tr>
			<tr>
				<th>Escuela</th>
				<th>Nivel</th>
				<th>Grado</th>
				<th>Grupo</th>
			</tr>
		</tbody>
	</table>
<br>

<br>
	<table align="center" class="items" width="100%" style="font-size: 10pt; border-collapse: collapse; " cellpadding="10">
		<thead>
			<tr>
				<th rowspan="2">Materia</th>
				<th colspan="4">Periodos de Evaluación</th>
				<th rowspan="2">Promedio Final</th>
			</tr>

		    <tr>
		      <th>1°</th>
		      <th>2°</th>
		      <th>3°</th>
		      <th>4°</th>
		    </tr>
		  </thead>
	<tbody>
	<!-- ITEMS HERE -->
	';
	$html .= '
	<tr>
		<th>Reto Mensual</th>
		<td>10.00</td>
		<td>9.00</td>
		<td>7.00</td>
		<td>9.00</td>
		<td>10.00</td>
	</tr>
	<tr>
		<th>Matemáticas</th>
		<td>8.00</td>
		<td>9.00</td>
		<td>9.00</td>
		<td>10.00</td>
		<td>7.00</td>
	</tr>
	<tr>
		<th>Comunicación</th>
		<td>8.00</td>
		<td>7.00</td>
		<td>9.00</td>
		<td>10.00</td>
		<td>8.00</td>
	</tr>
	<tr>
		<th>Química</th>
		<td>8.00</td>
		<td>8.00</td>
		<td>9.00</td>
		<td>10.00</td>
		<td>9.00</td>
	</tr>
	<tr>
		<th>Español</th>
		<td>8.00</td>
		<td>9.00</td>
		<td>9.00</td>
		<td>10.00</td>
		<td>7.00</td>
	</tr>
	</tbody>
	</table>

	<div style="text-align: center; font-style: normal;"></div>

	</body>
	</html>
';

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);
$imagen = 'https://i.postimg.cc/7Yg6KjbD/aplicacion-pro.png';
$mpdf->Image($imagen, $x = 150, $y = 150, $width = 200, $height = 200, $type = '', $link = '');
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Boleta de Evaluación");
$mpdf->SetAuthor("SI");
$mpdf->SetWatermarkText("app escolar pro");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = '';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
?>