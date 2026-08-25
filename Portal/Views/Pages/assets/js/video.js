// cria variaveis pra navegação dos videos baseado no video clicado
var videoQuantidade
var identificador
var posicaoAtual
var posicaoAnterior
var proximaPosicao

function initVideos() {
    var videos = [];
    videos[0] = [];
    videos[1] = [];
    videoQuantidade = ($('.video,.short').length) - 1;//o indice do pro for abaixo vai ser baseado na quantidade de videos disponiveis

    //preenche os arrays com os nomes dos arquivos
    for (let i = 0; i <= videoQuantidade; i++) {
        videos[0][i] = $('.video,.short').eq(i).attr('name');//array pra colocar na src do video
        videos[1][i] = $('.video,.short').eq(i).attr('name').replace(/\.[^/.]+$/, "");//array pra colocar na h1 do player
    }

    sessionStorage.setItem('videos', JSON.stringify(videos));//guarda o conteudo de videos na sessão e converte pra json

    // usando .off().on() para evitar cliques duplicados no ajax
    $('.container-central__conteudos').off('click', '.video, .short').on('click', '.video, .short', function (e) {
        e.preventDefault();//impede a atualização da pagina

        //atualiza as variaveis
        identificador = $(this).attr('name');//guarda o atributo name do card
        posicaoAtual = $(this).index();//guarda a posição do article clicado
        posicaoAnterior = posicaoAtual - 1;//atualiza a posição anterior
        proximaPosicao = posicaoAtual + 1;//e a posterior

        //guarda variaveis na seção
        sessionStorage.setItem('maximo', videoQuantidade);
        sessionStorage.setItem('videoSelecionado', identificador);
        sessionStorage.setItem('videoAnterior', posicaoAnterior);
        sessionStorage.setItem('videoAtual', posicaoAtual);
        sessionStorage.setItem('proximoVideo', proximaPosicao);

        let tituloAtual = videos[1][posicaoAtual];//usa o array acima pra salvar o nome do arquivo sem a extensao
        $('.container-gameplay > h1').text(tituloAtual);//e aplica

        //aqui atualiza a src
        $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + identificador);

        //carrega e da play no video
        $('video')[0].load();
        $('video')[0].play();
    });

    //aplica filtros no pause do video (Película)
    $('.player').each(function () {
        this.addEventListener('play', function () {
            $(this).css({ 'filter': 'none', 'opacity': '100%' });
        });
        this.addEventListener('pause', function () {
            $(this).css({ 'filter': 'var(--filtro-pelicula)', 'opacity': 'var(--opacidade-palicula)' });
        });
    });
}

function initPlayer() {

    //começã armazenando em variaveis deste arquivo os valores guardados na seção
    videoQuantidade = Number(sessionStorage.getItem('maximo'));
    posicaoAtual = Number(sessionStorage.getItem('videoAtual'));
    posicaoAnterior = Number(sessionStorage.getItem('videoAnterior'));
    proximaPosicao = Number(sessionStorage.getItem('proximoVideo'));
    identificador = sessionStorage.getItem('videoSelecionado');
    let ids = JSON.parse(sessionStorage.getItem('videos'));//aqui converte o json de video.js de volta num objeto

    // Se tiver um vídeo salvo na sessão, ele carrega ao entrar na página
    if (identificador && ids) {//se as variaveis estiverem preenchidas (ver video.js)
        var titulo = ids[1][posicaoAtual];//coloca o titulo numa variavel
        $('.container-gameplay>h1').text(titulo);//e aplica
        $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + identificador);//posicaoAtualiza a src
        $('video')[0].load();//e carrega
    }

    // usando .off().on() para evitar cliques duplicados no ajax
    // Botão Anterior
    $('.container-central__conteudos').off('click', '[videoAnterior]').on('click', '[videoAnterior]', function () {
        if (posicaoAtual > 0) {//se nao tiver no primeiro video (nao pode voltar mais)
            $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + ids[0][posicaoAnterior]);
            $('video')[0].load();
            $('video')[0].play();

            posicaoAtual--;
            posicaoAnterior = posicaoAtual - 1;
            proximaPosicao = posicaoAtual + 1;

            titulo = ids[1][posicaoAtual];
            $('.container-gameplay > h1').text(titulo);

            sessionStorage.setItem('videoSelecionado', ids[0][posicaoAtual]);
            sessionStorage.setItem('videoAnterior', posicaoAnterior);
            sessionStorage.setItem('proximoVideo', proximaPosicao);
            sessionStorage.setItem('videoAtual', posicaoAtual);
        }
    });

    // Botão Próximo
    $('.container-central__conteudos').off('click', '[proximoVideo]').on('click', '[proximoVideo]', function () {
        if (posicaoAtual < videoQuantidade) {
            $('source').attr('src', INCLUDE_PATH_STATIC + 'assets/videos/gameplays/' + ids[0][proximaPosicao]);
            $('video')[0].load();
            $('video')[0].play();

            posicaoAtual++;
            posicaoAnterior = posicaoAtual - 1;
            proximaPosicao = posicaoAtual + 1;

            titulo = ids[1][posicaoAtual];
            $('.container-gameplay > h1').text(titulo);

            sessionStorage.setItem('videoSelecionado', ids[0][posicaoAtual]);
            sessionStorage.setItem('videoAnterior', posicaoAnterior);
            sessionStorage.setItem('proximoVideo', proximaPosicao);
            sessionStorage.setItem('videoAtual', posicaoAtual);
        }
    });
}