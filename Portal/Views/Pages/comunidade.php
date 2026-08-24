<head>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/comunidade.css" rel="stylesheet">
</head>
<section id="Comunidade" class="MOD-secao home-novidades" target="sec" goto="">
	<div class="feed">
		<div class="comunidade">
			<div class="container-comunidade">
				<h2>Amigos</h2>
				<div class="container-comunidade-wraper">
					<?php foreach (\Portal\Models\UsuariosModel::listarAmigos() as $key => $value) { ?>
						<div class="container-comunidade-single">
							<div class="img-comunidade-user-single">
								<img src=" <?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />
							</div>
							<div class="info-comunidade-user-single">
								<h2> <?php echo $value['nome']; ?></h2>
								<p> <?php echo $value['email']; ?></p>
							</div>

						</div>

					<?php } ?>

				</div>
			</div>
			<br />

			<div class="container-comunidade">
				<h2>Comunidade</h2>
				<div class="container-comunidade-wraper">

					<?php
					$comunidade = \Portal\Models\UsuariosModel::listarComunidade();

					foreach ($comunidade as $key => $value) {

						$pdo = \Portal\MySqL::connect();
						$verificarAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ? AND status = 1) OR (enviou = ? AND recebeu = ? AND status = 1)");

						$verificarAmizade->execute(array($value['id'], $_SESSION['id'], $_SESSION['id'], $value['id']));
						if ($verificarAmizade->rowCount() == 1) {
							//Já são amigos, não existe necessidade de listar.
							continue;
						}

						if ($value['id'] == $_SESSION['id']) {
							continue;

						}
						?>

						<div class="container-comunidade-single">
							<div class="img-comunidade-user-single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />
							</div>
							<div class="info-comunidade-user-single">
								<h2><?php echo $value['nome']; ?></h2>
								<p><?php echo $value['email']; ?></p>
								<div class="btn-solicitar-amizade">
									<?php
									if (\Portal\Models\UsuariosModel::existePedidoAmizade($value['id'])) {
										?>
										<a
											href="<?php echo INCLUDE_PATH ?>comunidade?solicitarAmizade=<?php echo $value['id']; ?>">Solicitar
											Amizade</a>
									<?php } else { ?>
										<a href="javascript:void(0)" style="color:orange; border: orange solid 1px;">pedido
											pendente</a>
									<?php } ?>
								</div>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>
		</div>
	</div><!--feed-->
</section>