<?= $this->load->view("layout/nav"); ?>
<div  class="container-fliuid" style="background: #eee; padding-bottom: 100px" >

    <div  id="banner-fale-conosco" class="row">
        <div class="col-md-12">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12"><h1 class="title-banner">CONTATO</h1></div>
                </div>
            </div>
        </div>
    </div>
    <div  class="container "  >
        <div class="row">
            <hr class="_margin-bottom-40">
            <div class="col-md-6">
                <h3 class="_font_title_h3">Horário de Atendimento:</h3>
                <p class="_font_paragrafo"><strong><i class="fa fa-mail-forward" aria-hidden="true"></i>  Seg. a Sex. -</strong> 08:00 às 20:00 | Sábado - 09:00 às 14:00</p>
                <p class="_font_paragrafo"><strong><i class="fa fa-envelope" aria-hidden="true"></i> Email:</strong> volpato@grupovolpato.com</p>
                <p class="_font_paragrafo"><strong><i class="fa fa-phone" aria-hidden="true"></i> Telefone:</strong> 3003-4003</p>           
                <HR>

                <h3 class="_font_title_h3">Nossas Localizações:</h3>
                <ul>
                    <li><p>Rua Pereira Franco, 188 - São João, Porto Alegre - RS, 90240</p></li>
                    <li><p>Av. Amazonas, Nº 205 São Geraldo - Porto Alegre/RS</p></li>
                    <li><p>Av. Dorival Cândido Luz de Oliveira, 6963 - Parque Florido, Gravataí - RS, 94070</p></li>
                    <li><p>Rua: Dr Alexandre Gutierres, 80, Agua Verde – Curitiba - PR</p></li>
                    <li><p>R. Fernando Ferrari, 1231 - Centro, Esteio - RS, 93260-030</p></li>
                    <li><p>Av. Nestor de Moura Jardim, Nº 1725 - Nossa Sra. de Fatima, Guaíba - RS, 92500-000</p></li>
                </ul>
                <br>
                <img src="<?= base_url('assets/img/fale-conosco.png'); ?>" width="100%"  alt="imagem da central de monitomenro" title="base Volpato" >
           </div>   
            <div class=" col-md-6">
                 <h2 class="_font_title_h3   _text-ce_justify " title="Seja bem-vindo a VOLPATO">A Volpato tem o prazer em falar com você e tirar todas as suas dúvidas. </h2>
                <div class="panel panel-default" > 
                    <div class="panel-body"> 
                        <?= $this->load->view("formulario/form_contato"); ?>  
                    </div> 
                </div>
            </div>
        </div>
    </div>

   
</div>


<?= $this->load->view("footer-home"); ?>