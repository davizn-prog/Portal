$(function () {
    var janelaPosY
    var janelaAltura

    //função do movimentar do scroll
    $(window).scroll(function () {
        janelaPosY = $(window).scrollTop();//armazena a posição atual do scroll vertical da janela
        janelaAltura = $(window).height();//e a altura dela 
        var alturaEfeito = getComputedStyle(document.documentElement).getPropertyValue('altura-efeito');
        
        $('.containeres').each(function () {
            if (janelaPosY > alturaEfeito) {
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
});