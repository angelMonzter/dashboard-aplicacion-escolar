<?php


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
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->
';
	$html .= '<tr>
		<td>'. $cobranza[$i]["nombre_contratante"] .'</td>
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
	}
	p {	margin: 0pt; }
	table.items {
	}
	td { vertical-align: top; }
	.items td {
	}
	table thead td { background-color: #EEEEEE;
		text-align: center;
		font-variant: small-caps;
	}
	.items td.blanktotal {
		background-color: #EEEEEE;
		background-color: #FFFFFF;
	}
	.items td.totals {
		text-align: right;
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
	<br />
	<br />
	</htmlpageheader>

	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	Page {PAGENO} of {nb}
	</div>
	</htmlpagefooter>

	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->



	<tbody>
	<!-- ITEMS HERE -->
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	</tbody>
	</table>


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
$mpdf->SetProtection(array('print'));
$mpdf->SetWatermarkText("app escolar pro");
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
