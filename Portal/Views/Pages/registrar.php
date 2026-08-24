<!DOCTYPE html>
<html>

<head>
	<title>Login na Rede Social</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/login.css" rel="stylesheet">
</head>

<body>
	<div class="formulario">
		<h3 style="text-align: center;">Crie sua Conta!</h3>
		<form method="post">

			<!--container do nome-->
			<div class="input-container">
				<p>Nome</p>
				<input type="text" name="nome" placeholder="Seu nome...">
			</div><!--container do nome-->

			<!--container do email-->
			<div class="input-container">
				<p>Email</p>
				<input type="text" name="email" placeholder="E-mail...">
			</div><!--container do email-->

			<!--container da senha-->
			<div class="input-container">
				<p>Senha</p>
				<input type="password" name="senha" placeholder="Senha...">
			</div><!--container da senha-->

			<!--container do botao-->
			<div class="input-submit-container">
				<input type="submit" name="acao" value="Criar Conta!"></input>
			</div><!--container do botao-->

			<input type="hidden" name="registrar" value="registrar" />
		</form><!--formulario-->
	</div><!--container-->
</body>
<script type="text/javascript" src="<?php echo INCLUDE_PATH_STATIC ?>assets/js/login.js"></script>
</html>