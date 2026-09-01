<?php

namespace Portal\Models;

class HomeModel
{

	//coloca os posts no feed
	public static function postFeed($post, $tipo, $nomeArquivo, $duracao)//começa recebendo como parametros as variaveis de home controller
	{
		$pdo = \Portal\MySql::connect();//conecta com o banco de dados
		$post = strip_tags($post);//verificação de segurança no conteudo de posts

		//verificação dos dados do textarea
		if (preg_match('/\[imagem/', $post)) {//verifica se o conteudo contem um link de imagem personalizado dentro de post
			$post = preg_replace('/(.*?)\[imagem=(.*?)\]/', '<p>$1</p><img src="$2" />', $post);
			
			//aqui em cima
			//se tiver pega tudo depois do igual no link de imagem e todo conteudo de texto
			//dai substitui tudo isso por: conteudo de texto dentro de uma tag p e o link da imagem dentro sa src da tag img
		} else {
			$post = '<p>' . $post . '</p>';//se nao tiver imagem, poe so o texto mesmo
		}

		//prepare e execute sao uma forma segura de passar dados pro banco para evitar sql injection.

		//atualizamos a tabela post com dados de um novo post
		$postFeed = $pdo->prepare("INSERT INTO `posts` VALUES (null,?,?,?,?,?,?)");//preparamos o envio dos dados pro banco e armazenamos
		// inserir na ordem: usuario_id, post, date, tipo, arquivo
		$postFeed->execute(array($_SESSION['id'], $post, date('Y-m-d H:i:s', time()), $tipo, $nomeArquivo, $duracao));//dai passamos o que vamos enviar e em quais posições

		//atualizamos a tabela usuarios com dados do ultimo post que ele fez
		$atualizaUsuario = $pdo->prepare("UPDATE usuarios SET ultimo_post = ? WHERE id = ?");//preparamos o envio dos dados pro banco e armazenamos
		$atualizaUsuario->execute(array(date('Y-m-d H:i:s', time()), $_SESSION['id']));//aqui vamos passar somente a hora do post e o id de quem postou
	}

	//controla a exibição dos posts por mais novo e amizades
	public static function retrieveFriendsPosts()
	{

		$pdo = \Portal\MySql::connect();//conecta no banco

		//verifica os amigos do usuario em questao
		$amizades = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND status = 1) OR (recebeu = ? AND status = 1)");//prepara a estrutura dos dados verificando preenchimento de colunas
		//acima
		//ele verifica se o usuario em questao (abaixo) tem pedido de amizade enviado ou recebido e status de aceitação 1 (confirmado)
		$amizades->execute(array($_SESSION['id'], $_SESSION['id']));//passa o id da seção como identificador da consulta da tabela acima

		//percorre as amizades pra armazenar num novo array
		$amizades = $amizades->fetchAll();//armazena um array que é feito a partir do objeto que contem as amizades aceitas consultadas acima
		$amigosConfirmados = array();//cria um novo array
		foreach ($amizades as $key => $value) {// loop no array de amizades
			if ($value['enviou'] == $_SESSION['id']) {//se o usuario da seção tiver enviado
				$amigosConfirmados[] = $value['recebeu'];//o novo array recebe o indice do usuario que recebeu e aceitou (conforme consulta inicial acima) o pedido
			} else {
				$amigosConfirmados[] = $value['enviou'];// a mesma coisa do if so que pega o usuario que enviou a amizade pro usuario da seção e armazena no novo array. todos sao amigos de qualquer forma. 
			}
		}

		$listaAmigos = array();//cria um array pra receber os amigos confirmados acima

		//abaixo
		//percorre o array dos amigos confirmados e preenche o novo array (acima) com dados dos amigos do usuario da seção
		//lembrar de atualizar os novoos campos da tabela
		foreach ($amigosConfirmados as $key => $value) {
			//abaixo
			//dentro do novo array vai ser armazenado o resultado de uma consulta de uma função de usuarios model
			//que recebe como parametro o valor do indice atual de amigosconfirmados 
			//entao dentro do novo array vai ser armazenado todos os dados do usuario consultado
			
			//array no indice atual coluna id recebe o resultado da funcao que é uma consulta do na tabela usuarios
			//que pega todos os dados do usuario id passado em value. entao assim armazena em cada posição do array
			//listar amigos uma nova informação do amigo consultado. as linhas das informações armazenadas sao as
			//linhas abaixo
			$listaAmigos[$key]['id'] = \Portal\Models\UsuariosModel::getUsuarioById($value)['id'];
			$listaAmigos[$key]['nome'] = \Portal\Models\UsuariosModel::getUsuarioById($value)['nome'];
			$listaAmigos[$key]['email'] = \Portal\Models\UsuariosModel::getUsuarioById($value)['email'];
			$listaAmigos[$key]['img'] = \Portal\Models\UsuariosModel::getUsuarioById($value)['img'];
			$listaAmigos[$key]['ultimo_post'] = \Portal\Models\UsuariosModel::getUsuarioById($value)['ultimo_post'];
		}

		//ordenação de posts
		usort($listaAmigos, function ($a, $b) {//vai fazer a ordenação do conteudo de listaamigos de dois em dois usando a e b como parametro pra receber os valores da comparação
			if (strtotime($a['ultimo_post']) > strtotime($b['ultimo_post'])) {//os valores sao da coluna ultimo post que tem seu valor convertido pra numerico representando segundos
				return -1;//se um for maior que o outro, tras pra frente
			} else {
				return +1;//se nao, pra tras (no feed o mais recente é quem ta em cima (mais perto do 0))
			}
		});

		$posts = [];//posts recebe um array vazio

		foreach ($listaAmigos as $key => $value) {

			$ultimoPost = $pdo->prepare("SELECT * FROM posts WHERE usuario_id = ? ORDER BY date DESC");//prepara o banco consultando a tabela posts pelo id do usuario ordenado por data decrescente
			
			$ultimoPost->execute(array($value['id']));//o id do usuario vai ser o id do usuario de id conforme indice do loop atual

			if ($ultimoPost->rowCount() >= 1) {//se tiver pelo menos um post na consulta feita no execute

				$ultimoPost = $ultimoPost->fetch();//ultimopost recebe o ultimo post

				//preenche o array posts com os dados de ultimopost
				//atualizar novoos campos da tabela
				$posts[$key]['usuario'] = $value['nome']; 
				$posts[$key]['img'] = $value['img'];
				$posts[$key]['data'] = $ultimoPost['date'];
				$posts[$key]['conteudo'] = $ultimoPost['post'];
				$posts[$key]['tipo'] = $ultimoPost['tipo'];
				$posts[$key]['arquivo_url'] = $ultimoPost['arquivo_url'];
			}
		}


		$me = $pdo->prepare("SELECT * FROM usuarios WHERE id = $_SESSION[id]");//mais uma consulta preparada. seleciona tudo da tabela usuarios conforme id do usuario da seção
		//aqui acima
		//dessa vez o id é passado direto na consulta

		$me->execute();

		$me = $me->fetch();//e pega o ultimo dado

		if (isset($posts[0])) {//se o primeiro indice de posts (post completo mais recente) estiver preenchido 
		//acima
		//serve para garantir que o feed de amigos não está totalmente vazio antes de tentar comparar com o post do usuario da seção
			if (strtotime($me['ultimo_post']) > strtotime($posts[0]['data'])) {//e se o ultimo post do usuario da seção for mais recente que o ultimo post
				$ultimoPost = $pdo->prepare("SELECT * FROM posts WHERE usuario_id = $_SESSION[id] ORDER BY date DESC");
				//aqui acima 
				//prepara uma consulta selecionando tudo da tabela posts conforme id do usuario da seção ordenado por data descrescente

				$ultimoPost->execute();
				$ultimoPost = $ultimoPost->fetchAll()[0];//e pega o primeiro item (o ultimo post, ja que foi consultado em ordem decrescente)

				//adiciona novos dados no conteudo do array posts, na primeira posição, a partir dos dados do array ultimopost
				array_unshift($posts, array(
					'data' => $ultimoPost['date'],
					'conteudo' => $ultimoPost['post'],
					'tipo' => $ultimoPost['tipo'],
					'arquivo_url' => $ultimoPost['arquivo_url'],
					'me' => true
				));
			}
		}
		return $posts;
	}
}


