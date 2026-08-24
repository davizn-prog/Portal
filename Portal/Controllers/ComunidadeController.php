<?php
	
	namespace Portal\Controllers;

	class ComunidadeController{


		public function index(){
			if(isset($_SESSION['login'])){

				// if(isset($_GET['solicitarAmizade'])){
				// 	$idPara = (int) $_GET['solicitarAmizade'];
				// 	if(\Portal\Models\UsuariosModel::solicitarAmizade($idPara)){
				// 		\Portal\Utilidades::alerta('Amizade solicitada com sucesso!');
				// 		\Portal\Utilidades::redirect(INCLUDE_PATH.'comunidade');
				// 	}else{
				// 		\Portal\Utilidades::alerta('Ocorreu um erro ao solicitar a amizade...');
				// 		\Portal\Utilidades::redirect(INCLUDE_PATH.'comunidade');
				// 	}
				// }

			\Portal\Views\MainView::render('comunidade');
			}else{
				\Portal\Utilidades::redirect(INCLUDE_PATH);
			}
			
		}

	}

?>