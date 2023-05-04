<?php
include_once getenv("RAIS") . '/vendor/autoload.php';

function homeController(){
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
    $yar = validYar($_GET['yar']);
    $invalid = false;
    if(!$yar){
        $yar = intval(date('Y'));
        if(isset($_GET['yar']))
            $invalid = $_GET['yar'];
    }
    $wd = date('w',mktime(0,0,0,1,1,$yar));
    $wd = intval($wd)  % 7;
    if(($yar % 4) == 0)
        $meses[1][1]++;

    #include '../templates/home.php';
    include_once  getenv('RAIS') . '/src/app/view/home.php';
}