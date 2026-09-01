<?php

namespace Portal\Controllers;

class PerfilController
{

	public function index()
	{
		if (isset($_SESSION['login'])) {//se tiver logado

			if (isset($_POST['atualizar'])) {//e tiver clicado no botao de atualizar perfil
				$pdo = \Portal\MySql::connect();//conecta no banco
				$nome = strip_tags($_POST['nome']);//faz uma verificação de segurança no valor recebido no input nome e armazena
				$senha = $_POST['senha'];//armazena a senha

				//verificação do input nome
				if ($nome == '' || strlen($nome) < 3) {//se o nome estiver vazio ou for menor que 3 caracterer
					\Portal\Utilidades::alerta('Você precisa inserir um nome...');//avisa que nao pode
					\Portal\Utilidades::redirect(INCLUDE_PATH . 'perfil');//atualiza
				}

				//atualização de nome e senha
				if ($senha != '') {//se a senha for diferente de vazio
					$senha = \Portal\Bcrypt::hash($senha);//criptografa ela
					$atualizar = $pdo->prepare("UPDATE usuarios SET nome = ?, senha = ? WHERE id = ?");//prepara a atualização do banco
					$atualizar->execute(array($nome, $senha, $_SESSION['id']));//e atualiza passando o nome e senha obtidos mais o id do usuario da seção
					$_SESSION['nome'] = $nome;//e atualiza o nome do usuario na seção

					//atualização so do nome
				} else {//se nao tiver atualizado a senha
					$atualizar = $pdo->prepare("UPDATE usuarios SET nome = ?WHERE id = ?");
					$atualizar->execute(array($nome, $_SESSION['id']));//passa so o nome como parametro pra linha do usuario da seção
					$_SESSION['nome'] = $nome;
				}

				//atualização da foto
				if ($_FILES['file']['tmp_name'] != '') {//se o arquivo ja tiver sido carregado

					$file = $_FILES['file'];//armazena os dados do arquivo
					$fileExt = explode('.', $file['name']);//separa o nome da extensao e armazena no array pra usar a extensao depois
					$fileExt = $fileExt[count($fileExt) - 1];//guarda o ultimo indice do array (a quantidade dos itens do array -1) pra pegar a extensao do arquivo

					if ($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg') {//se for uma extensao de imagem
						//Formato válido.
						//Validar tamanho.
						$size = intval($file['size'] / 1024);//converte o tamanho do arquivo de bytes para kilobyes e armazena arredondado
						if ($size <= 300) {//se o tamanho for menor que ou igual a 300kb
							$uniqid = uniqid() . '.' . $fileExt;//o nome do arquivo vai ser um id unico mais sua extensão separados por um ponto

							$atualizaImagem = $pdo->prepare("UPDATE usuarios SET img = ? WHERE id = ?");//prepara uma alteração no banco pra preencher o campo img do id a ser passado 
							$atualizaImagem->execute(array($uniqid, $_SESSION['id']));//preenche o campo img do usuario da seção com o nome do arquivo passado acima 
							
							$_SESSION['img'] = $uniqid;//atualiza na seção a imagem atual do usuario com o novo nome

							move_uploaded_file($file['tmp_name'], 'C:\xampp\htdocs\Portal/uploads/' . $uniqid);//e guarda o arquivo carregado da pasta temporaria pra pasta de uploads

							// \Portal\Utilidades::alerta('Seu perfil foi atualizado junto com a foto!');//avisa
							\Portal\Utilidades::redirect(INCLUDE_PATH . 'perfil');//e atualiza
						} else {//se for maior que 300kb
							\Portal\Utilidades::alerta('Erro ao processar seu arquivo.');//avisa que nao da
							\Portal\Utilidades::redirect(INCLUDE_PATH . 'perfil');//e atualiza
						}
					} else {//se nao for uma extensao de imagem
						\Portal\Utilidades::alerta('Erro ao processar seu arquivo.');
						\Portal\Utilidades::redirect(INCLUDE_PATH . 'perfil');
					}
				}

				// \Portal\Utilidades::alerta('Seu perfil foi atualizado com sucesso!');
				\Portal\Utilidades::redirect(INCLUDE_PATH . 'perfil');
			}

			\Portal\Views\MainView::render('perfil');
		} else {
			\Portal\Utilidades::redirect(INCLUDE_PATH);//se nao tiver logado volta tudo 
		}
	}
}


?>