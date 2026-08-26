<header>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/musica.css" type="text/css" rel="stylesheet" />
</header>

<?php
include('includes/painel-fixo.php');
?>

<!--Seção de musica-->
<section id="Musica" class="MOD-secao secao-musica" target="sec" goto=""><!-- MOD - menu-scroll -->
    <h1>Playlists</h1><!--titulo da seção-->

    <!--o container das playlists-->
    <div class="container-das-playlists">

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->

        <!--um bloco clicavel pra acessar a playlist-->
        <div class="banner-playlist hoverP"
            data-image="<?php echo INCLUDE_PATH_STATIC ?>assets/img/temas/ocean deep digital/playlist icon2.png"
            data-artist="Guns N Roses" data-song="Sweet Child Of Mine"
            data-file="<?php echo INCLUDE_PATH_STATIC ?>assets/audio/music.mp3">

            <h3>Nome da Musica</h3>
            <p>Artista</p>
        </div><!--um bloco clicavel pra acessar a playlist-->
    </div>
    <!--o container das playlists-->

    <!--o container do painel de controle das faixas-->
    <div class="container-painel">
        <div class="painel">

            <!-- aqui vai ser preenchido dinamicamente com dados da faixa -->
            <div class="player__artist">

            </div><!-- aqui vai ser preenchido dinamicamente com dados da faixa -->

            <div class="container-controles">
                <div class="retroceder controles"></div>
                <div class="play-pause controles" id="play"></div>
                <div class="play-pause controles" id="pause"></div>
                <div class="avançar controles"></div><!--botoes de controle das faixas-->
            </div>
            <div class="container-reproducao">
                <div class="reproducao"></div>
            </div><!--barra de reprodução da musica-->
            <div class="clear"></div><!--limpeza de flutuação-->
        </div><!--painel de controle das faixas-->
    </div><!--o container do painel de controle das faixas-->

    <!-- tag audio pra reproduzir -->
    <audio id="audioplayer"
        style="position: absolute;left: 0; top: 0;z-index: -999;opacity: 0;"></audio><!-- tag audio pra reproduzir -->

</section><!--primeira seção da página-->
<!--Seção de musica-->