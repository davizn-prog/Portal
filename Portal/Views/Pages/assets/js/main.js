/*-----------------------------------------------------
------------ navegação via requisição ajax ------------
-------------------------------------------------------*/

// Função centralizada para gerenciar a exibição e inicializar scripts
function tratarRota(rota) {
    initScrollMenu();

    switch (rota) {
        case 'videos':
            $('#boasVindas').fadeOut();
            initVideos();
            initPlayer();
            break;

        case 'musica':
            $('#boasVindas').fadeOut();
            initMusica();
            break;

        case 'minigame':
            $('#boasVindas').fadeOut();
            initMinigame();
            break;

        // Casos que representam a página inicial (Feed)
        case 'Portal':
        case 'feed':
        case '':
        case undefined:
            $('#boasVindas').fadeIn();
            initHome();
            initVideos();
            break;

        default:
            $('#boasVindas').fadeOut();
            break;
    }
}

// execução no F5 (Carregamento inicial)
$(document).ready(function () {
    let urlAtual = window.location.href;
    let rotaInicial = urlAtual.split('/').filter(Boolean).pop();

    tratarRota(rotaInicial);
});

// execução nos cliques dinâmicos
$(document).on('click', 'a.link-ajax', function (e) {
    e.preventDefault();

    let pagina = $(this).attr('href');
    let nomeRota = pagina.split('/').filter(Boolean).pop();

    $('.container-central__conteudos').load(pagina + ' .container-central__conteudos > *', function () {
        tratarRota(nomeRota);
    });

    history.pushState(null, '', pagina);
});
// ------------ navegação via requisição ajax ------------

/*------------------------------
--------- MENU SCROLL ----------
--------------------------------*/
function initScrollMenu() {

    /* PRECISA ATUALIZAR O CAMINHO ATÉ O ARQUIVO AQUI ABAIXO */
    /* PRECISA ATUALIZAR O NOME DO ARQUIVO AQUI ABAIXO */

    var directory = '\Portal\ '//<--- ATUALIZAR CAMINHO!
    var arquivo = 'home.php?'//<--- ATUALIZAR ARQUIVO .html/.php!

    var secoes = $('.MOD-secao').length;//armazena a quantidade de seções
    var arraySecao = [];
    var goto;

    iniciar();//chama a funcao que preenche o menu

    //preenche o menu dinamicamente

    function iniciar() {
        $('.MOD-nav-superior ul').html('');
        for (var i = 0; i < secoes; i++) {
            secaoNome = $('.MOD-secao').eq(i).attr('id')//começa armazenando o conteudo do id da secao, enumerada conforme o indice
            arraySecao[i] = secaoNome;
            $('.MOD-secao').eq(i).attr('target', 'sec' + i);//altera o atributo target pra ser numerado conforme o numero de secoes
            if (i == 0) {
                $('nav ul').append('<li><a style="border-bottom: 2px solid var( --cor-destaque);" class="MOD-sec' + i + '" href="#' + secaoNome + '" goto="' + secaoNome + '">' + secaoNome + '</a></li>');
            } else {
                $('nav ul').append('<li><a class="MOD-sec' + i + '" href="#' + secaoNome + '" goto="' + secaoNome + '">' + secaoNome + '</a></li>');
            }
        }
    }

    //função do movimentar do scroll
    $(window).scroll(function () {//a função acontece ao dar o scroll

        var navPosY = $('.MOD-nav-header').offset().top;//armazena o valor da propriedade top do objeto offset que armazena as posições da nav que ta no header

        var janelaPosY = $(window).scrollTop();//armazena a posição atual do scroll vertical da janela

        var janelaAltura = $(window).height();//e a altura dela

        $('.MOD-secao').each(function () {//a funcao acontece em loop nesse(s) elemento(s) especifico(s)

            var posYElemento = $(this).offset().top;//armazena a posição superior do elemento .sessao no contexto 

            var alturaElemento = $(this).height();//armazena a altura do elemento .sessao no contexto

            if (posYElemento < ((janelaPosY + janelaAltura) - (janelaAltura / 2)) && posYElemento + 30 + $(this).height() > janelaPosY) {
                /*aqui em cima
                
                se a posição superior do elemento em questao for menor que: a posição atual do scroll da janela + a altura de janela - 1/3 da altura da janela
                e
                a posição superior do elemento em questao + 30px + a altura dele for menor que a posição vertical atual da janela

                por que isso?
                1 - a altura da tela + posicao do scroll - 1/3 serve pra capturar o enquadramento do site que esta sendo exibido na janela. em outras palavras, o elemento tem que ter entrado mais ou menos no meio da tela
                2 - a segunda condição é o enquadramento do elemento, o que deve ser considerado o elemento, que no caso é sua posição superior (onde ele começa) + sua altura, ou seja, a posição final dele
                3 - pegado isso, se a posicao final dele +30 for maior que a posicao superior da janela (se ele estiver no enquadramento da janela), ai sim pode aplicar a estilização
                */
                $('a').css('border-bottom', '0');//limpa todas as bordas dos links
                var target = $(this).attr('target');//coloca o valor do atributo target do elemento do contexto (.secao) na variavel target
                $('.MOD-' + target).css('border-bottom', '2px solid var( --cor-destaque)');//e estiliza o link conforme o target do elemento (.secao) no contexto
                return;
            }
        });


        //abaixo aplica o menu fixo ao descer o scroll
        if (janelaPosY >= navPosY) {//se a posição sperior da janela for menor que ou igual ao da nav do header
            $('.menu2-h').css({
                'background-color' : 'var(--cor-elemento2)',
                'box-shadow' : 'none',
            })
            $('.MOD-nav-superior').css({
                'opacity': 'var(--nav-opacidade-show)',
                'display': 'block',
                'top': 'var(--nav-top-show)'
            }, 1);//aparece a nav superior
            $('.MOD-nav-header ul').hide();
        } else if ((janelaPosY >= 0) && (janelaPosY < navPosY)) {//se a posição sperior da janela for maior que ou igual a zero e se for menor que a posição superior da nav do header
            $('.menu2-h').css({
                'background-color' : 'initial',
                'box-shadow' : 'var(--brilho-menu)',
            })
            $('.MOD-nav-superior').css({
                'opacity': 'var(--nav-opacidade-hide)',
                'top': 'var(--nav-top-show)',
            }, 1);
            $('.MOD-nav-header ul').show();
        }

    })

    //faz o scroll rolar pra seção conforme clicado no menu

    $('.MOD-menu-navegacao a').click(function () {//pega o <a> das nav e aplica a função

        goto = $(this).attr('goto')//armazena o valor do parametro goto numa variavel
        // history.pushState(null, "", goto); //e aoplica esse valor no final da url

        var href = $(this).attr('href'); //variavel href recebe o conteudo do href de a

        /* abaixo a varriavel offsettop recebe o a distancia em pixels do topo da pagina ate o conteudo de href 
        (que é o conteudo do href de <a> que neste caso está dendo o id de uma tag)*/
        var offSetTop = $(href).offset().top;

        //abaixo animamos a pagina com a propriedade scrollTop do .animate para rolar o scroll em direção às coordenadas de offsetTop
        $('html,body').animate({ 'scrollTop': offSetTop - 100 });

        //altera a url conforme a seção

        //abaixo retorna falso pro site nao entender que voce foi pruma outra pagina ja que é um href que da pra mesma pagina
        return false;
    })
};
// ------ MENU SCROLL -------

// ------------ navegação via requisição ajax ------------

/*-----------------------------
------ ANIMAÇÃO DE FUNDO-------
-------------------------------*/
$(function () {
    var el
    var conFig = [
        //cada linha é uma figurinha
        //colunas: [0]-top inicial, [1]-left inicial, [2]-top final, [3]-left final, [4]-delay, [5]-duração
        ['360px', '-380px', '-100px', '590px', '0s', '10s'],
        ['660px', '-580px', '-200px', '1190px', '0s', '10s'],
        ['780px', '-390px', '-90px', '1450px', '0s', '10s'],
        ['1000px', '-590px', '-200px', '1910px', '0s', '10s'],
        ['1400px', '-580px', '200px', '1890px', '0s', '10s'],
        ['1700px', '-580px', '-200px', '3380px', '0s', '10s'],
        ['1250px', '-580px', '-50px', '2160px', '0s', '10s'],
        ['360px', '-380px', '-100px', '590px', '6s', '8s'],
        ['660px', '-580px', '-200px', '1190px', '6s', '8s'],
        ['780px', '-390px', '-90px', '1450px', '6s', '8s'],
        ['1000px', '-590px', '-200px', '1910px', '6s', '8s'],
        ['1400px', '-580px', '200px', '1890px', '6s', '8s'],
        ['1700px', '-580px', '-200px', '3380px', '6s', '8s'],
        ['1250px', '-580px', '-50px', '2160px', '6s', '8s'],
    ]

    var maximo = conFig.length;

    for (let i = 0; i < maximo; i++) {
        el = $('<div class="fig-fundo">');
        $(el).css({
            'top': conFig[i][0],
            'left': conFig[i][1],
            'animation-delay': conFig[i][4],
            'animation-duration': conFig[i][5],
        });
        el[0].style.setProperty('--top-final', conFig[i][2]);
        el[0].style.setProperty('--left-final', conFig[i][3]);
        $('.corpo-de-fundo').append(el)
    }
});
// ------ ANIMAÇÃO DE FUNDO-------

/*-----------------------------
-------- MENU LATERAL ---------
-------------------------------*/

$(function () {
    var width = $('.menu-lateral').width();;

    //expandir menu
    $('.expandir').click(function () {
        $('.menu-lateral').css({
            'width': 'calc(' + width + 'px + 190px)',
        });
        $('.expandir').css({
            'visibility': 'hidden',
            'z-index': '1',
        });
        $('.encolher').css({
            'visibility': 'inherit',
            'z-index': '3',
        });
    });

    //encolher menu
    $('.encolher').click(function () {
        $('.menu-lateral').css({
            'width': width,
        });

        $('.encolher').css({
            'visibility': 'hidden', 'z-index': '1'
        });

        $('.expandir').css({
            'visibility': 'inherit', 'z-index': '3'
        });
    });
});
// -------- MENU LATERAL ---------

/*-----------------------------
------------ TEMAS ------------
-------------------------------*/
$(function () {

    var novoTema = 'aura'

    $('.tema-aura').click(function () {
        // Altera a tag <html> para <html data-theme="aura">
        document.documentElement.setAttribute('data-theme', novoTema);

        // Salva no navegador para não perder quando trocar de página
        localStorage.setItem('temaUsuario', novoTema);

        // Ao carregar a página, recupera o tema salvo ou usa o padrão
        const temaSalvo = localStorage.getItem('temaUsuario');
        if (temaSalvo) {
            document.documentElement.setAttribute('data-theme', temaSalvo);
        }
    })

    // ------------ TEMAS ------------
});

