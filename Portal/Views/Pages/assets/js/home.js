
function initHome() {

    $(function () {

        //função do movimentar do scroll
        $(window).scroll(function () {
            let janelaPosY = $(window).scrollTop();//armazena a posição atual do scroll vertical da janela

            $('.container-central__conteudos').each(function () {
                if (janelaPosY > 71) {
                    $('.boas-vindas').css({
                        'opacity': '0%',
                    });
                } else {
                    $('.boas-vindas').css({
                        'opacity': '100%',
                    });
                }
            });
        });
    });

    /*--------------------------------
    ------------ SHORTS --------------
    -----------------------------------*/

    $(function () {

        const root = document.documentElement; // Pega o elemento raiz (:root = <html>) (ou document.querySelector(':root')) 
        const estilos = window.getComputedStyle(root); // Pega o estilo computado
        var margem = Number(estilos.getPropertyValue('--margem-short').trim().match(/\d+/)) * 2;// pega o valor de qualquer variável - .trim() remove espaços extras

        var quantidadeShorts = $('.short').length;
        var tamanhoShort = ($('.short').width()) + margem;
        var scrollInicial = ((quantidadeShorts - 6) / 2) * tamanhoShort;

        var posicaoAtual = 2
        var posicaoAnterior = posicaoAtual - 1
        var proximaPosicao = posicaoAtual + 1
        var posicaoMaxima = quantidadeShorts - 6; //6 é a quantidade de shorts exibidos por vez. da é bom deixar dinamico junto com o tamanho do container

        $('.shorts-overflow').animate({ 'scrollLeft': scrollInicial })

        $('.short').hover(function () {
            // mouseenter: toca só o(s) vídeo(s) dentro do .short atual
            $(this).find('video').each(function () {
                // opcional: garantir que o autoplay não seja bloqueado
                this.muted = true;
                this.play();
            });
        }, function () {
            // mouseleave: pausa só o(s) vídeo(s) dentro do .short atual
            $(this).find('video').each(function () {
                this.pause();
                // opcional: voltar para o início
                //this.currentTime = 0;
            });
        }
        );

        //faz o scroll rolar pra seção conforme clicado no menu

        $('.controles-shorts>.MOD-anterior').click(function () {
            if (posicaoAtual >= 1) {
                $('.shorts-overflow').animate({ 'scrollLeft': (tamanhoShort * posicaoAnterior) + 'px' });
                posicaoAtual--;
                posicaoAnterior = posicaoAtual - 1
                proximaPosicao = posicaoAtual + 1
            }
        })

        $('.controles-shorts>.MOD-proximo').click(function () {
            if (posicaoAtual < posicaoMaxima) {
                $('.shorts-overflow').animate({ 'scrollLeft': (tamanhoShort * proximaPosicao) + 'px' });
                posicaoAtual++;
                posicaoAnterior = posicaoAtual - 1
                proximaPosicao = posicaoAtual + 1
            }
        })
    });
    //------------- SHORTS -------------

    /*----------------------------------
    ---- SLIDER AUTOR AUTOMATICO -------
    -----------------------------------*/

    $(function () {
        var delay = 3000;
        var indiceAtual = 0;
        var quantidade;

        initSlider();
        autoPlay();

        function initSlider() {
            quantidade = $('.MOD-container-autor').length;
            var tamanhoEquipe = 100 * quantidade;
            var tamanhoAutor = 100 / quantidade;
            $('.MOD-container-autor').css('width', tamanhoAutor + '%');
            $('.MOD-container-equipe').css('width', tamanhoEquipe + '%');

            for (var i = 0; i < quantidade; i++) {
                if (i == 0)
                    $('.MOD-container-indice-autor').append('<div class="MOD-indice2" style="background-color: var(--cor-texto)"></div>');
                else
                    $('.MOD-container-indice-autor').append('<div class="MOD-indice2" style="background-color: transparent"></div>');
            }
        }

        function autoPlay() {
            setInterval(function () {
                indiceAtual++;
                if (indiceAtual == quantidade)
                    indiceAtual = 0;
                goToSlider(indiceAtual);
            }, delay)
        }

        function goToSlider(indiceAtual) {
            var offSetX = $('.MOD-container-autor').eq(indiceAtual).offset().left - $('.MOD-container-equipe').offset().left;
            $('.MOD-indice2').css('background-color', 'transparent');
            $('.MOD-indice2').eq(indiceAtual).css('background-color', 'var(--cor-texto)');
            $('.MOD-container-overflow').stop().animate({ 'scrollLeft': offSetX + 'px' });
        }

        $(window).resize(function () {
            $('.MOD-container-overflow').stop().animate({ 'scrollLeft': 0 });
        })
    });
    //---- SLIDER AUTOR AUTOMATICO -----

    /*----------------------------------
    ------ SLIDER DEPOIMENTO -----------
    -----------------------------------*/
    $(function () {

        var amtDepoimento = $('.MOD-depoimento p').length;//coloca a quantia de depoimentos numa variavel
        var curIndex = 0;//seta o inicio
        var tamanhoDisplay = $('.MOD-overflow-depoimentos').height()//variável com a altura do container do overflow em pixels
        var tamanhoP = $('.MOD-depoimento p').eq(curIndex).height()//coloca a altura de p numa variavel
        var posicaoAtual = 0
        var posicaoAnterior = posicaoAtual - 1
        var proximaPosicao = posicaoAtual + 1
        var posicaoMaxima = Math.floor(tamanhoP / tamanhoDisplay)

        iniciarDepoimentos();
        navegarDepoimentos();
        overflowDepoimento();

        function iniciarDepoimentos() {
            $('.MOD-depoimento p').hide();//começa escondendo todos
            $('.MOD-depoimento p').eq(0).show();//e ai mostra so o primeiro

            if (tamanhoP < tamanhoDisplay) {
                $('.MOD-seta-overflow').css('opacity', '60%')
            } else {
                $('.MOD-seta-overflow').css('opacity', 'inherit')
            }
        }

        function navegarDepoimentos() {
            $('.proximo-depoimento').click(function () {//next é um parametro sem valor de uma tag, ou seja, ao clicar nela
                curIndex++;//aumenta o indice
                if (curIndex >= amtDepoimento)//se ele for maiior que ou igual ao total de depoimentos
                    curIndex = 0;//reinicia
                //se nao for maior
                $('.MOD-depoimento p').hide();//esconde todos
                $('.MOD-depoimento p').eq(curIndex).show();//e mostra o referente ao indice atual
                tamanhoP = $('.MOD-depoimento p').eq(curIndex).height();//coloca a altura de p numa variavel
                posicaoMaxima = Math.floor(tamanhoP / tamanhoDisplay);

                if (tamanhoP > tamanhoDisplay) {
                    $('.MOD-container-depoimentos').animate({ 'scrollTop': '0px' });
                    posicaoAtual = 0
                    posicaoAnterior = posicaoAtual - 1
                    proximaPosicao = posicaoAtual + 1
                }

                if (tamanhoP < tamanhoDisplay) {
                    $('.MOD-seta-overflow').css('opacity', '60%')
                } else {
                    $('.MOD-seta-overflow').css('opacity', 'inherit')
                }
            });

            $('.depoimento-anterior').click(function () {//prev é um parametro sem valor de uma tag. ao clicar na tag (msm coisa de cima)
                curIndex--;//diminui o indice
                if (curIndex < 0)//se ja tiver no primeiro depoimento e apertar pra voltar de novo
                    curIndex = amtDepoimento - 1;//o indice atual ganha um valor referente ao ultimo elemento
                $('.MOD-depoimento p').hide();//esconde todos os depoimentos
                $('.MOD-depoimento p').eq(curIndex).show();//e mostra o elemento atual
                tamanhoP = $('.MOD-depoimento p').eq(curIndex).height();//coloca a altura de p numa variavel
                posicaoMaxima = Math.floor(tamanhoP / tamanhoDisplay);

                if (tamanhoP > tamanhoDisplay) {
                    $('.MOD-container-depoimentos').animate({ 'scrollTop': '0px' });
                    posicaoAtual = 0
                    posicaoAnterior = posicaoAtual - 1
                    proximaPosicao = posicaoAtual + 1
                }

                if (tamanhoP < tamanhoDisplay) {
                    $('.MOD-seta-overflow').css('opacity', '60%')
                } else {
                    $('.MOD-seta-overflow').css('opacity', 'inherit')
                }
            });
        }

        function overflowDepoimento() {
            if (tamanhoP > tamanhoDisplay) {
                $('[cima]').click(function () {
                    if (posicaoAtual >= 1) {
                        $('.MOD-overflow-depoimentos').animate({ 'scrollTop': (tamanhoDisplay * posicaoAnterior) + 'px' });
                        posicaoAtual--;
                        posicaoAnterior = posicaoAnterior - 1
                        proximaPosicao = proximaPosicao - 1
                    }
                })

                $('[baixo]').click(function () {
                    if (posicaoAtual < posicaoMaxima) {
                        $('.MOD-overflow-depoimentos').animate({ 'scrollTop': (tamanhoDisplay * proximaPosicao) + 'px' });
                        posicaoAtual++;
                        posicaoAnterior = posicaoAnterior + 1
                        proximaPosicao = proximaPosicao + 1
                    }
                })
            }
        }
    });
    //-------- SLIDER DEPOIMENTO --------

    /*-----------------------------------
    ------------ VIDEO-HOME --------------
    -------------------------------------*/

    $(function () {

        var quantidade = 3;
        var emExibicao = 1;
        var tamanhoOverflow;
        var tamanhoVideo;
        var scrollInicial;

        var posicaoAtual = 1; // Índice 0 a 4 (meio = 2)
        var posicaoMaxima = quantidade - 1;

        tamanhoVideo = $('.banner-g').outerWidth(true);
        tamanhoOverflow = (tamanhoVideo * quantidade) + 20;
        scrollInicial = posicaoAtual * tamanhoVideo;

        $('.container-banner-videos-g').css('width', tamanhoOverflow);

        $('.overflow-video-g').scrollLeft(scrollInicial);

        // EVENTOS NATIVOS DIRETOS
        $('.video-g').each(function () {

            // Escuta o "Play" de cada vídeo
            this.addEventListener('play', function () {
                // "this" aqui é o vídeo exato que começou a tocar
                $(this).css({
                    'filter': 'none',
                    'opacity': '100%'
                });
            });

            // Escuta o "Pause" de cada vídeo
            this.addEventListener('pause', function () {
                // "this" aqui é o vídeo exato que pausou
                $(this).css({
                    'filter': 'var(--filtro-pelicula)',
                    'opacity': 'var(--opacidade-palicula)'
                });
            });
        });

        $('.controles-video-home>.MOD-anterior').click(function () {
            if (posicaoAtual > 0) {
                $('.video-g')[posicaoAtual].pause(); // Quando pausar, o eventListener acima vai botar a película automaticamente
                posicaoAtual--;

                $('.overflow-video-g').stop().animate({ 'scrollLeft': (tamanhoVideo * posicaoAtual) + 'px' });

                $('.video-g')[posicaoAtual].play(); // Quando der play, o eventListener acima vai tirar a película automaticamente
            }
        });

        $('.controles-video-home>.MOD-proximo').click(function () {
            if (posicaoAtual < posicaoMaxima) {
                $('.video-g')[posicaoAtual].pause();
                posicaoAtual++;

                $('.overflow-video-g').stop().animate({ 'scrollLeft': (tamanhoVideo * posicaoAtual) + 'px' });

                $('.video-g')[posicaoAtual].play();
            }
        });
    });
    //------------ VIDEO-HOME ------------


}


