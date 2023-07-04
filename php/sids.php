<?php
    $fecha ='2023-06-12';
    $fecha = strtotime($fecha);

    $dia = date( "j", $fecha);
    $mes = date("n", $fecha);
    $año =  date("Y", $fecha);

    echo $año;
    echo $mes;

?>