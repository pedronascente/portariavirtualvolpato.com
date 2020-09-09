<?php echo $this->load->view("layout/nav-home");?>	
<!--desktop-->
<?php	$banner_capa = $_banner_capa->Lista[0]->src .$_banner_capa->Lista[0]->imagem ;  ?>
<div class="container-fluid background-vermelho    visible-lg  visible-md  hidden-xs  hidden-sm "  >
	<img src="<?php echo $banner_capa; ?>"  alt=""  title=""  style="max-width: 100%" >
	<div class="container "   style="position: absolute;  top: 300px; left: 0; right: 0">
		<div class="row">
			<div class="col-lg-4 col-md-4" >
					<p style="font-size: 2vw; color: #fff;line-height: 1.2;">PORTARIA <span style="font-size:4vw;font-weight: bold; ">PRESENCIAL</span></p>
					<a href="<?php echo base_url('presencial');?>" title="Clique aqui" class="btn btn-danger">SAIBA MAIS</a>
			</div>	
			<div class="col-lg-4 col-md-4 hidden-xs">						
			</div>	
			<div class="col-lg-4 col-md-4    hidden-xs">
				<p style="font-size: 2vw; color: #fff;line-height: 1.2;">PORTARIA <span style="font-size:4vw; font-weight: bold;">VIRTUAL</span></p>
				<a href="<?php echo base_url('virtual');?>"  title="Clique aqui" class="btn btn-danger">SAIBA MAIS</a>	
			</div>	
		</div>
	</div>	
</div>
<!--mobile-->
<div class="container-fluid background-vermelho  visible-xs  visible-sm  hidden-md  hidden-lg "  >
	<div class="row text-center  " style="border-bottom: 15px solid #fff">
		<div class="col-xs-12">
			<a href="<?=base_url('presencial')?>"  style="display: block;" >
				<img src="<?=base_url('assets/img/banners/mobie/portaria-presencial.jpg')?>"  alt=""  title=""  style="max-width: 100%" >	
			</a>		
		</div>
		<div class="row text-center">
			<div class="col-xs-12" >
				<a href="<?=base_url('virtual')?>"   style="display: block;"   >
					<img src="<?=base_url('assets/img/banners/mobie/portaria-virtual.jpg')?>"  alt=""  title=""  style="max-width: 100%"  >
				</a>
			</div>
	    </div>
	</div>
</div>
<?php  echo $this->load->view("footer-home");