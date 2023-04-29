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