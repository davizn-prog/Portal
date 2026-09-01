<head>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/perfil.css" rel="stylesheet">
</head>
<section id="Perfil" class="MOD-secao secao-musica" target="sec" goto=""><!-- MOD - menu-scroll -->

	<h1>Editando Perfil:</h1>

	<div class="feed">
		<div class="editar-perfil">
			<br />
			<?php
			if (isset($_SESSION['img']) && $_SESSION['img'] == '') {//se o usuario não tiver uma foto registrada
				echo '<img style="max-width:400px;width:100%;" src="' . INCLUDE_PATH_STATIC . 'assets/img/avatar.jpg" />';//exibe uma padrão
			} else {//mas se ja tiver
				echo '<img style="max-width:400px;width:100%;" src="' . INCLUDE_PATH . 'uploads/' . $_SESSION['img'] . '" />';//exibe a imgem do usuario
			}
			?>
			<br />
			<!-- o formulario pra fazer alteraççoes -->
			<!-- ver perfilcontroller -->
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>">
				<input type="password" name="senha" placeholder="Sua nova senha...">
				<input type="file" name="file">
				<input type="hidden" name="atualizar" value="atualizar">
				<input type="submit" name="acao" value="Salvar!">
			</form>
		</div>
	</div><!--feed-->
</section>