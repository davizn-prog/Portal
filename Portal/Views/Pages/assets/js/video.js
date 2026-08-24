function initVideos() {
    var videos = [];
    videos[0] = [];
    videos[1] = [];
    var videoQuantidade = ($('.video,.short').length) - 1;

    for (let i = 0; i <= videoQuantidade; i++) {
        videos[0][i] = $('.video,.short').eq(i).attr('name');
        videos[1][i] = $('.video,.short').eq(i).attr('name').replace(/\.[^/.]+$/, "");
    }

    sessionStorage.setItem('videos', JSON.stringify(videos));

    // Usando .off().on() para evitar cliques duplicados no AJAX
    $('.container-central__conteudos').off('click', '.video, .short').on('click', '.video, .short', function (e) {
        e.preventDefault();
        let identificador = $(this).attr('name');
        let posicaoAtual = $(this).index(); // Posição do article clicado
        let posicaoAnterior = posicaoAtual - 1;
        let proximaPosicao = posicaoAtual + 1;

        sessionStorage.setItem('maximo', videoQuantidade);
        sessionStorage.setItem('videoSelecionado', identificador);
        sessionStorage.setItem('videoAnterior', posicaoAnterior);
        sessionStorage.setItem('videoAtual', posicaoAtual);
        sessionStorage.setItem('proximoVideo', proximaPosicao);

        // ATUALIZA E TOCA O VÍDEO IMEDIATAMENTE!
        let tituloAtual = videos[1][posicaoAtual];
        $('h1').text(tituloAtual);

        $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + identificador);
        $('video')[0].load(); 
        $('video')[0].play(); 
    });

    // Filtros de Play/Pause (Película)
    $('.player').each(function () {
        this.addEventListener('play', function () {
            $(this).css({ 'filter': 'none', 'opacity': '100%' });
        });
        this.addEventListener('pause', function () {
            $(this).css({ 'filter': 'var(--filtro-pelicula)', 'opacity': 'var(--opacidade-palicula)' });
        });
    });
}