<?php
	
	namespace Portal\Models;

	class UsuariosModel{

		//verifica se o email digitado ja existe no banco
		public static function emailExists($email){//email é um post do input email de registrar.php recuperado em registarcontroller
			$pdo = \Portal\MySql::connect();//conecta no banco
			$verificar = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");//prepara a consulta de um email da coluna email da tabela usuarios
			$verificar->execute(array($email));//esse email é o email digitado no input email 

			if($verificar->rowCount() == 1){//se tiver encontrado um email
				//Email existe.
				return true;
			}else{//se nao tiver
				return false;
			}
		}

		//retorna todos os dados da tabela usuarios (id, nome, email, senha, ultimo_post, img)
		public static function listarComunidade(){

			$pdo = \Portal\MySql::connect();//conecta no banco

			$comunidade = $pdo->prepare("SELECT * FROM usuarios");//armazena a preparação da consulta de todos conteudo da tabela usuarios 

			$comunidade->execute();//e executa a consulta

			return $comunidade->fetchAll();//retorna pra solicitação externa a lista com todos os dados consultados

		}

		//insere no banco uma nova solicitação de amizade do usuario da seção
		public static function solicitarAmizade($idPara){//idpara vem de comunidadecontroller

			$pdo = \Portal\MySql::connect();//conecta no banco

			$verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ?) OR 
				(enviou = ? AND recebeu = ?)");//prepara a consulta de toda a tebela amizade conforme o id de quem recebeu ou enviou o que.
				//perceba que é apenas de uma pessoa para uma pessoa. alem do usuario da seção a outra vai ser apenas a pessoa de id obtido no link a de solicitação
				//ver comunidade.php e comunidadecontroller

			$verificaAmizade->execute(array($_SESSION['id'],$idPara,$idPara,$_SESSION['id']));//passa os parametros pros casos do usuario da seção ter enviado ou recebido
			//ele ta verificando se o usuario da seçao tem solicitação pendente 

			if($verificaAmizade->rowCount() == 1){//se uma solicitação ja tiver sido feita pra ambos os casos acima
				return false;//impede a inclusao no banco de uma nova solicitação
			}else{//mas se nao tiver uma solicitação ja feita
				$insertAmizade = $pdo->prepare("INSERT INTO amizades VALUES (null,?,?,0)");//preparamos a atualização da tabela amizades com os valores a serem passados
				if(
				$insertAmizade->execute(array($_SESSION['id'],$idPara))){//incluimos uma nova linha de solicitação onde quem envia é o usuario da seção e quem recebe é o
				//usuario de id obtido em comunidade.php ao clicar no link a de solicitação
					return true;
				}
			}

			return true;
		}

		//retorna uma lista com todas as solicitações de amizade que o usuario da seção recebeu que ainda não tenham sido aceitas
		public static function listarAmizadesPendentes(){

			$pdo = \Portal\MySql::connect();//conecta no banco

			$listarAmizadesPendentes = $pdo->prepare("SELECT * FROM amizades WHERE recebeu = ? AND status = 0 ");//prepara a consulta de todas as solicitações recebidas
			//do usuario da seção (abaixo) que não tenham sido aceitas ainda

			$listarAmizadesPendentes->execute(array($_SESSION['id']));//passa o usuario da seção como parametro

			return $listarAmizadesPendentes->fetchAll();//e retorna uma lista com todos esses casos

		}

		//retorna uma lista com id de todos os usuarios
		public static function getUsuarioById($id){//recebendo como parametro a variavel id
			$pdo = \Portal\MySql::connect();//conecta no banco

			$usuario = $pdo->prepare("SELECT * FROM usuarios WHERE id = ? ");//seleciona tudo da tabela usuarios conforme o id a ser passado

			$usuario->execute(array($id));

			return $usuario->fetch();//e retorna uma lista com os dados do usuario do id consultado
		}

		//verifica se existe pedido de amizade
		public static function existePedidoAmizade($idPara){
			$pdo = \Portal\MySql::connect();//conecta no banco

			$verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ?) OR 
				(enviou = ? AND recebeu = ?)");//prepara a consulta de toda a tebela amizade conforme o id de quem recebeu ou enviou o que

			$verificaAmizade->execute(array($_SESSION['id'],$idPara,$idPara,$_SESSION['id']));//executa a consulta acima de primeiro caso sendo o usuario da seção enviando e outro recebendo
			//e depois o contratio

			if($verificaAmizade->rowCount() == 1){//se houver um caso assim na tabela (se o usuario ativo tiver solicitações feitas ou recebidas)
				return false;
			}else{
				return true;
			}
		}

		//atualizar pedidos de amizade
		public static function atualizarPedidoAmizade($enviou,$status){ 
			$pdo = \Portal\MySql::connect();//conecta no banco

			if($status == 0){//se i status de solicitação tiver gerado valor 0
				
				//o pedido nao foi aceito
				$del = $pdo->prepare("DELETE FROM amizades WHERE enviou = ? AND recebeu = ? AND status = 0");//prepara pra remover do banco a solicitação. 
				//aqui acima
				//enviou e recebeu tem como valor os ids dos usuarios. o status é um booleano

				$del->execute(array($enviou,$_SESSION['id']));//executa o delete acima passando como parametro (os ?) o id de quem enviou o pedido e o id do usuario da seção

			}else if($status == 1){//e se tiver aceito o pedido (get valou 1 de home controller)

				$aceitarPedido = $pdo->prepare("UPDATE amizades SET status = 1 WHERE enviou = ? AND recebeu = ?");//prepara atualização do banco positivando o status de aceitação pros ids de usuario em questao

				$aceitarPedido->execute(array($enviou,$_SESSION['id']));//executa o update acima passando como parametro (os ?) o id de quem enviou o pedido e o id do usuario da seção

				if($aceitarPedido->rowCount() == 1){//se tiver sido feita alguma atualização acima
					return true;
				}else{
					return false;
				}
			}
		}

		//retorna uma lista com os dados (nome, email, img) dos amigos do usuaro da seção
		public static function listarAmigos(){
			$pdo = \Portal\MySql::connect();//conecta no banco

			$amizades = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND status = 1) OR (recebeu = ? AND status = 1)");//prepara a consulta de todas as solicitações aceitas
			//independente se foi uma que o usuario da seção enviou ou recebeu

			$amizades->execute(array($_SESSION['id'],$_SESSION['id']));//passa o usuario da seção como parametro pra

			$amizades = $amizades->fetchAll();//armazena a listagem de todas solicitações aceitas do usuario da seção (seja ele que tenha aceito ou não)

			$amigosConfirmados = array();//cria um array vazio

			//preeenche o array com os amigos do usuario da seção
			foreach ($amizades as $key => $value) {//percorre todas as solicitações armazenadas
				if($value['enviou'] == $_SESSION['id']){//se quem enviou for o proprio usuario da seção
					$amigosConfirmados[] = $value['recebeu'];//armazena o id do usuario que recebeu
				}else{//se quem enviou não foi o usuario da seção
					$amigosConfirmados[] = $value['enviou'];//armazena  o id do usuario que enviou
				}
			}

			$listaAmigos = array();//cria um array vazio

			//e armazena no array acima os dados abaixo dos amidos do usuario da seção
			foreach ($amigosConfirmados as $key => $value) {
				$listaAmigos[$key]['nome'] = self::getUsuarioById($value)['nome'];
				$listaAmigos[$key]['email'] = self::getUsuarioById($value)['email'];
				$listaAmigos[$key]['img'] = self::getUsuarioById($value)['img'];
			}

			return $listaAmigos;
		}
	}
?>

