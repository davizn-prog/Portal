<head>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/comunidade.css" rel="stylesheet">
</head>
<section id="Comunidade" class="MOD-secao home-novidades" target="sec" goto="">
	<div class="feed">
		<div class="comunidade">
			<div class="container-comunidade">
				<h2>Amigos</h2>
				<div class="container-comunidade-wraper">

					<!-- usa a lista que a funcao retorna pra coletar os dados dos amigos e preencher os cards a cada iteração -->
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
					<!-- usa a lista que a funcao retorna pra coletar os dados dos amigos e preencher os cards a cada iteração -->

				</div>
			</div>
			<br />
			<div class="container-comunidade">
				<h2>Comunidade</h2>
				<div class="container-comunidade-wraper">

					<!-- usa a lista que a funcao retorna pra coletar os dados dos usuarios cadastrados e preencher os cards a cada iteração -->
					<?php

					$comunidade = \Portal\Models\UsuariosModel::listarComunidade();

					foreach ($comunidade as $key => $value) {

						//aqui abaixo conecta no banco pra verificar os usuarios com solicitações aceitas relacionados com o usuario da seção
						$pdo = \Portal\MySqL::connect();
						$verificarAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ? AND status = 1) OR (enviou = ? AND recebeu = ? AND status = 1)");
						$verificarAmizade->execute(array($value['id'], $_SESSION['id'], $_SESSION['id'], $value['id']));

						//porque se ja foi feita e aceita a solicitação nao tem necessidade de mostrar
						if ($verificarAmizade->rowCount() == 1) {
							continue;
						}

						//se for o proprio usuario da seção tambem não porque $comunidade tambem inclui ele
						if ($value['id'] == $_SESSION['id']) {
							continue;
						}
						?>

						<!-- aqui fica o card -->
						<div class="container-comunidade-single">

							<div class="img-comunidade-user-single">
								<img src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />
							</div>


							<div class="info-comunidade-user-single">

								<h2><?php echo $value['nome']; ?></h2>
								<p><?php echo $value['email']; ?></p>

								<div class="btn-solicitar-amizade">

									<!-- verifica se há um pedido pentente em relação a este usuario e inclui no banco uma nova solicitação ao clicar quando não há -->
									<?php
									if (\Portal\Models\UsuariosModel::existePedidoAmizade($value['id'])) {//usa o id da iteração atual como parametro pra funcao verificar
										?>
										<!-- caso não tenha (é o alvo principal de verificação na funcao, a função verifica se TEM) -->
										<a
											href="<?php echo INCLUDE_PATH ?>comunidade?solicitarAmizade=<?php echo $value['id']; ?>">Solicitar
											Amizade</a><!-- passa o id do usuario alvo da solicitação pro parametro na url pra ser resgatado pelo metodo get e usado na função de registrar pedido de amizade -->
									<?php } else { ?><!-- mas caso ja tenha uma solicitação ativa -->
										<a href="javascript:void(0)" style="color:orange; border: orange solid 1px;">pedido
											pendente</a>
									<?php } ?>
								</div><!-- verifica se há um pedido pentente em relação a este usuario e inclui no banco uma nova solicitação ao clicar quando não há -->

							</div>
						</div><!-- aqui fica o card -->

					<?php } ?><!-- usa a lista que a funcao retorna pra coletar os dados dos usuarios cadastrados e preencher os cards a cada iteração -->
				</div>
			</div>
		</div>
	</div><!--feed-->
</section>