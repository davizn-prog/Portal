<?php
namespace Portal\Controllers;

class HomeController
{
    public function index()
    {
        // logout
        if (isset($_GET['loggout'])) {//se tiver clicado no link de loggout
            session_unset();//limpa os dados da seção
            session_destroy();//destroi a seção fisicamente (deleta o arquivo de texto associado)
            \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');//e redireciona pro login
            return;
        }

        // se nao estiver logado, manda pro login pra nao permitir navegar por url nao logado
        if (!isset($_SESSION['login'])) {
            \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');
            return;
        }

        // aceitar/recusar amizade
        if (isset($_GET['recusarAmizade'])) {//se clicou em recusar amizade
            $idEnviou = (int) $_GET['recusarAmizade'];//pega o valor gerado e transforma em numerico inteiro
            \Portal\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou, 0);//passa os parametros pra execução da função (id do usuario da seção e 0)
            \Portal\Utilidades::alerta('Amizade Recusada :(');//alerta que recusou
            \Portal\Utilidades::redirect(INCLUDE_PATH);//e atualiza a pagina

            //mas se tive sido aceita
        } else if (isset($_GET['aceitarAmizade'])) {
            $idEnviou = (int) $_GET['aceitarAmizade'];
            if (\Portal\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou, 1)) {
                \Portal\Utilidades::alerta('Amizade aceita!');
                \Portal\Utilidades::redirect(INCLUDE_PATH);
            }//faz a mesma coisa de cima so que com valor 1
        }

        // foemulario de post no Feed
        if (isset($_POST['post_feed'])) {//se tiver apertado no botao de postar

            // Dentro do seu if(isset($_POST['post_feed'])) ...

            if ($_POST['post_content'] == '') {
                \Portal\Utilidades::alerta('Não permitimos posts vazios :(');
                \Portal\Utilidades::redirect(INCLUDE_PATH);
                return; // Coloque esse return para travar a execução se estiver vazio
            }

            $tipo = 'texto'; // Assume texto por padrão
            $nomeArquivo = '';
            $duracao = isset($_POST['duracao_video']) ? (int) $_POST['duracao_video'] : 0; //pega os segundos do js

            if (isset($_FILES['arquivo_midia']) && $_FILES['arquivo_midia']['error'] === UPLOAD_ERR_OK) {//se tiver tudo ok com o upload do arquivo

                
                $mimeTypeReal = mime_content_type($_FILES['arquivo_midia']['tmp_name']);//descobre o que o arquivo é de verdade
                $categoriaBase = explode('/', $mimeTypeReal)[0];//e cria o tipo

                //armazena o tipo pra levar pro banco depois
                if ($categoriaBase == 'image') {
                    $tipo = 'imagem';
                } elseif ($categoriaBase == 'video') {
                    $tipo = 'video';
                } elseif ($categoriaBase == 'audio') {
                    $tipo = 'musica';
                }

                $nomeArquivo = time() . '_' . $_FILES['arquivo_midia']['name'];//cria um nome personalizado pro arquivo com base na datae nome original
                $caminhoDestino = 'C:/xampp/htdocs/Portal/uploads/' . $nomeArquivo;//guarda o caminho completo

                move_uploaded_file($_FILES['arquivo_midia']['tmp_name'], $caminhoDestino);//e move ele
            }

            \Portal\Models\HomeModel::postFeed($_POST['post_content'], $tipo, $nomeArquivo, $duracao);//dai envia os parametros pra model passar pro banco

            // \Portal\Utilidades::alerta('Post feito com sucesso!');
            //avisa que ta ok
            \Portal\Utilidades::redirect(INCLUDE_PATH);//atualiza
        }

        // renderiza o Feed somente se estiver logado
        \Portal\Views\MainView::render('feed');
    }
}
?>