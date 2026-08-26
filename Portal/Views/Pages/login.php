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
        <h2>Faça seu login ae meu paçero e entre na melhor comunidade da internet!</h2><!--titulo-->
        <form method="post">
            <!--container do email-->
            <div class="input-container">
                <p>Email</p>
                <input type="text" name="email" placeholder="Login...">
            </div><!--container do email-->
            <!--container do email-->
            <div class="input-container">
                <p>Senha</p>
                <input type="password" name="senha" placeholder="Senha...">
            </div><!--container da senha-->

            <div class="input-submit-container">
                <input type="submit" name="acao" value="Logar!"></input>
                <p><a href="<?php echo INCLUDE_PATH ?>registrar">Criar Conta</a></p>
            </div><!--botao-->
            <input type="hidden" name="login">
        </form><!--formulario-->
    </div><!--container-->

    <div class="containeres">
        <div class="container1">
            <h2>texto texto texto texto texto!</h2>
            <p>Aliquam ullamcorper, erat a euismod porta, arcu dolor convallis mi, aliquet efficitur velit massa at
                nulla. Curabitur ullamcorper erat lacus, vel fermentum risus egestas ut. Etiam efficitur at dolor nec
                rutrum. Mauris sit amet nibh at dui vehicula maximus. Interdum et malesuada fames ac ante ipsum primis
                in faucibus. Aenean porta vulputate nunc non dictum. Maecenas dictum sit amet augue vitae ornare. Duis
                commodo lorem quis leo dignissim, ut malesuada leo imperdiet. Morbi consectetur sem est, a tempor diam
                elementum id. Mauris nec ex rutrum, semper metus in, pretium quam. Praesent pulvinar in sapien eget
                efficitur. Praesent convallis dui et nibh bibendum, in malesuada ex pharetra. Nam viverra quam a leo
                convallis ullamcorper. Nullam et bibendum dolor. Mauris semper malesuada ultrices. Ut mauris est, mollis
                quis vestibulum sit amet, elementum eget sem.
            </p>
        </div><!--container-->
        <h2>Melhor conteudo da internet está aqui</h2>
        <div class="container2">
            <div class="container2-boxes">
                <h2>Mais um texto aleatorio</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id sodales nisl. Cras vestibulum
                    tortor vitae ante dignissim, ut rutrum lorem molestie. Maecenas suscipit aliquet auctor. Quisque in
                    luctus ipsum. Nulla varius diam eu eleifend pharetra. Mauris non congue nulla. Duis id dictum ex,
                    malesuada vestibulum augue.</p>
            </div><!--container-->
            <div class="container2-boxes">
                <h2>Mais um texto aleatorio</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id sodales nisl. Cras vestibulum
                    tortor vitae ante dignissim, ut rutrum lorem molestie. Maecenas suscipit aliquet auctor. Quisque in
                    luctus ipsum. Nulla varius diam eu eleifend pharetra. Mauris non congue nulla. Duis id dictum ex,
                    malesuada vestibulum augue.</p>
            </div><!--container-->
            <div class="container2-boxes">
                <h2>Mais um texto aleatorio</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id sodales nisl. Cras vestibulum
                    tortor vitae ante dignissim, ut rutrum lorem molestie. Maecenas suscipit aliquet auctor. Quisque in
                    luctus ipsum. Nulla varius diam eu eleifend pharetra. Mauris non congue nulla. Duis id dictum ex,
                    malesuada vestibulum augue.</p>
            </div><!--container-->
        </div><!--container-->
    </div>
</body>
<script type="text/javascript" src="<?php echo INCLUDE_PATH_STATIC ?>assets/js/login.js"></script>

</html>