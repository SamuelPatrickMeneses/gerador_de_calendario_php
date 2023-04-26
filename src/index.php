<?php

function printRow($start,$wieckStart = 0, $wieckEnd = 7){
    $wieck = array();

    for($i = 0;$i < 7;$i++){
        $wieck[$i] = ($i < $wieckStart) || ($i >  $wieckEnd) ? '': $start++;
    }

    echo '<tr>';
    foreach($wieck as $day){
        echo '<td>';
        echo $day;
        echo '</td>';
    }
    echo '</tr>';
    return $wieckEnd - $wieckStart;
}

function printMes($start,$end){ 

    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<td>Dom</td>';
    echo '<td>Seg</td>';
    echo '<td>Ter</td>';
    echo '<td>Qua</td>';
    echo '<td>Qui</td>';
    echo '<td>Sex</td>';
    echo '<td>Sáb</td>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

        $day = 1;
        $firstWickSize = printRow($day,$start);
        $inSet = $end - $firstWickSize; 
        $modInset = $inSet % 7;
        $start = 0;
        $completeWicks = ($inSet  - $modInset) / 7;
        $day = $firstWickSize +1;
            for($i = 0;$i < $completeWicks; $i++)
                $day += printRow($day);
                $lestWick = ($inSet % 7);
                if($lestWick)
                    $lestWick = printRow($day,0,--$lestWick);
                return ($lestWick + 1) % 7;
            	                                
                echo '</tbody>';
                echo '</table>';
                echo '<br>';
                echo '<hr>';
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            border-color: black;
            border-width: 2px;
            border-style: solid;
            padding: 1px;
            min-width: 1em;
            
        }
    </style>
</head>
<body>
<form action="propertView.php" method="get">
    <label for="yar">ano</label>
    <input type="text" name="yar" id="yar"/>
    <input type="submit" value="gerar"/>
</form> 

    <?php 
        date_default_timezone_set('America/Sao_Paulo');

        $meses = array(
            array('janeiro',31),
            array('fevereiro',28),
            array('março',31),
            array('abril',30),
            array('maio',31),
            array('junho',30),
            array('julho',31),
            array('agosto',31),
            array('setembro',30),
            array('outubro',31),
            array('novembro',30),
            array('dezembro',31)
        );

        $yar = isset($_GET['yar']) and $_GET['yar'] ? $_GET['yar']: date('Y');
        
        $yar = intval($yar);
        $wd = date('w',mktime(0,0,0,1,1,$yar));
        $bisexto = $yar % 4 == 0 && $yar % 100 != 0 || $yar % 400 == 0;
        foreach($meses as $mes){
            $mesName = $mes[0];
            $mesSize = $mes[1];
            echo '<h1>'.$mesName.'</h1>';
            $wd = printMes($wd,$mesSize + ($mesName == 'fevereiro' && $bisexto ? 1: 0));
        }

    ?>

    

</body>
</html>