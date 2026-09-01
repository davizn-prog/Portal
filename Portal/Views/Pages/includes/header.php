<!DOCTYPE html>
<html lang="pt-br" data-theme="OceanDD">

<head>
    <title>Bem-vindo, <?php echo $_SESSION['nome']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Exemplo de descrição para o meu site">
    <meta name="keyword" content="palavras-chaves,separadas,por,virgula">
    <meta name="author" content="Davi Cavalcante">
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/global.css" rel="stylesheet">
    <script>
        const INCLUDE_PATH = "<?php echo INCLUDE_PATH; ?>";
        const INCLUDE_PATH_STATIC = "<?php echo INCLUDE_PATH_STATIC; ?>";
    </script>
</head>

<body>
    <h1 class="boas-vindas" id="boasVindas"
        style="<?php echo (isset($filename) && ($filename === 'feed' || $filename === 'home' || $filename === '')) ? '' : 'display: none;'; ?>">
        Bem-vindo, <?php echo $_SESSION['nome']; ?>
    </h1>

    <!-- pedidos de amizade -->
    <div class="friends-request-feed">
        <h3>Solicitações de amizade</h3>

        <?php

        foreach (\Portal\Models\UsuariosModel::listarAmizadesPendentes() as $key => $value) {
            $usuarioInfo = \Portal\Models\UsuariosModel::getUsuarioById($value['enviou']);
            ?>
            <div class="friend-request-single">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />
                <div class="friend-request-single-info">
                    <h3><?php echo $usuarioInfo['nome'] ?></h3>
                    <p><a href="<?php echo INCLUDE_PATH ?>?aceitarAmizade=<?php echo $usuarioInfo['id'] ?>">Aceitar</a>
                        | <a href="<?php echo INCLUDE_PATH ?>?recusarAmizade=<?php echo $usuarioInfo['id'] ?>">Recusar</a>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- pedidos de amizade -->
     
    <!-- MODULO - menu superior-->
    <nav class="MOD-menu-navegacao MOD-nav-superior">
        <ul>
            <!--o conteudo dos links da lista sao os IDs das seções-->

        </ul><!--lista-->
    </nav><!--menu que vai ser ativao ao descer pra baixo do menu header-->
    <!-- MODULO - menu superior-->
    <!-- menu horizontal-->
    <nav class="menu-horizontal">
        <div class="menu2-h">
            <div class="menu2-container-navegacao-h">
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Início</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>perfil">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Perfil</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>comunidade">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Comunidade</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>resenhas">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Resenhas</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>videos">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Videos</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>musica">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Audio</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>feedback">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Feedback</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a>
                        <div class="icone-menu"></div>
                    </a>
                    <span>Galeria</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a>
                        <div class="icone-menu"></div>
                    </a>
                    <span>Solicitações</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a>
                        <div class="icone-menu"></div>
                    </a>
                    <span>Temas</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="" href="<?php echo INCLUDE_PATH ?>?loggout">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Logout</span>
                </div><!--container da opção-->
            </div>
        </div><!-- o bloco do menu com links pras paginas -->
    </nav><!--menu horizontal-->

    <!--menu leteral-->
    <nav class="menu-lateral">
        <div class="expandir-btn">
            <div class="expandir"></div>
            <div class="encolher"></div>
        </div><!--botao pra expandir o menu-->

        <div class="clear"></div><!--limpeza de flutuação-->

        <!--menu lateral-->
        <div class="menu2">
            <div class="menu2-container-navegacao">
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Início</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>perfil">
                        <img class="icone-menu" src="<?php echo INCLUDE_PATH; ?>uploads/<?php echo $_SESSION['img']; ?>"
                            alt="">
                    </a>
                    <span>Perfil</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>comunidade">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Comunidade</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>resenhas">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Resenhas</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>videos">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Videos</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>musica">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Audio</span>
                </div><!--container da opção-->
                <div class="menu2-opcao-h">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>galeria">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Galeria</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>feedback">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Feedback</span>
                </div><!--container da opção-->
                <div class="menu2-opcao">
                    <a class="" href="<?php echo INCLUDE_PATH ?>?loggout">
                        <div class="icone-menu"></div>
                    </a>
                    <span>Logout</span>
                </div><!--container da opção-->

            </div>
        </div><!--o segundo bloco do menu com links pras paginas-->
        <div class="menu3">
            <div class="tema-oceandd temas-btn"></div>
            <div class="tema-aura temas-btn"></div>
        </div><!--terceiro bloco do menu com a troca de temas-->
    </nav><!--menu lateral-->

    <main class="inicio-main">

        <!--abaixo a estilização do fundo da pagina-->
        <div class="corpo-de-fundo">

            <!--aqui ficam as imagens animadas passando-->

        </div><!--estilização do fundo da pagina-->

        <!-- container principal scrollY -->
        <div class="container-central">
            <div class="container-central__conteudos container-secoes">
                <header>
                    <!--MODULO - menu superior fixo-->
                    <nav class="MOD-menu-navegacao MOD-nav-header">
                        <ul>

                            <!--o conteudo dos links da lista sao os IDs das seções-->

                        </ul><!--lista-->
                    </nav><!--menu que vai ficar fixo no header-->
                    <!--MODULO - menu superior fixo-->
                </header>