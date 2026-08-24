<?php
namespace Portal;

class Application
{
    private $controller;

    private function setApp()
    {
        $loadName = 'Portal\Controllers\\';
        
        // CORRIGIDO: pega o parâmetro url corretamente se ele existir
        $url = $_GET['url'] ?? '';
        $url = explode('/', $url);

        if (empty($url[0])) {
            $loadName .= 'home';
        } else {
            $loadName .= ucfirst(strtolower($url[0]));
        }

        $loadName .= 'Controller';

        // Invertendo a barra para funcionar a busca do arquivo no sistema
        $load = str_replace('\\', '/', $loadName);

        if (file_exists($load . '.php')) {
            $this->controller = new $loadName();
        } else {
            include('Views/Pages/404.php');
            die();
        }
    }

    public function run()
    {
        $this->setApp();
        $this->controller->index();
    }
}