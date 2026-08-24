<?php

namespace Portal\Controllers;

class RegistrarController
{


    public function index()
    {

        if (isset($_POST['registrar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                \Portal\Utilidades::alerta('E-mail Inválido.');
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (strlen($senha) < 6) {
                \Portal\Utilidades::alerta('Sua senha é muito curta.');
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else if (\Portal\Models\UsuariosModel::emailExists($email)) {
                \Portal\Utilidades::alerta('Este e-mail já existe no banco de dados!');
                \Portal\Utilidades::redirect(INCLUDE_PATH . 'registrar');
            } else {
                //Registrar usuário.
                $senha = \Portal\Bcrypt::hash($senha);
                $registro = \Portal\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?, '', '')");
                $registro->execute(array($nome, $email, $senha));

                \Portal\Utilidades::alerta('Registrado com sucesso!');
                \Portal\Utilidades::redirect(INCLUDE_PATH);
            }


        }

        // Caminho absoluto: Volta uma pasta a partir de Controllers e entra em Views
        include(__DIR__ . '/../Views/Pages/registrar.php');
    }
}
?>