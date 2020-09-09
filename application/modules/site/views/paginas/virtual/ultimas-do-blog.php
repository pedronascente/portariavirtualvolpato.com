<section   class="espaco" >
    <div class="container">
        <hr class="_margin-bottom-40">
        <div class="row">
            <div class="col-md-12">
                <h2 class="_font_title hidden-xs hidden-sm text-center">ULTIMAS DO BLOG</h2>
                <h2 class="_font_title_h3  visible-xs visible-sm  _text-ce_justify">ULTIMAS DO BLOG</h2>
                <br>
            </div>
        </div>
        <div id="" class="row">
            <?php
                for ($i = 0; $i < count($_noticias); $i++) {
                $imagem = $_noticias[$i]["_imagem"];
                $titulo = $_noticias[$i]["_titulo"];
                $texto = $_noticias[$i]["_texto"];
                $id = $_noticias[$i]["_url"];
                $introducao = $_noticias[$i]["_paragrafo_introducao"];
                $Regiao = $_noticias[$i]["_cidade"].' '.$_noticias[$i]["_uf"];
                ?>


            <div class="col-md-4 col-xs-12">
                <div class="card" >
                      <div class="img">
                         <img src="<?=base_url("assets/img/blog/".$imagem); ?>"  title="<?=$titulo;?>" alt="<?=$imagem;?>" width="100%" >
                      </div>
                      <div class="card-block">
                            <h4 class="card-title"><b><?=$titulo;?></b></h4>
                            <p class="card-text"><?=mb_strimwidth($introducao, 0, 100, "...");?></p>
                            <p><a href="<?= base_url('virtual-blog/'.$id) ?>" class="btn btn-primary">Ler Mais</a></p>
                      </div>
                </div>
           </div>
            <?php  } ?>
        </div>
         <hr class="_margin-bottom-100">
    </div>
</section>