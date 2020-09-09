<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Solicitar Orçamento </b>, Preencha o formulário abaixo e receba uma  proposta  detalhada sem compromisso.</h4>
            </div>
                <div class="modal-body">
                      
                     <?php  $this->load->view("formulario/formulario",['_tipo_'=>'virtual']); ?>    
                </div>
                <div class="modal-footer ">
                

                </div>
        </div>
    </div>
</div>  -