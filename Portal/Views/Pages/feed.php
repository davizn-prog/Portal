<head>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/home.css" type="text/css" rel="stylesheet" />
</head>

<!-- feed de postagens -->
<!-- modulo - cabeçalho de seção-->

<section id="Postagens" class="MOD-secao home-novidades" target="sec" goto="">

    <div class="MOD-container-cabecalho-secao">
        <div class="MOD-container-h1">
            <h1>Postagens</h1>
            <div class="MOD-h1-linha"></div><!--linha que aparece em baixo do texto-->
        </div>
        <div class="MOD-ver-mais hoverP2"><a class="link-ajax" href=""></a></div><!--link pra pagina da seção-->
        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!-- modulo - cabeçalho de seção-->

    <div class="feed">
        <div class="feed-wraper">
            <div class="feed-form">
                <form method="post">
                    <textarea required="" name="post_content" placeholder="No que você está pensando?"></textarea>
                    <input type="hidden" name="post_feed">
                    <input type="submit" name="acao" value="Postar!">
                </form>
            </div><!--feed-form-->

            <?php

            $retrievePosts = \Portal\Models\HomeModel::retrieveFriendsPosts();

            foreach ($retrievePosts as $key => $value) {

                ?>

                <div class="feed-single-post">
                    <div class="feed-single-post-author">
                        <div class="img-single-post-author">

                            <?php if (!isset($value['me']) && $value['img'] == '') { ?>

                                <img src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />

                            <?php } else if (!isset($value['me'])) { ?>

                                    <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $value['img'] ?>" />

                            <?php } ?>

                            <?php if (isset($value['me']) && $_SESSION['img'] == '') { ?>

                                <img src="<?php echo INCLUDE_PATH_STATIC ?>imagens/avatar.jpg" />

                            <?php } else if (isset($value['me'])) { ?>

                                    <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $_SESSION['img'] ?>" />
                            <?php } ?>

                        </div>
                        <div class="feed-single-post-author-info">
                            <?php if (isset($value['me'])) { ?>
                                <h3><?php echo $_SESSION['nome']; ?> (eu)</h3>
                            <?php } else { ?>

                                <h3><?php echo $value['usuario'] ?></h3>

                            <?php } ?>
                            <p><?php echo date('d/m/Y H:i:s', strtotime($value['data'])) ?></p>
                        </div>
                    </div>
                    <div class="feed-single-post-content">
                        <?php echo $value['conteudo'] ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div><!--feed-->
</section>
<!-- feed de postagens -->
<!--seção de novidades-->
<section id="Novidades" class="MOD-secao home-novidades" target="sec" goto="">

    <!-- modulo - cabeçalho de seção-->
    <div class="MOD-container-cabecalho-secao">
        <div class="MOD-container-h1">
            <h1>Novidades</h1>
            <div class="MOD-h1-linha"></div><!--linha que aparece em baixo do texto-->
        </div>
        <div class="MOD-ver-mais hoverP2"><a class="link-ajax" href=""></a></div><!--link pra pagina da seção-->
        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!-- modulo - cabeçalho de seção-->

    <!--container de colunas-->
    <div class="container-colunas">
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
        <div class="container-colunas__coluna hoverM"></div><!--coluna-->
    </div><!--container de colunas-->

</section><!--seção de novidades-->

<!--Seção de videos-->
<section id="Videos" class="MOD-secao home-videos" target="sec" goto="">

    <!--MODULO - cabeçalho de seção-->
    <div class="MOD-container-cabecalho-secao">
        <div class="MOD-container-h1">
            <h1>Videos</h1>
            <div class="MOD-h1-linha"></div><!--linha que aparece em baixo do texto-->
        </div>
        <div class="MOD-ver-mais hoverP2"><a class="link-ajax" href=""></a></div><!--link pra pagina da seção-->
        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!--MODULO - cabeçalho de seção-->

    <h2>Novidade por aqui</h2>

    <!--MODULO - controles gs-->
    <div class="MOD-container-controles controles-shorts">
        <div class="MOD-controle MOD-anterior"></div>
        <div class="MOD-controle MOD-proximo"></div>
    </div><!--MODULO - controles gs-->

    <!--container pro overflow dos shorts-->
    <div class="shorts-overflow">
        <!--container dos shorts-->
        <div class="container-shorts">



            <!--short-->
            <div class="short hoverM" name="gameplay01.mp4">
                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short01.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div><!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->
            </div><!--short-->




            <!--short-->
            <div class="short hoverM" name="gameplay02.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short02.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div><!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->
            <!--short-->
            <div class="short hoverM" name="gameplay03.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short03.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div><!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->
            <!--short-->
            <div class="short hoverM" name="gameplay04.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short04.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div><!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay05.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short05.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay06.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short06.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay07.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short07.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do
                            cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay08.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short08.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do
                            cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay09.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short09.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do
                            cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem
                            upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

            <!--short-->
            <div class="short hoverM" name="gameplay10.mp4">

                <a class="link-ajax" href="videos">
                    <video muted loop class="short-video ">
                        <source src="<?php echo INCLUDE_PATH_STATIC ?>assets/videos/gameplays/shorts/short10.mp4" />
                    </video>
                    <div class="autor-cartao"><span>Davi Cavalcante</span></div>
                    <!--autor do video-->
                    <div class="metadados-cartao">
                        <span class="titulo-cartao">Titulo do
                            cartão</span><!--titulo do cartao-->
                        <span class="descricao-cartao">
                            breve descrição do cartão lorem upsum lorem upsum lorem
                            upsum
                        </span><!--descrição do cartao-->
                        <div>
                            <img src="<?php echo INCLUDE_PATH_STATIC ?>assets/view.png" alt=""
                                class="imagem-views"><!--imagem representativa-->
                            <span class="views">576</span>
                        </div><!--container das views-->
                    </div><!--metadados do video-->
                </a><!--o link para o exbibidor-->

            </div><!--short-->

        </div><!--container dos shorts-->
    </div><!--container pro overflow dos shorts-->

    <!--container dos banners dos videos-->
    <div class="container-banner-videos">
        <div class="container-banner-videos-m">
            <div class="container-video hoverP2">
                <video src="<?php echo INCLUDE_PATH_STATIC ?>"></video><!--video-->
            </div><!--container de video-->
            <div class="container-video hoverP2">

                <video src="<?php echo INCLUDE_PATH_STATIC ?>"></video><!--video-->
            </div><!--container de video-->
            <div class="container-video hoverP2">
                <video src="<?php echo INCLUDE_PATH_STATIC ?>"></video><!--video-->
            </div><!--container de video-->
            <div class="container-video hoverP2">

                <video src="<?php echo INCLUDE_PATH_STATIC ?>"></video><!--video-->
            </div><!--container de video-->
        </div><!--container medio-->
        <div class="controles-video-home">
            <div class="MOD-controle MOD-anterior"></div><!--botao-->
            <div class="MOD-controle MOD-proximo"></div><!--botao-->
        </div>
        <div class="overflow-video-g">
            <div class="container-banner-videos-g">
                <!-- aqui vao os videos do carrocel -->
            </div>
        </div><!--container grande-->
    </div><!--container dos banners dos videos-->
</section><!--seção dos videos-->

<!--seção das resenhas-->
<section id="Resenhas" class="MOD-secao home-resenhas" target="sec" goto="">

    <!--MODULO - cabeçalho de seção-->
    <div class="MOD-container-cabecalho-secao">
        <div class="MOD-container-h1">
            <h1>Resenhas</h1>
            <div class="MOD-h1-linha"></div><!--linha que aparece em baixo do texto-->
        </div>
        <div class="MOD-ver-mais hoverP2"><a class="link-ajax" href=""></a></div><!--link pra pagina da seção-->
        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!--MODULO - cabeçalho de seção-->

    <!--container dos banners das resenhas-->
    <div class="container-banner-resenhas">

        <div class="banner-resenha-g hoverP2">
            <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>resenha"></a><!--pra ir pra pagina do cartao clicado-->
            <div class="container-info-resenha">
                <div class="img-resenha"></div>
                <div class="textos">
                    <h3>Texto de titulo</h3>
                    <div class="MOD-container-controles-depoimento">
                        <div class="MOD-seta depoimento-anterior MOD-controle MOD-anterior"></div>
                        <div class="MOD-seta proximo-depoimento MOD-controle MOD-proximo"></div>
                    </div><!--container dos controladores-->

                    <div class="clear"></div><!--limpeza de flutuação-->

                    <div class="MOD-overflow-depoimentos">

                        <div class="MOD-depoimento">
                            <p>Mauris sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et lacus
                                ultrices, ut ultricies nisl pretium. Duis mollis elementum porta. Integer lobortis
                                pellentesque lacus, sit amet lacinia ipsum eleifend sed Mauris sollicitudin felis
                                non libero tempor rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl
                                pretium. Duis mollis elementum porta. Mauris sollicitudin felis non libero tempor
                                rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis
                                mollis elementum porta Mauris sollicitudin felis non libero tempor rhoncus. In
                                pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis mollis elementum
                                porta Mauris sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et
                                lacus ultrices, ut ultricies nisl pretium. Duis mollis elementum porta Mauris
                                sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et lacus ultrices,
                                ut ultricies nisl pretium. Duis mollis elementum porta Mauris sollicitudin felis non
                                libero tempor rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl
                                pretium. Duis mollis elementum porta Mauris sollicitudin felis non libero tempor
                                rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis
                                mollis elementum porta Mauris sollicitudin felis non libero tempor rhoncus. In
                                pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis mollis elementum
                                porta Mauris sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et
                                lacus ultrices, ut ultricies nisl pretium. Duis mollis elementum porta Mauris
                                sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et lacus ultrices,
                                ut ultricies nisl pretium. Duis mollis elementum porta Mauris sollicitudin felis non
                                libero tempor rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl
                                pretium. Duis mollis elementum porta Mauris sollicitudin felis non libero tempor
                                rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis
                                mollis elementum porta Mauris sollicitudin felis non libero tempor rhoncus. In
                                pulvinar tellus et lacus ultrices, ut ultricies nisl pretium. Duis mollis elementum
                                porta</p>
                        </div><!--depoimento-->
                        <div class="MOD-depoimento">
                            <p>“O Rafael foi muito atencioso, me buscou no aeroporto e garantiu toda comodidade e
                                conforto no almoço, no transfer, na visita ao veículo e durante o test-drive””</p>
                        </div><!--depoimento-->
                        <div class="MOD-depoimento">
                            <p>“Mauris sollicitudin felis non libero tempor rhoncus. In pulvinar tellus et lacus
                                ultrices, ut
                                ultricies nisl pretium. Duis mollis elementum porta. Integer lobortis pellentesque
                                lacus, sit amet
                                lacinia ipsum eleifend sed. Nullam eget diam sed est viverra interdum. Mauris
                                iaculis venenatis
                                enim. Sed interdum viverra nunc, quis pharetra nulla posuere ac Mauris sollicitudin
                                felis non libero
                                tempor rhoncus. In pulvinar tellus et lacus ultrices, ut ultricies nisl pretium.
                                Duis mollis
                                elementum porta. Integer lobortis pellentesque lacus, sit amet lacinia ipsum
                                eleifend sed. Nullam
                                eget diam sed est viverra interdum. Mauris iaculis venenatis enim. Sed interdum
                                viverra nunc, quis
                                pharetra nulla posuere ac.. Duis mollis elementum porta. Integer lobortis
                                pellentesque lacus, sit
                                amet lacinia ipsum eleifend sed. Nullam eget diam sed est viverra interdum. Mauris
                                iaculis venenatis
                                enim. Sed interdum viverra nunc, quis pharetra nulla posuere ac.. Duis mollis
                                elementum porta.
                                Integer lobortis pellentesque lacus, sit amet lacinia ipsum eleifend sed. Nullam
                                eget diam sed est
                                viverra interdum. Mauris iaculis venenatis enim. Sed interdum viverra nunc, quis
                                pharetra nulla
                                posuere ac
                            </p>
                        </div><!--depoimento-->
                        <div class="clear"></div><!--limpeza de flutuação-->
                    </div><!--container de depoimentos-->

                    <div class="MOD-container-seta-overflow">
                        <div class="MOD-seta-overflow " cima></div>
                        <div class="MOD-seta-overflow " baixo></div>
                    </div>

                </div><!--container dos textos-->
                <div class="clear"></div><!--limpeza de flutuação-->
            </div><!--container de informações da resenha-->
        </div><!--banner resenha grande-->
        <div class="banner-resenha-m hoverP2">
            <a class="link-ajax" href="<?php echo INCLUDE_PATH ?>resenha"></a><!--pra ir pra pagina do cartao clicado-->
            <div class="container-info-resenha-m">
                <div class="MOD-slider-autor-automatico">
                    <div class="MOD-container-overflow">
                        <div class="MOD-container-equipe">
                            <div class="MOD-container-autor">
                                <div class="MOD-container-titulos">
                                    <h2>Texto de titulo</h2>
                                    <span>texto de paragrafo texto</span>
                                </div> <!--titulos sobre o autor-->
                                <div class="MOD-foto-perfil"></div><!--foto de perfil-->
                                <p>texto de paragrafo texto de paragrafo texto de paragrafo texto paragrafo texto
                                    paragrafo
                                </p>
                            </div><!--container de informações sobre o autor com slide-->
                            <div class="MOD-container-autor">
                                <div class="MOD-container-titulos">
                                    <h2>Texto de titulo</h2>
                                    <span>texto de paragrafo texto</span>
                                </div> <!--titulos sobre o autor-->
                                <div class="MOD-foto-perfil"></div><!--foto de perfil-->
                                <p>texto de paragrafo texto de paragrafo texto de paragrafo texto paragrafo texto
                                    paragrafo
                                </p>
                            </div><!--container de informações sobre o autor com slide-->
                            <div class="MOD-container-autor">
                                <div class="MOD-container-titulos">
                                    <h2>Texto de titulo</h2>
                                    <span>texto de paragrafo texto</span>
                                </div> <!--titulos sobre o autor-->
                                <div class="MOD-foto-perfil"></div><!--foto de perfil-->
                                <p>texto de paragrafo texto de paragrafo texto de paragrafo texto paragrafo texto
                                    paragrafo
                                </p>
                            </div><!--container de informações sobre o autor com slide-->
                        </div><!--container onde vao ficar os cards dos autores-->
                        <div class="clear"></div><!--limpeza de flutuação-->
                    </div><!--container dedicado para aplicar efeito slide-->
                </div><!--sobre o autor-->
                <div class="MOD-container-indice-autor"></div><!--indice do texto que esta sendo exibido-->
                <div class="clear"></div><!--limpeza de flutuação-->
            </div><!--container de informações da resenha-->
        </div><!--banner resenha medio-->
    </div><!--container dos banners das resenha-->

    <!--MODULO - cabeçalho de seção-->
    <div class="MOD-container-cabecalho-secao">
        <div class="MOD-container-h1">
            <h1>Musica</h1>
            <div class="MOD-h1-linha"></div><!--linha que aparece em baixo do texto-->
        </div>
        <div class="MOD-ver-mais hoverP2"><a class="link-ajax" href=""></a></div><!--link pra pagina da seção-->
        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!--MODULO - cabeçalho de seção-->

</section><!--seção das resenhas-->