<?php
	
	namespace Portal\Controllers;

	class ComunidadeController{


		public function index(){
			if(isset($_SESSION['login'])){//se estiver logado

				if(isset($_GET['solicitarAmizade'])){//e tiver solicitado uma amizade
					$idPara = (int) $_GET['solicitarAmizade'];//armazena o id do usuario pra quem foi enviada a solicitação
					if(\Portal\Models\UsuariosModel::solicitarAmizade($idPara)){//passa o id do usuario solicitado como parametro pra funcao incluir no banco a nova solicitação
						\Portal\Utilidades::alerta('Amizade solicitada com sucesso!');//avisa que deu certo
						\Portal\Utilidades::redirect(INCLUDE_PATH.'comunidade');//atualiza
					}else{//se nao deu certo a funcao
						\Portal\Utilidades::alerta('Ocorreu um erro ao solicitar a amizade...');//avisa
						\Portal\Utilidades::redirect(INCLUDE_PATH.'comunidade');//e atualiza
					}
				}

			\Portal\Views\MainView::render('comunidade');//se tiver logado renderiza a pagina de comunidade
			}else{
				\Portal\Utilidades::redirect(INCLUDE_PATH);//se nao, volta pro inicio
			}
			
		}

	}

?>