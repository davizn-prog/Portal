<?php

namespace Portal\Controllers;

class RegistrarController
{

    //registra um novo usuario
    public function index()
    {
        if (isset($_POST['registrar'])) {//se tiver clicado no botao de registrar no formulario de registro

            //armazena as informações fornecidas
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {//se o email digitado nao passar na verificação
                \Portal\Utilidades::alerta('E-mail Inválido.');//avisa que não é
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');//e atualiza
            } else if (strlen($senha) < 6) {//e se a senha for menor que 6 digitos
                \Portal\Utilidades::alerta('Sua senha é muito curta.');//avisa que nao pode
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');//e atualiza
            } else if (\Portal\Models\UsuariosModel::emailExists($email)) {//e se o email ja existir no banco (passa o email digitado como parametro pra funcao de verificação)
                \Portal\Utilidades::alerta('Este e-mail já existe no banco de dados!');//avisa que ja tem
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');//e redireciona
            } else {
                //mas se nada acima for verdadeiro (se tiver tudo certo)
                //Registra o usuário.

                $senha = \Portal\Bcrypt::hash($senha);//primeiro salva a senha criptografada
                $registro = \Portal\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?, '', '')");//prepara a atualização do banco
                //inserindo uma linha na tabela usuarios contendo tres valores passados abaixo

                $registro->execute(array($nome, $email, $senha));//que sao os passados no formulario de cadastro

                \Portal\Utilidades::alerta('Registrado com sucesso!');//alerta que o registro foi feito
                \Portal\Utilidades::redirect(INCLUDE_PATH);//e redireciona pra pagina inicial
            }
        }

        // Caminho absoluto: Volta uma pasta a partir de Controllers e entra em Views
        include(__DIR__ . '/../Views/Pages/registrar.php');
    }
}
?>