<header>
    <link href="<?php echo INCLUDE_PATH_STATIC ?>assets/css/galeria.css" type="text/css" rel="stylesheet" />
</header>
<section id="Galeria" class="MOD-secao" target="sec" goto="">
    <div class="container-fig">

        <?php

        $vimagensPostadas = \Portal\Models\GaleriaModel::postsImagens();

        foreach ($vimagensPostadas as $key => $imgInfo) {

        ?>

            <div class="img-wraper">
                <img src="<?php echo INCLUDE_PATH ?>uploads/<?php echo $imgInfo['arquivo_url'] ?>" class="img"><!--imagem-->
            </div><!--container da imagem-->

        <?php } ?>

        <div class="clear"></div><!--limpeza de flutuação-->
    </div><!--container das img-->
</section>