<?php
$resultado = doblarPapel($_GET['numPlieges'], 0.14);
echo $resultado;

function doblarPapel($numDobles, $grosor){
    for($i = 0; $i < $numDobles ;$i++){
        $grosor = $grosor * 2; 
    }

    $medidaMetrica = '';

    if($grosor < 1000){
       $medidaMetrica = 'mm';
     }

    if(1000 <= $grosor && $grosor < 1000000){
        $medidaMetrica = 'm';
        $grosor / 1000;
    }

    if($grosor >= 1000000){
        $medidaMetrica = 'km';
        $grosor = $grosor / 1000000;
    }

    $grosor = (string)$grosor;

    $grosor = $grosor . $medidaMetrica;
    return $grosor;
}

/**
 * Hoja de grosor de 0,14 mm
 * (0,14) (2^n)
 * Resultado se tiene que mostrar X /Unidad
 * 
 * Distintas unidades transformar mm a:
 * X < 1000 = mm
 * 1000 < X < 1.000.000 = m
 * X >= 1.000.000 = km
 */