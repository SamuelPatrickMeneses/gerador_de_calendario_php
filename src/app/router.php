<?php

include_once getenv('RAIS') . '/vendor/autoload.php';


function route(){
   $path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
   switch($path){
        case '/':
            homeController(); 
   };
    
}