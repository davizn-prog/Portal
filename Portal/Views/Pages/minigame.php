<header>
    <link href="<?php echo INCLUDE_PATH_STATIC?>assets/css/minigame.css" type="text/css" rel="stylesheet" />
</header>
<!--menu-->
<section>
    <div class="caracteristicas-arma">
        <div class="img-arma"></div><!--imagem da arma-->
        <div class="dados-arma">
            <div>
                <span>Ataque:</span><!--informação-->
                <span>Velocidade:</span><!--informação-->
                <span>Cool Down:</span><!--informação-->
            </div><!--container das informações-->
        </div><!--informações da arma-->
    </div><!--container de exibição da arma selecionada-->
    <div class="cura">
        <img src="cura.png" alt="">
    </div><!--botao de reiniciar-->
    <div class="clear"></div><!--limpeza de flutuação-->
    <div class="paimon">
        <div class="container-vida">
            <div class="vida"><!--vida em barra--></div>
        </div><!--container da vida em barra-->
        <span class="numero-vida">100%</span><!--exibição da vida em texto-->
        <div class="brilho"></div><!--div com efeito de brilho por tras-->
        <div class="inimigo"><img src="inimigo.png" alt=""></div><!--imagem do inimigo-->
    </div><!--o inimigo a ser batido-->
    <div class="menu">
        <div class="container-armas">
            <div class="jade">
                <div class="brilho-arma"></div><!--div com efeito de brilho por tras-->

                <!--opção-->
                <input type="radio" name="arma" value="jade" id="jade"></input>
                <label for="jade"><img src="arma1.png" alt=""></label>

                <audio controls id="jademp3">
                    <source src="jade.mp3" type="audio/mpeg">
                </audio><!--som da arma-->
            </div><!--arma-->
            <div class="machado">
                <div class="brilho-arma"></div><!--div com efeito de brilho por tras-->

                <!--opção-->
                <input type="radio" name="arma" value="machado" id="machado"></input>
                <label for="machado"><img src="arma2.png" alt=""></label>

                <audio controls id="machadomp3">
                    <source src="machado.mp3" type="audio/mpeg">
                </audio><!--som da arma-->
            </div><!--arma-->
            <div class="sacrificio">
                <div class="brilho-arma"></div><!--div com efeito de brilho por tras-->

                <!--opção-->
                <input type="radio" name="arma" value="sacrificio" id="sacrificio"></input>
                <label for="sacrificio"><img src="arma3.png" alt=""></label>

                <audio controls id="sacrificiomp3">
                    <source src="sacrificio.mp3" type="audio/mpeg">
                </audio><!--som da arma-->
            </div><!--arma-->
        </div><!--container das armas-->
    </div><!--menu inferior de armas-->
</section><!--container-->
<script type="text/javascript" src="assets/js/minigame.js"></script>