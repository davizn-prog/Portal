$(function () {
    var janelaPosY

    //função do movimentar do scroll
    $(window).scroll(function () {
        janelaPosY = $(window).scrollTop();//armazena a posição atual do scroll vertical da janela

        if (janelaPosY > 400) {
            $('.formulario').css({
                'opacity': '0%',
            });
        } else {
            $('.formulario').css({
                'opacity': 'initial',
            });
        }
    });

});