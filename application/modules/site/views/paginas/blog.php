<?= $this->load->view("layout/nav"); ?>      
<div class="container-fluid _bg-azul" >     
    <div class="container">
        <div   class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="_font_title  text-right _color_branco _padding_buttom">BLOG</h1>
            </div>
        </div>
    </div>
</div>
<!--desktop-->
<div class="visible-lg visible-md">
    <hr class="_margin-bottom-40 ">
    <div class="container" id="leia-mais">
        <div class="row ">
            <div class="col-md-4  ">
                <div class="row " >
                    <?= $this->load->view("formulario/form_principal_blog"); ?> 
                </div>
                <div class="row " style="margin-top: 480px">
                    <hr class="_margin-bottom-40 ">
                     <div class="col-md-12">
                            <h2 class="_font_title_h3 ">Rede Social</h2>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVolpato.se%2F&tabs=timeline&width=325&height=240&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=904556509599711" width="325" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
                <hr class="_margin-bottom-40 ">
                <div class="row" >
                    <div class="col-xs-12">
                        <h2 class="_font_title_h3 ">Rescentes</h2>
                    </div>
                    <div class="col-xs-12 col-md-11">
                                <?php
                                    for ($i = 0; $i < count($_noticias); $i++) {
                                    $imagem = $_noticias[$i]["_imagem"];
                                    $titulo = $_noticias[$i]["_titulo"];
                                    $texto = $_noticias[$i]["_texto"];
                                    $id = $_noticias[$i]["_url"];
                                    $introducao = $_noticias[$i]["_paragrafo_introducao"];
                                    $Regiao = $_noticias[$i]["_cidade"].' '.$_noticias[$i]["_uf"];
                                ?>      
                               <div class="row">
                             <a href="<?= base_url('blog/'.$id) ?>"   title="<?=$titulo;?>" alt="<?=$imagem;?>" style="cursor:pointer;" >
                            <div class="col-md-5"> <img src="<?=base_url("assets/img/blog/".$imagem); ?>" ></div>
                            <div class="col-md-6" style="padding: 0;margin: 0; margin-top: 10px"><?=$titulo;?></div>
                             </a>
                        </div>
                    <?php  } ?>
                          
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <img src="<?= base_url('assets/img/blog/' . $_noticia['_imagem']); ?>"  title="<?= $_noticia['_titulo']; ?>" style="max-width: 100%">
                <h1 class="_font_title _text-ce_justify"><?= $_noticia['_titulo']; ?></h1>
                <p><?= $_noticia['_data_publicacao']; ?> por <?= $_noticia['_autor']; ?></p>  
                <?= $_noticia['_texto']; ?>
            </div>
        </div>
    </div>
    <div class="row _margin-bottom-70">  <div class="col-md-12"></div></div>
</div>

<!--mobile-->      
<div class="visible-sm visible-xs">
    <div class="container" id="leia-mais">
        <div class="row ">
            <div class="col-md-4">
                <div class="row" >
                    <div class="col-sm-12" >
                        <img src="<?= base_url('assets/img/blog/' . $_noticia['_imagem']); ?>"  title="<?= $_noticia['_titulo']; ?>" style="max-width: 100%"  >
                        <h1 class="_font_title _text-ce_justify"><?= $_noticia['_titulo']; ?></h1>
                        <p><?= $_noticia['_data_publicacao']; ?> por <?= $_noticia['_autor']; ?></p>
                        <?= $_noticia['_texto']; ?>
                    </div>
                    <div class="col-sm-12 col-xs">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>
                                        <h2 class="_font_title_h3 ">Rescentes</h2>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                    for ($i = 0; $i < count($_noticias); $i++) {
                                    $imagem = $_noticias[$i]["_imagem"];
                                    $titulo = $_noticias[$i]["_titulo"];
                                    $texto = $_noticias[$i]["_texto"];
                                    $id = $_noticias[$i]["_url"];
                                    $introducao = $_noticias[$i]["_paragrafo_introducao"];
                                    $Regiao = $_noticias[$i]["_cidade"].' '.$_noticias[$i]["_uf"];
                                    ?>      
                                <tr>
                                    <td>
                                        <a href="<?= base_url('blog/'.$id) ?>"  title="<?=$titulo;?>" alt="<?=$imagem;?>" style="cursor:pointer;" >
                                            <img src="<?=base_url("assets/img/blog/".$imagem); ?>"  "  >
                                            <p> <b><?=$titulo;?></b></p>
                                        </a>  
                                    </td>
                                </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  echo $this->load->view("footer-home"); ?>
