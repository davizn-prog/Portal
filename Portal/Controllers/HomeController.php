<?php
namespace Portal\Controllers;

class HomeController
{
    public function index()
    {
        // logout
        if (isset($_GET['loggout'])) {
            session_unset();
            session_destroy();
            \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');
            return;
        }

        // se nao estiver logado, manda pro login
        if (!isset($_SESSION['login'])) {
            \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');
            return;
        }

        // aceitar/recusar amizade
        if (isset($_GET['recusarAmizade'])) {
            $idEnviou = (int) $_GET['recusarAmizade'];
            \Portal\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou, 0);
            \Portal\Utilidades::alerta('Amizade Recusada :(');
            \Portal\Utilidades::redirect(INCLUDE_PATH);
        } else if (isset($_GET['aceitarAmizade'])) {
            $idEnviou = (int) $_GET['aceitarAmizade'];
            if (\Portal\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou, 1)) {
                \Portal\Utilidades::alerta('Amizade aceita!');
                \Portal\Utilidades::redirect(INCLUDE_PATH);
            }
        }

        // post no Feed
        if (isset($_POST['post_feed'])) {
            if ($_POST['post_content'] == '') {
                \Portal\Utilidades::alerta('Não permitimos posts vazios :(');
                \Portal\Utilidades::redirect(INCLUDE_PATH);
            }
            \Portal\Models\HomeModel::postFeed($_POST['post_content']);
            \Portal\Utilidades::alerta('Post feito com sucesso!');
            \Portal\Utilidades::redirect(INCLUDE_PATH);
        }

        // renderiza o Feed somente se estiver logado
        \Portal\Views\MainView::render('feed');
    }
}
?>