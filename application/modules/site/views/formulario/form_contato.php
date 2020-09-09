<form action="<?= base_url("save-contato"); ?>" name="" method="POST">
    <div class="form-group">
        <input type="text"  name="captacao_cliente"   value="" class="form-control "  placeholder="Nome" required="">
    </div>
    <div class="form-group">
        <input type="email"  name="captacao_email" class="form-control " value=""  placeholder="E-mail"  required="">
    </div>
    <div class="form-group">
            <input type="text" name="captacao_telefone1"  value="" class="form-control msk_telefone" maxlength="20" placeholder=" Telefone" required="">   
    </div>
    <div class="form-group">
        <select name="captacao_assunto" class="form-control " required="">
            <option value="">::Selecione um Interesse::</option>
            <option value="2">FAQ</option>
            <option value="3">Trabalhe Conosco</option>
        </select> 
        <input type="hidden"  name="captacao_origem" value="<?=base_url(uri_string());?>" >
        <input type="hidden"  name="captacao_fonte_oportunidade" value="5d934add36d51f0031bc858a" >
    </div>
    <div class="form-group">
        <textarea  name="captacao_mensagem" class="form-control form-control_fale_conosco" cols="5" rows="5"  placeholder="Deixe sua Mensagem" required=""></textarea>
    </div>
    <div class="form-group text-center">                
        <button type="submit" class="btn  btn-danger "  style="width: 100%">Enviar Contato</button>
    </div>
</form>  
