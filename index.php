<?php

    //quando o servidor entra na pasta o primeiro arquivo que ele procura é o index
    session_start();//inicia a seção e cria o identificador
    date_default_timezone_set('America/Sao_Paulo');
    require('vendor/autoload.php');

    define('INCLUDE_PATH_STATIC', 'http://localhost/Portal/Portal/Views/Pages/');
    define('INCLUDE_PATH', 'http://localhost/Portal/');

    $app = new Portal\Application();

    $app->run();

?>