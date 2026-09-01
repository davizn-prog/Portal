<header>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/videos.css" type="text/css" rel="stylesheet" />
</header>

<section class="secao-gameplay">

    <div class="container-gameplay">

        <h1>Título da gameplay</h1>

        <!--MODULO - controles-->
        <div class="MOD-container-controles">
            <div class="MOD-controle MOD-anterior anterior-gameplay" videoAnterior></div><!--botao-->
            <div class="MOD-controle MOD-proximo proximo-gameplay" proximoVideo></div><!--botao-->
        </div><!--container dos controles-->
        <div class="clear"></div><!--limpeza de flutuação-->
        <!--MODULO - controles -->

    </div><!--container superior - dos botoes superiores e titulo-->

    <div class="player-container">
        <video autoplay controls loop class="player pelicula">
            <source src="" />
        </video><!--o video-->
    </div><!--container-->
</section>

<section id="Videos" class="MOD-secao section-videos" target="sec" goto=""><!-- MOD - menu-scroll -->
    <div class="video-livre">

        <?php

        $videosPostados = \Portal\Models\VideosModel::postsVideos();

        foreach ($videosPostados as $key => $vdInfo) {

        ?>
            <article class="video hoverP" name="<?php echo $vdInfo['arquivo_url'] ?>">
                <a href="javascript:void(0)" class="thumbnail" data-duration="<?php echo $vdInfo['duracao'] ?>">
                    <video class="imagem-thumbnail" src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $vdInfo['arquivo_url'] ?>" muted></video>
                </a><!--thumbnail-->
                <div class="video-bottom">
                    <a href="">
                        <img class="logo-canal" src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $vdInfo['img'] ?>" alt="">
                    </a><!--logo do canal-->
                    <div class="video-bottom-detalhes">
                        <a href="" class="titulo-video">
                            <?php echo  $vdInfo['post']?>
                        </a><!--titulo-->
                        <br>
                        <a href="" class="nome-canal"><?php echo  $vdInfo['nome_usr']?></a><!--canal-->
                        <br>
                        <a href="" class="visualizacoes">1Mi visualizações</a><!--views-->
                        <span>•</span>
                        <a href="" class="tempo-postagem"><?php echo  $vdInfo['date']?></a><!--tempo de postagem-->
                    </div><!--dados-->
                </div><!--dados inferiores-->
            </article><!--video-->

        <?php } ?>

    </div><!--container de videos nao agrupados-->
</section><!--seção de videos-->