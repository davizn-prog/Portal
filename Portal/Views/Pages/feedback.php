<head>
    <link href="<?php echo INCLUDE_PATH_STATIC?>assets/css/feedback.css" type="text/css" rel="stylesheet" />
</head>
<!--container do formulario-->
<section id="Feedback" class="MOD-secao" target="sec" goto="">
    <form action="" class="feedback">
        <fieldset>
            <legend>Nos mande uma mensagem!</legend><!--legenda da demarcação-->

            <h3>Primeiro se identifique</h3>

            <div>
                <input type="text" name="usuario" placeholder="Digite o nome de usuário">
            </div><!--input pra usuario-->
            <div>
                <input type="text" name="senha" placeholder="Digite a senha">
            </div><!--input pra senha-->
            <div>
                <select name="idade" id="">
                    <option disabled selected>informe sua idade</option>
                    <option value="-9">-9</option>
                    <option value="10-15">10-15</option>
                    <option value="16-22">16-22</option>
                    <option value="23-28">23-28</option>
                    <option value="29+">29+</option>
                </select><!--opções de idade-->
            </div><!--container-->

            <h3>Selecione uma imagem de perfil</h3>

            <div>
                <input type="file" id="file" value="file" name="file" />
                <label for="file">Selecionar do computador</label><!--botao que substitui o input file-->
            </div><!--container-->

            <div class="seletores">
                <h3>Seu gênero</h3>
                <div>
                    <!--opção-->
                    <div class="container-seletor">
                        <input type="radio" name="genero" value="Masculino" id="Masculino">
                        <label for="Masculino"></label><span>Masculino</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="radio" name="genero" value="Feminino" id="Feminino">
                        <label for="Feminino"></label><span>Feminino</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="radio" name="genero" value="Finofaurio" id="Finofaurio">
                        <label for="Finofaurio"></label><span>Finofaurio</span> <img
                            src="<?php echo INCLUDE_PATH_STATIC?>assets/img/dinossauro.png" alt="" width="30px" height="30px">
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="radio" name="genero" value="Sônico" id="Sônico">
                        <label for="Sônico"></label><span>Sônico</span> <img src="<?php echo INCLUDE_PATH_STATIC?>assets/img/sonico.png" alt=""
                            width="30px" height="30px">
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="radio" name="genero" value="Jureg" id="Jureg">
                        <label for="Jureg"></label><span>Jureg</span> <img src="<?php echo INCLUDE_PATH_STATIC?>assets/img/jureg.png" alt=""
                            width="30px" height="30px">
                    </div><!--container-->

                </div><!--container-->
                <h3>O que gostaria de ver por aqui?</h3>
                <div>
                    <!--opção-->
                    <div class="container-seletor">
                        <input type="checkbox" name="gostos[]" value="Animes" id="check1">
                        <label for="check1"></label> <span>Animes</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="checkbox" name="gostos[]" value="Filmes" id="check2">
                        <label for="check2"></label> <span>Filmes</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="checkbox" name="gostos[]" value="Jogos" id="check3">
                        <label for="check3"></label> <span>Jogos</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="checkbox" name="gostos[]" value="Cultura pop" id="check4">
                        <label for="check4"></label> <span>Cultura pop</span>
                    </div><!--container-->

                    <!--opção-->
                    <div class="container-seletor">
                        <input type="checkbox" name="gostos[]" value="Mangás" id="check5">
                        <label for="check5"></label> <span>Mangás</span>
                    </div><!--container-->
                </div><!--container-->
            </div><!--container dos seletores-->

            <div>
                <textarea name="observacao" id="" cols="30" rows="10" placeholder="Escreva alguma coisa"></textarea>
            </div><!--container-->

            <div>
                <input type="submit" value="Enviar">
                <label for="submit" id="botaoenviar">Enviar</label><!--botao que substitui o input file-->
            </div><!--container-->
        </fieldset><!--demarcador visual do formulario-->
    </form><!--o formulario-->
</section><!--container do formulario-->
