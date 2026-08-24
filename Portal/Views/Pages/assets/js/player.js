function initPlayer() {
    let maximo = Number(sessionStorage.getItem('maximo'));
    let atual = Number(sessionStorage.getItem('videoAtual'));
    let anterior = Number(sessionStorage.getItem('videoAnterior'));
    let proximo = Number(sessionStorage.getItem('proximoVideo'));
    let caminho = sessionStorage.getItem('videoSelecionado');
    let ids = JSON.parse(sessionStorage.getItem('videos'));
    
    // Se tiver um vídeo salvo na sessão, ele carrega ao entrar na página
    if(caminho && ids) {
        var titulo = ids[1][atual];
        $('h1').text(titulo);
        $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + caminho);
        $('video')[0].load(); 
    }

    // Botão Anterior
    $('.container-central__conteudos').off('click', '[videoAnterior]').on('click', '[videoAnterior]', function () {
        if (atual > 0) {
            $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + ids[0][anterior]);
            $('video')[0].load();
            $('video')[0].play();

            atual--;
            anterior = atual - 1;
            proximo = atual + 1;

            titulo = ids[1][atual];
            $('h1').text(titulo);

            sessionStorage.setItem('videoSelecionado', ids[0][atual]);
            sessionStorage.setItem('videoAnterior', anterior);
            sessionStorage.setItem('proximoVideo', proximo);
            sessionStorage.setItem('videoAtual', atual);
        }
    });

    // Botão Próximo
    $('.container-central__conteudos').off('click', '[proximoVideo]').on('click', '[proximoVideo]', function () {
        if (atual < maximo) {
            $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + ids[0][proximo]);
            $('video')[0].load();
            $('video')[0].play();

            atual++;
            anterior = atual - 1;
            proximo = atual + 1;

            titulo = ids[1][atual];
            $('h1').text(titulo);

            sessionStorage.setItem('videoSelecionado', ids[0][atual]);
            sessionStorage.setItem('videoAnterior', anterior);
            sessionStorage.setItem('proximoVideo', proximo);
            sessionStorage.setItem('videoAtual', atual);
        }
    });
}