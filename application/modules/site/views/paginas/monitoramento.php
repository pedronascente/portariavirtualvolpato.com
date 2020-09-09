<?= $this->load->view("layout/nav_monitoramento"); ?>

<div class="container-fluid _bg-azul" >     
    <div class="container">
        <div   class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="_font_title  text-right _color_branco _padding_buttom">Abrir captação</h1>
            </div>
        </div>
    </div>
</div>
<div  class="container">
    <div class="row">
        <div class=" col-md-12">
            <div class="panel panel-default" style="margin-top: 50px"> 
                <div class="panel-body text-center"> 
                     <?= $this->load->view("formulario/formulario_monitoramento"); ?>  
                </div> 
            </div>
        </div>
        
    </div>
</div>
<div class="row _margin-bottom-70"> <div class="col-md-12"></div></div>
<?= $this->load->view("footer_monitoramento"); ?>