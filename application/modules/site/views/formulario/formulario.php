 <form action="<?=base_url("save"); ?>" name="" method="POST">
    <div class="form-group">
        <input type="text"  name="captacao_cliente" class="form-control "  placeholder="Nome" required=""   >
    </div>
    <div class="form-group">
        <input type="text"  name="captacao_telefone1"  data-mask-type="telefone" class="form-control "    maxlength="20" placeholder="Telefone"  required="">
    </div>
    <div class="form-group">
        <input type="email"  name="captacao_email" class="form-control " placeholder="E-mail"  required="">
    </div>
    <div class="form-group">
        <?php
            $datatipo=[
                'presencial'=>'PT - FISICA',
                'presencial-empresa'=>'PT - FISICA',
                'presencial-blog'=>'PT - FISICA',
                'presencial-contato'=>'PT - FISICA',
                'virtual'=>'PT - VIRTUAL',
                'virtual-empresa'=>'PT - VIRTUAL',
                'virtual-blog'=>'PT - VIRTUAL',
                'virtual-contato'=>'PT - FISICA'
            ];
        ?>
        <input type="hidden"  name="captacao_tipo_servico"   value="<?=trim($datatipo[$_tipo_]);?>" class="form-control" />
    </div>
    <input type="hidden"  name="origem" value="<?=base_url(uri_string());?>" >
    <!--<input type="hidden"  name="captacao_fonte_oportunidade" value="<?=isset($_GET['utm_term'])?$_GET['utm_term']:'5d934add36d51f0031bc858a' ?>" >
    -->
    <input type="hidden"  name="captacao_fonte_oportunidade" value="5d934add36d51f0031bc858a" >
    <button type="submit" class="btn  btn-danger" style=" width: 100%;  padding: 10px 0;  font-size: 16px  ;   border-radius: 5px; background: red ">SOLICITAR <b>ORÇAMENTO</b></button>
</form>  