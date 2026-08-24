<?php
namespace Portal\Views;

class MainView {
    public static function render($filename){
        
        // 1. Carrega o topo (Head, assets, menu lateral e abertura do container)
        include('Pages/includes/header.php');
        
        // 2. Carrega o miolo dinâmico (feed.php, videos.php, perfil.php, etc)
        include('Pages/'.$filename.'.php');
        
        // 3. Carrega o rodapé e os scripts JS
        include('Pages/includes/footer.php');
    }
}
?>