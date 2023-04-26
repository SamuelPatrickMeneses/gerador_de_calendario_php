
<?php
    function printRow($start,$wieckStart = 0, $wieckEnd = 7){
        $wieck = array();

        for($i = 0;$i < 7;$i++){
            $wieck[$i] = ($i < $wieckStart) || ($i >  $wieckEnd) ? '': $start++;
        }

?>
        <tr>
            <td><?php echo $wieck[0];?></td>
            <td><?php echo $wieck[1];?></td>
            <td><?php echo $wieck[2];?></td>
            <td><?php echo $wieck[3];?></td>
            <td><?php echo $wieck[4];?></td>
            <td><?php echo $wieck[5];?></td>
            <td><?php echo $wieck[6];?></td>
        </tr>
<?php return $wieckEnd - $wieckStart;}?>

<?php function printMes($start,$end){ ?>

        <table>
            <thead>
                <tr>
                    <td>Dom</td>
                    <td>Seg</td>
                    <td>Ter</td>
                    <td>Qua</td>
                    <td>Qui</td>
                    <td>Sex</td>
                    <td>Sáb</td>    
                </tr>
            </thead>
            <tbody>
                <?php   
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
                   
                ?>
            </tbody>
        </table>

<?php 
     return ($lestWick + 1) % 7;
};?>
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
    <input type="text" name="yar" id="yar">
    <input type="submit" value="gerar">
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
        $yar = isset($_GET['yar']) && $_GET['yar'] ? $_GET['yar']: date('Y');
        $yar = intval($yar);
        $wd = date('w',mktime(0,0,0,1,1,$yar));
        $wd = (intval($wd) + 1) % 7;
        if(($yar % 4) == 0)
            $meses[1][1]++;
        for($i = 0; $i < 12; $i++){
                $name =  $meses[$i][0];
                echo '<h4>' . $name . '</h4>'; 
                $wd = printMes($wd, $meses[$i][1]);
        };
           
    ?>
</body>
</html>