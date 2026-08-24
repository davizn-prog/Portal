//aqui eu to brincando de fazer uma barra de vida que diminui quando eu clico na imagem, como se ela estivesse levando dano
function initMinigame() {
    $(function () {

        //isso aqui é tipo um joguinho onde voce bate na paimon e a barra de vida dela abaixa de acordo com o dano escolhido a ser recebido. ela tambem pode ressuscitar.

        //aqui são setados os valores de dano inicial e vida
        var dano = 0
        var vida = 100

        //abaixo sao alterados os valores de dano conforme a arma selecionada

        $('label[for="jade"]').click(function () {
            dano = 15
        });

        $('label[for="machado"]').click(function () {
            dano = 20
        });

        $('label[for="sacrificio"]').click(function () {
            dano = 10
        });

        //abaixo tem uma função de click na imagem da paimon pra a cada clique retornar os eventos conforme especificado abaixo

        $('.inimigo img').click(function () {

            //aqui reduz a barra de vida pelo dano e coloca o valor da vida no css do elemento referente a barra de vida
            vida = vida - dano
            $('.vida').css('width', vida + "%")

            //abaixo faz a memsa coisa de cima so que com o span

            // primeiro obtem a largura em pixels do elemento '.vida'
            var larguralVida = parseFloat($('.vida').css('width'));

            //depois obtem a largura total do contêiner ou elemento pai
            var larguraContainerVida = parseFloat($('.vida').parent().css('width'));

            // ai calcula a porcentagem
            var porcentagem = (larguralVida / larguraContainerVida) * 100;

            //e Exibe a porcentagem no span '.numero-vida'
            $('.numero-vida').html(porcentagem.toFixed() + '%'); // .toFixed() para arredondar e exibir inteiro ou .toFixed(2) pra exibir fracionado

            //aqui faz aparecer o ovo pra curar a paimon quando a vida chega a zero ou abaixo
            if (vida <= 0) {
                $('.cura img').css('visibility', 'visible')
            }

            //abaixo verifica se alguma arma estar selecionada e então emite seu respectivo som

            if ($('#jade:checked').length > 0) {
                const jademp3 = $('#jademp3')[0];
                jademp3.currentTime = 0;
                jademp3.play();
            }
            if ($('#machado:checked').length > 0) {
                const machadomp3 = $('#machadomp3')[0];
                machadomp3.currentTime = 0;
                machadomp3.play();
            }
            if ($('#sacrificio:checked').length > 0) {
                const sacrificiomp3 = $('#sacrificiomp3')[0];
                sacrificiomp3.currentTime = 0;
                sacrificiomp3.play();
            }

        });

        $('input[type="radio"]').click(function () {

            $('.caracteristicas-arma').css('left', '2%')

            if ($('input[value="jade"]').is(':checked')) {
                $('.img-arma').html('<div class="brilho-arma2"></div><img src="arma1.png" alt="">')
                $('.dados-arma span:nth-of-type(1)').html('Ataque: 15')
                $('.dados-arma span:nth-of-type(2)').html('Valocidade: 100')
                $('.dados-arma span:nth-of-type(3)').html('Cool Down: 0s')
            }
            if ($('input[value="machado"]').is(':checked')) {
                $('.img-arma').html('<div class="brilho-arma2"></div><img src="arma2.png" alt="">')
                $('.dados-arma span:nth-of-type(1)').html('Ataque: 20')
                $('.dados-arma span:nth-of-type(2)').html('Valocidade: 70')
                $('.dados-arma span:nth-of-type(3)').html('Cool Down: 2s')
            }
            if ($('input[value="sacrificio"]').is(':checked')) {
                $('.img-arma').html('<div class="brilho-arma2"></div><img src="arma3.png" alt="">')
                $('.dados-arma span:nth-of-type(1)').html('Ataque: 10')
                $('.dados-arma span:nth-of-type(2)').html('Valocidade: 90')
                $('.dados-arma span:nth-of-type(3)').html('Cool Down: 1s')
            }
        });

        /* isso desseleciona um radio
        $('.cura img').click(function(){
            document.getElementById("jade").checked = false;
        });*/



        //abaixo a função que faz com que ao apertar no ovo restaure a vida da paimon e esconda o ovo de novo

        $('.cura img').click(function () {

            //aqui restaura a barra
            vida = 100
            $('.vida').css('width', vida + "%")

            //aqui restaura o numero
            porcentagem = 100
            $('.numero-vida').html(porcentagem + '%');

            //aqui esconde o ovo
            $('.cura img').css('visibility', 'hidden')

        });

    });
}
