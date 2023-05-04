<?php
    include_once getenv('RAIS') . '/vendor/autoload.php';
    function validYar($yar){
        if($nYar = intval($yar))
            return $nYar >= 1900 && $nYar <= 2199 ? $nYar : false;
    }