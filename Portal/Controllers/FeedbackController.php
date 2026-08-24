<?php
namespace Portal\Controllers;

class FeedbackController {
    public function index(){
        // Verifica se o usuário tá logado, etc...
        if(!isset($_SESSION['login'])){
            // Se não estiver, manda pro login
            \Portal\Utilidades::redirect(INCLUDE_PATH . 'login'); 
            return;
        }

        // Manda renderizar a página 'feed' dentro do layout principal!
        \Portal\Views\MainView::render('feedback');
    }
}
?>