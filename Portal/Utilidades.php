<?php

namespace Portal;

class Utilidades
{

    public static function redirect($url)
    {
        header("Location: " . $url);
        exit();
    }

    public static function alerta($mensagem)
    {
        echo '<script>console.log("' . $mensagem . '")</script>';
    }
}

?>