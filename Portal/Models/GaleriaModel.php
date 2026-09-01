<?php

namespace Portal\Models;

class GaleriaModel
{

	public static function postsImagens()
	{
		$pdo = \Portal\MySql::connect();

		//aqui abaixo
		//vai retornar um array com todos os dados de posts do tipo video,
		//vai mesclar as linhas das tabelas usuarios e posts pelo id do usuario pra retornar 
		//na linha referente a um post todos os dados de posts mais os dados img e nome de usuario
		$imagensPostadas = $pdo->prepare("
		SELECT posts.*, usuarios.img, usuarios.nome AS nome_usr
        FROM posts 
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id 
        WHERE posts.tipo = 'imagem' 
        ORDER BY posts.date DESC
		");
		//tentando traduzir:
		//selecione tudo de posts. de usuarios, a coluna img. de usuarios a coluna nome mas renomeada pra nome_canal
		//em posts
		//junte a tabela usuarios juntando as colunas 'id' de usuariios e 'usuario_id' de posts mas apenas onde em posts o tipo seja video
		//ordena por ordem de data decrescente

		$imagensPostadas->execute();

		$imagensPostadas = $imagensPostadas->fetchAll();

		return $imagensPostadas;
	}
}