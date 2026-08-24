<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    require('vendor/autoload.php');

    define('INCLUDE_PATH_STATIC', 'http://localhost/Portal/Portal/Views/Pages/');
    define('INCLUDE_PATH', 'http://localhost/Portal/');

    $app = new Portal\Application();

    $app->run();

?>