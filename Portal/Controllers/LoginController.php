<?php
namespace Portal\Controllers;

class LoginController
{
    public function index()
    {
        // Se JÁ estiver logado, manda pra Home (Feed)
        if (isset($_SESSION['login'])) {;
            \Portal\Utilidades::redirect(INCLUDE_PATH);
            return;
        }

        // Processa o envio do formulário de login
        if (isset($_POST['login'])) {//se tiver clicado em logar no formulario de login
            
            //armazena email e senha
            $login = $_POST['email'];
            $senha = $_POST['senha'];

            $verifica = \Portal\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");//conecta e consulta no banco todos os dados do usuario que tem esse email passado
            $verifica->execute(array($login));//passa o email do usuario como parametro pro banco

            if ($verifica->rowCount() == 0) {//se não tiver um email desse la
                \Portal\Utilidades::alerta('Não existe nenhum usuário com este e-mail...');//avisa
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');//e atualiza
            } else {//mas se tiver
                $dados = $verifica->fetch();//armazena os dados coletados
                $senhaBanco = $dados['senha'];//e a senha 

                //usa o bcrypt pra verificar se a senha passada pelo usuario é a mesma que ta salva no banco
                if (\Portal\Bcrypt::check($senha, $senhaBanco)) {//passa os parametros pra funcao

                    //se tiver tudo certo atualiza os dados da seção com os dados do usuario que logou
                    $_SESSION['login'] = $dados['email'];
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['nome'] = explode(' ', $dados['nome'])[0];//mas pega so o primeiro nome pra por no nome
                    $_SESSION['img'] = $dados['img'];

                    \Portal\Utilidades::alerta('Logado com sucesso!');//avisa que deu certo
                    \Portal\Utilidades::redirect(INCLUDE_PATH);//e manda pra pagina inicial
                } else {//se nao der certo
                    \Portal\Utilidades::alerta('Dados incorretos...');//era bom colocar um caso pra email e senha errado mas assim tambem é mais seguro
                    \Portal\Utilidades::redirect(INCLUDE_PATH . 'login');//atualiza
                }
            }
            return;
        }

        // Caminho absoluto: Volta uma pasta a partir de Controllers e entra em Views
        include(__DIR__ . '/../Views/Pages/login.php');
    }
}
?>