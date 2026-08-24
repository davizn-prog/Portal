<?php
namespace Portal\Controllers;

class LoginController
{
    public function index()
    {
        // Se JÁ estiver logado, manda pra Home (Feed)
        if (isset($_SESSION['login'])) {
            \Portal\Utilidades::redirect(INCLUDE_PATH);
            return;
        }

        // Processa o envio do formulário de login (POST)
        if (isset($_POST['login'])) {
            $login = $_POST['email'];
            $senha = $_POST['senha'];

            $verifica = \Portal\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
            $verifica->execute(array($login));

            if ($verifica->rowCount() == 0) {
                \Portal\Utilidades::alerta('Não existe nenhum usuário com este e-mail...');
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');
            } else {
                $dados = $verifica->fetch();
                $senhaBanco = $dados['senha'];

                if (\Portal\Bcrypt::check($senha, $senhaBanco)) {
                    $_SESSION['login'] = $dados['email'];
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['nome'] = explode(' ', $dados['nome'])[0];
                    $_SESSION['img'] = $dados['img'];

                    \Portal\Utilidades::alerta('Logado com sucesso!');
                    \Portal\Utilidades::redirect(INCLUDE_PATH);
                } else {
                    \Portal\Utilidades::alerta('Senha incorreta...');
                    \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');
                }
            }
            return;
        }

        // Caminho absoluto: Volta uma pasta a partir de Controllers e entra em Views
        include(__DIR__ . '/../Views/Pages/login.php');
    }
}
?>