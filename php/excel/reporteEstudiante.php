<?php
require_once "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;



$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$drawing = new Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('../../assets/img/logo_app_escolar.png');
$drawing->setHeight(90);
$drawing->setCoordinates('A1');

$drawing->setWorksheet($sheet);

$headerCell = 'C5'; // Celda del encabezado, puedes cambiarla según tus necesidades

// Formato de fuente
$font = new Font();
$font->setBold(true);
$font->setSize(14);
$sheet->getStyle($headerCell)->setFont($font);

$sheet->setCellValue('C5', 'Reporte Estudiante');

$encabezado = ["Nombre del Estudiante", "Apellidos Estudiante", "Matrícula", "Sexo", "Nombres y Apellidos Padre", "Nivel", "Grado", "Grupo", "Contacto de emergencia", "Telefono", "Contacto Emergencia2", "Telefono2", "Tipo de Sangre", "Alergias"];

$sheet->fromArray($encabezado, null, 'A7');

require ("../conexion.php");

class Alumno extends DBA{
    public function consultar_filtro($nivel, $grado, $grupo){
        $this->sentencia = "SELECT alumno.id_alumno AS id_alumno, alumno.nombre AS nombre_estudiante, alumno.apellido AS app_estudiante, alumno.matricula AS matricula, alumno.sexo AS sexo, padre.nombre AS nombre_padre, nivel.nombre AS nombre_nivel, grado.nombre AS grado, grupo.nombre AS grupo FROM alumno INNER JOIN nivel ON alumno.sid_niveL= nivel.id_nivel INNER JOIN padre ON alumno.sid_padre = padre.id_padre INNER JOIN grupo ON alumno.sid_grupo = grupo.id_grupo INNER JOIN grado ON alumno.sid_grado = grado.id_grado WHERE grado.nombre LIKE '%%' OR grupo.nombre LIKE '%%' OR nivel.nombre LIKE '%%' GROUP BY alumno.matricula";
        return $this->obtener_sentencia();
    }

}

$obj = new Alumno();


        $resultado = $obj->consultar_filtro('Secundaria','', '');
        $data = [];
        while ($row = $resultado->fetch_assoc()) {
            $data[] = $row;
        }


$startRow = 8; // Fila inicial para agregar los datos
$column = 'A'; // Columna inicial para agregar los datos

// foreach ($data as $row) {
//     $cell = $column . $startRow;
//     $sheet->setCellValue($cell, $row['nombre_estudiante']);
//     $column++;
//     $cell = $column . $startRow;
//     $sheet->setCellValue($cell, $row['app_estudiante']);
//     $startRow++;
//     $column = 'A';
// }

for ($i=0; $i < count($data); $i++) { 
    $sheet->setCellValueByColumnAndRow(1, $startRow, $data[$i]["nombre_estudiante"]);
    $sheet->setCellValueByColumnAndRow(2, $startRow, $data[$i]["app_estudiante"]);
    $sheet->setCellValueByColumnAndRow(3, $startRow, $data[$i]["matricula"]);
    $sheet->setCellValueByColumnAndRow(4, $startRow, $data[$i]["sexo"]);
    $sheet->setCellValueByColumnAndRow(5, $startRow, $data[$i]["nombre_padre"]);
    $sheet->setCellValueByColumnAndRow(6, $startRow, $data[$i]["nombre_nivel"]);
    $sheet->setCellValueByColumnAndRow(7, $startRow, $data[$i]["grado"]);
    $sheet->setCellValueByColumnAndRow(8, $startRow, $data[$i]["grupo"]);
    $startRow ++;
}


$tempFilePath = 'archivo.xlsx';
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($tempFilePath);


$downloadFilePath = 'archivo.xlsx';
rename($tempFilePath, $downloadFilePath);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="archivo.xlsx"');
readfile($downloadFilePath);


?>