 <form action="<?= base_url("salvar_monitoramento"); ?>" name="" method="POST">
    <div class="form-group">
        <input type="text"  name="captacao_cliente" class="form-control "  placeholder="Deixe seu Nome" required="">
    </div>
     <div class="form-group">
        <input type="text"  name="captacao_telefone1"  data-mask-type="telefone" class="form-control "    maxlength="20" placeholder="Deixe Telefone"  required="">
    </div>
    <div class="form-group">
        <input type="email"  name="captacao_email" class="form-control " placeholder="Deixe seu E-mail"  required="">
    </div>
    <div class="form-group">
        <select name="captacao_tipo_servico" class="form-control"  required="">
            <option value="" selected="">:: Selecione o Assunto ::</option>
            <option value="PT - VIRTUAL">Portaria Virtual</option>                
            <option value="PT - FISICA">Portaria Fisica</option>                
        </select>
    </div>
    <div class="form-group">
        <select name="captacao_fonte_oportunidade" class="form-control"  required="">
            <option value="" selected="">:: Como que o cliente encontrou a Volpato ? ::</option>
            <option value="5d8e64839dba92002c041933">Google e Outros Buscadores</option>                
            <option value="5d8e64839dba92002c041931">Indicação por Clientes</option>
            <option value="5d8e64839dba92002c04192f">Contato por Telefone</option>
            <option value="5da0b6501ced8d0022439c70">Facebook</option> 
            <option value="5d934add36d51f0031bc858a">Site</option>
        </select>
    </div>
    <nput type="hidden"  name="origem" value="<?= base_url(uri_string()); ?>" >
        <input type="hidden"  name="url" value="<?=$_SERVER["REQUEST_URI"]?>" >
    <button type="submit" class="btn  btn-danger" style=" width: 100%;  padding: 10px 0;  font-size: 16px  ;   border-radius: 5px; background: red ">SOLICITAR <b>ORÇAMENTO</b>
    </button>
</form>  