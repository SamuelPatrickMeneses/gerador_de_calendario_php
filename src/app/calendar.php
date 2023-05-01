<?php
    function printRow($start,$wieckStart = 0, $wieckEnd = 7){
        echo '<tr>';

        for($i = 0;$i < 7;$i++):
            $day = ($i < $wieckStart) || ($i >  $wieckEnd) ? '': $start++;
            echo '<td class="transition-colors hover:bg-orange-600 duration-600">' . $day . '</td>';
        endfor;
        echo '</tr>';
        return $wieckEnd - $wieckStart;
    }


function printMes($start,$end,$name){ 
    echo '<div class="text-center bg-orange-200 rounded-md">
            <h4 >'.$name.'</h4>
            <div class=" bg-orange-400 rounded-md pt-6 h-full">
                <table class="w-full text-lg">
                    <thead class="font-bold">
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
                    <tbody>';
                   
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
    echo        '</tbody>
            </table>
        </div>
    </div>';
    return ($lestWick + 1) % 7;
};