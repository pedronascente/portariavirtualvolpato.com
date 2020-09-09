<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();  
	}  
	public function index() {
		$array_list_noticias = $this->findAllNoticias();
		$url ='http://seguidor.com.br/app.uploadbnner/banner/findByDominio/portariavolpato.com.br/1/1';
		$result = json_decode($this->curl->simple_get($url));
		$this->loadPage('site/paginas/index', [
			'_noticias' => $array_list_noticias,
			'_banner_capa'=>$result
		]);
	}
/*
*-------------------------------------------------------------------------------------------------------
* [presencial]
*-------------------------------------------------------------------------------------------------------
*/
public function portariaPresencial() {
	$array_list_noticias = $this->findAllNoticias();
	$url ='http://seguidor.com.br/app.uploadbnner/banner/findByDominio/portariavolpato.com.br/1/2';
	$result = json_decode($this->curl->simple_get($url));
	$url_mobiel ='http://seguidor.com.br/app.uploadbnner/banner/findByDominio/portariavolpato.com.br/2/1';
	$result_mobie = json_decode($this->curl->simple_get($url_mobiel));

	$this->loadPage('site/paginas/presencial/index', [
		'_noticias' => $array_list_noticias,
		'_banner_capa'=>$result,
		'_banner_capa_mobie'=>$result_mobie
	]);
}
public function presencialEmpresa() {
	$this->loadPage('site/paginas/presencial/empresa');
}
public function presencialBlog($id = 0) {
	$array_list_noticias = $this->findAllNoticias();
	$noticia = $this->getNoticias($id); 
	$this->loadPage('site/paginas/presencial/blog', [
		'_noticias' => $array_list_noticias,
		'_noticia' => $noticia
	]);
}
public function presencialContato() {
	$this->loadPage('site/paginas/presencial/contato');
}
public function presencialObrigado(){
	$this->loadPage('site/paginas/presencial/obrigado');    
}
/*
*-------------------------------------------------------------------------------------------------------
* [virtual]
*-------------------------------------------------------------------------------------------------------
*/
public function portariaVirtual() {
	$array_list_noticias = $this->findAllNoticias();
	$url                 = "https://seguidor.com.br/app.uploadbnner/banner/findByDominio/portariavolpato.com.br/1/3";	
	$url_mobiel          = "https://seguidor.com.br/app.uploadbnner/banner/findByDominio/portariavolpato.com.br/2/3";				
	$result              = json_decode($this->curl->simple_get($url));
	$result_mobie        = json_decode($this->curl->simple_get($url_mobiel));										


//var_dump($result); die;


	$this->loadPage('site/paginas/virtual/index', [
		'_noticias' => $array_list_noticias,
		'_list_banner' =>$result,
		'_list_banner_mobie'=>$result_mobie	
	]);
}     
public function virtualEmpresa() {
	$this->loadPage('site/paginas/virtual/empresa');
}
public function virtualBlog($id = 0) {
	$array_list_noticias = $this->findAllNoticias();
	$noticia = $this->getNoticias($id);
	$this->loadPage('site/paginas/virtual/blog', [
		'_noticias' => $array_list_noticias,
		'_noticia' => $noticia
	]);
}
public function virtualContato() {
	$this->loadPage('site/paginas/virtual/contato');
}
public function virtualObrigado() {
	$this->loadPage('site/paginas/virtual/obrigado');    
}
public function homeComVideo() {
	$array_list_noticias = $this->findAllNoticias();
	$this->loadPage('site/paginas/home_com_video', [
		'_noticias' => $array_list_noticias
	]);
}
														/*public function modalAbandono() {
																$this->loadPage('formulario/form_modal_abandono');
															}*/
															public function modalGatilho() {
																$this->loadPage('formulario/form_modal_gatilho');
															} 
															public function areaDoCliente() {
																$this->loadPage('site/paginas/area-do-cliente-volpato');
															}
															public function termos() {
																$this->loadPage('site/paginas/termos');
															}
															public function politicaPrivacidade() {
																$this->loadPage('site/paginas/politica-de-privacidade');
															}
															public function monitoramento() {
																$this->loadPage('site/paginas/monitoramento');
															}
															public function getNoticias($id) {
																$arr_noticias = $this->findAllNoticias();
																for ($i = 0; $i < count($arr_noticias); $i++) {
																	if ($arr_noticias[$i]['_id'] == $id || $arr_noticias[$i]['_url'] == $id) {
																		$noticia = $arr_noticias[$i];
																		break;
																	} 
																}
																return $noticia;
															}
														    //Responsavel por registrar as captações vindas do monitoramento
															public function salvar_monitoramento() {
																$this->enviarCaptacao( $this->input->post(),'https://seguidor.com.br/pluga.co/portaria/automacao_captacao.php');
																$this->loadPage('site/paginas/orcamento_enviado');    
															}
															public function salvar(){			
																$_dados_inputs = [
																	'captacao_cliente' =>$this->input->post('captacao_cliente'),
																	'captacao_telefone1'=>$this->input->post('captacao_telefone1'),
																	'captacao_email'=>$this->input->post('captacao_email'),
																	'origem'=>$this->input->post('origem'),
																	'captacao_interesse'=>$this->input->post('captacao_tipo_servico'),
																];
																$this->db->insert('captacao', $_dados_inputs);
																$this->enviarCaptacao( $this->input->post(),"https://seguidor.com.br/pluga.co/portaria/automacao_captacao.php");

																if( trim($this->input->post('captacao_tipo_servico')) =='PT - FISICA'){
																	redirect(base_url('presencial-obrigado'), 'refresh');
																}else if(trim($this->input->post('captacao_tipo_servico')) =='PT - VIRTUAL'){
																	redirect(base_url('virtual-obrigado'), 'refresh');
																}
															}
																							//FORMULARIO DE CONTATO
															public function saveContato() {
																$array_assunto = [
																	1=>$this->input->post('captacao_tipo_servico'),
																	2=>'FAQ',
																	3=>'Trabalhe Conosco',
																];
																$data_email = null;
																$assunto = $this->input->post('captacao_assunto') ;
																if(!empty($assunto) && $assunto == "1" ){
																	$url = 'https://seguidor.com.br/pluga.co/portaria/automacao_captacao.php';
																	$dados=[
																		'captacao_cliente'=>$this->input->post('captacao_cliente'),
																		'captacao_telefone1'=>$this->input->post('captacao_telefone1'),
																		'captacao_email'=>$this->input->post('captacao_email'),
																		'captacao_tipo_servico'=>$array_assunto[$this->input->post('captacao_assunto')],
																		'origem' =>$this->input->post('captacao_origem'),
																		'captacao_fonte_oportunidade' =>$this->input->post('captacao_fonte_oportunidade'),
																	];
																	$this->enviarCaptacao($dados,$url);
																}else{
																	$data_email =  [
																		'contato_cliente' => $this->input->post('captacao_cliente'),
																		'contato_email' => $this->input->post('captacao_email'),
																		'contato_destino' => "desenvolvimento@grupovolpato.com",
																		'contato_telefone' => $this->input->post('captacao_telefone1'),
																		'contato_assunto' => $array_assunto[$this->input->post('captacao_assunto')],
																		'contato_menssagem' => $this->input->post('captacao_mensagem'),
																		'contato_origem' => $this->input->post('captacao_origem'),
																	];
																	$this->sendEmail($data_email, 'contato');           
																}
																redirect(base_url('virtual-obrigado'), 'refresh');
															}
															public function anT_spam($Dados) {
																if (!empty($Dados['captacao_cliente']) && !empty($Dados['captacao_telefone1']) && !empty($Dados['captacao_email'])) {
																	if ($this->strCharFind('(', $Dados['captacao_telefone1']) && $this->strCharFind(')', $Dados['captacao_telefone1']) && $this->strCharFind('-', $Dados['captacao_telefone1'])) {
																		$extrair_ddd = (int) substr($Dados['captacao_telefone1'], 1, 2);
																		if (is_integer($extrair_ddd)) {
																			return $Dados;
																		}
																	} else {
																		return false;
																	}
																} else {
																	return false;
																}
															}
															public function findAllNoticias() {
																$arr_noticias = [
																	[
																		'_id' => 1,
																		'_data_publicacao' => '15 DE AGOSTO de 2019',
																		'_imagem' => 'os-principais-sinais-de-que-seu-condomInio-precisa-de-portaria-virtual.png',
																		'_url' => 'os-principais-sinais-de-que-seu-condomInio-precisa-de-portaria-virtual',
																		'_uf' => '',
																		'_cidade' => '',
																		'_autor' => 'Larissa Teixeira',
																		'_paragrafo_introducao' => 'Condomínio é um dos alvos preferidos de assaltantes. Por quê? É lá onde encontram a maior quantidade de bens materiais concentrados em um só lugar. ',
																		'_titulo' => 'Os principais sinais de que seu condomínio precisa de Portaria Virtual',
																		'_texto' => '<p class="_font_paragrafo">Condomínio é um dos alvos preferidos de assaltantes. Por quê? É lá onde encontram a maior quantidade de bens materiais concentrados em um só lugar. </p>
																		<p class="_font_paragrafo">Então, para eles é muito mais cômodo invadir um condomínio e “fazer a limpa”, como eles falam. </p>
																		<p class="_font_paragrafo">A Portaria Virtual têm sido o principal meio de inibir e prevenir a ação dessas pessoas. No entanto, os síndicos encontram obstáculos para definir se seu condomínio precisa ou não de uma.</p>
																		<p class="_font_paragrafo">Para ajudá-lo nessa decisão, listamos 5 sinais que indicam se o seu condomínio precisa ou não de uma Portaria Virtual.</p>
																		<p class="_font_paragrafo"><b>1 – Custo elevado com o condomínio</b></p>
																		<p class="_font_paragrafo">Você já parou para pensar o quanto está sendo difícil manter as contas do seu condomínio em dia por causa do alto custo?</p>
																		<p class="_font_paragrafo">Muitos condôminos ficam incomodados, principalmente nas assembleias do condomínio, quando a necessidade de um maior investimento se faz necessária.
																		Uma das maiores vantagens da Portaria Virtual está na redução de custos, pois garante uma economia de até 50% em relação à portaria física, devido à redução do quadro de funcionários no local.</p>
																		<p class="_font_paragrafo"><b>2 – Alto índice de violência</b></p>
																		<p class="_font_paragrafo">O índice de criminalidade tem crescido muito nos condomínios. Não é difícil encontrar diversos moradores que já passaram pela experiência de perder seus pertences por uma falha da portaria no condomínio. Com isso, um serviço de segurança adequado é essencial para que situações de criminalidade deixem de existir.</p>
																		<p class="_font_paragrafo">A questão da violência é mais um item que a Portaria Virtual resolve, pois oferece uma nova maneira de proteger a todos, controlando os acessos do condomínio através de câmeras de segurança podendo identificar qualquer ação ilícita por parte de algum criminoso, dentro e fora do condomínio.</p>
																		<p class="_font_paragrafo"><b>3 – Problemas com a grande quantidade de funcionários e passivo trabalhista</b></p>
																		<p class="_font_paragrafo">O alto número de funcionários contratados para que o condomínio tenha uma portaria qualificada, pode ser um problema. A intensa movimentação de funcionários dentro do condomínio pode gerar cansaço e preocupações a mais ao síndico, além de ser visto como uma oportunidade para criminosos.</p>
																		<p class="_font_paragrafo">Um condomínio precisa de uma vigilância 24 horas por dia e para isso é necessário que uma grande quantidade de funcionários esteja envolvida na realização de trocas de funções e de turnos, o que pode acabar gerando problemas como faltas, atrasos e falhas.</p>
																		<p class="_font_paragrafo">Com a Portaria Virtual esses problemas deixarão de existir e o síndico não irá mais precisar se preocupar com a grande quantidade de funcionários do condomínio.</p>
																		<p class="_font_paragrafo">Passivo trabalhista Um grave problema com os funcionários pode estar relacionado ao Passivo Trabalhista, onde qualquer problema judicial é de responsabilidade do condomínio.
																		Com a Portaria Virtual não haverá problemas de qualquer natureza jurídica com a função do porteiro, pois o cargo não será mais gerenciado pelo condomínio e sim pela empresa contratada.</p>
																		<p class="_font_paragrafo"><b> 4 – Perda sobre o controle de entrada e saída de pessoas</b></p>
																		<p class="_font_paragrafo">Percebeu que não existe controle algum sobre quem entra e sai no seu condomínio?  Infelizmente o porteiro está sujeito a diversas distrações e nem sempre saberá quem está entrando ou para aonde aquela pessoa está indo, podendo a qualquer momento ser rendido ou forçado a permitir a entrada de pessoas mal intencionadas no prédio.
																		Com a Portaria Virtual, o controle de acesso é restrito. </p>
																		<p class="_font_paragrafo"> Para visitantes, agentes terceirizados e pessoas que tenham a intenção de entrar no condomínio, é necessário contato com um operador que entrará em contato com o morador para confirmar se a entrada será ou não autorizada.</p>
																		<p class="_font_paragrafo"> <b> 5 – Condomínio de pequeno porte</b></p>
																		<p class="_font_paragrafo">Em condomínios de pequeno porte, onde há poucas unidades e a presença da portaria física no local se faz presente, o custo com a folha de pagamento dos funcionários irá pesar mais</p>
																		<p class="_font_paragrafo">Levando em consideração que a economia passou a ser prioridade no seu orçamento e o seu condomínio é de pequeno porte, sendo assim ele é um ótimo candidato para implantar a Portaria Virtual.<p>
																		<p class="_font_paragrafo"> Esperamos ter ajudado você com as informações sobre a Portaria Virtual. Caso ainda tenha dúvidas sobre este serviço, você pode clicar aqui ou então <b>ligar para 3003-4003</b> que teremos prazer em atendê-lo!</p> ',
																	],
																	[
																		'_id' => 2,
																		'_titulo' => 'Você sabe quais são os principais benefícios da Portaria Virtual?',
																		'_data_publicacao' => '04 DE JUNHO DE  2019',
																		'_imagem' => 'voce-sabe-quais-sao-os-principais-beneficios-da-portaria-virtual.png',
																		'_url' => 'voce-sabe-quais-sao-os-principais-beneficios-da-portaria-virtual',
																		'_uf' => '',
																		'_cidade' => '',
																		'_autor' => 'Larissa Teixeira',
																		'_paragrafo_introducao' => 'O primeiro veículo a ser recuperado foi um Vectra prata em Canoas, há 18 km de Porto Alegre. O roubo aconteceu no bairro Estância Velha.',
																		'_texto' => '
																		<p class="_font_paragrafo"><b></b></p>
																		<p class="_font_paragrafo">O monitoramento a distância por meio de câmeras e microfones que gravam todas as movimentações em condomínios pode ser conhecido por três nomes diferentes, mas que significam a mesma coisa: portaria virtual, remota ou inteligente.</p>
																		<p class="_font_paragrafo">Essa tecnologia é relativamente nova e, por esse motivo, muitas dúvidas pairam sobre os benefícios da Portaria Virtual. Alguns síndicos e empresas que administram condomínios ainda ficam com receio na hora de contratar o serviço.</p>
																		<p class="_font_paragrafo">Para que suas dúvidas sejam sanadas de vez, confira a lista dos benefícios da Portaria Virtual:</p>
																		<p class="_font_paragrafo"><b>Aumento da segurança</b></p>
																		<p class="_font_paragrafo">Com certeza, a principal vantagem. Sem dúvidas a Portaria Virtual aumenta a segurança e agrega valor a um condomínio. Isso porque todo o seu funcionamento é feito REMOTAMENTE. Ou seja, o controle torna-se mais rigoroso.</p>
																		<p class="_font_paragrafo">Desta forma, o acesso ao condomínio é feito de forma muito mais controlada. Os moradores recebem um controle e TAG exclusivo.</p>
																		<p class="_font_paragrafo">Já os visitantes ou prestadores de serviços podem ser cadastrados previamente e a entrada é liberada. Caso o condômino não tenha feito esse cadastro, a entrada só é permitida mediante contato com o morador. Todas as autorizações ficam registradas no sistema.</p>
																		<p class="_font_paragrafo">Além disso, as empresas especializadas e sérias oferecem uma Central de Monitoramento 24h e Equipes Táticas.</p>
																		<p class="_font_paragrafo"><b>Redução de custos</b></p>
																		<p class="_font_paragrafo">Você sabia que é possível reduzir em até 50% os gastos do condomínio com funcionários? Por ser um sistema remoto, a empresa contratada que é responsável pelas pessoas que serão os “porteiros virtuais”.</p>
																		<p class="_font_paragrafo">O valor de investimento inicial pode variar de R$3.800,00 a R$10.000,00, dependendo da estrutura do condomínio. Pode parecer um valor alto a primeira vista, mas o investimento com certeza valerá a pena.</p>
																		<p class="_font_paragrafo"><b>Benefício para o síndico</b></p>
																		<p class="_font_paragrafo">Aqui batemos na tecla do atendimento remoto novamente. Para os síndicos a responsabilidade com faltas, atrasos e substituição de porteiros será nula.</p>
																		<p class="_font_paragrafo">E se houver queda de energia?</p>
																		<p class="_font_paragrafo">As empresas sérias disponibilizam o “nobreak” no condomínio, ou seja, mesmo que aconteça uma queda de energia os portões continuam funcionando.</p>
																		<p class="_font_paragrafo"><b>E a internet? O que acontece se oscilar?</b></p>
																		<p class="_font_paragrafo">Nada! Pois a empresa contratada deverá contar com uma rede privada de comunicações que não deixa nenhum condomínio refém de oscilações.</p>
																		<p class="_font_paragrafo">A portaria remota para condomínios é, ao mesmo tempo, uma realidade e uma tendência. Em termos gerais, a Portaria Virtual tem se mostrado muito vantajosa para os condomínios que contratam, além de ser um mercado que só cresce e cada vez se aprimora mais em termos de tecnologia.</p>
																		<p class="_font_paragrafo"><b>Ficou interessado em contratar a Portaria Virtual da Volpato?</b></p>
																		<p class="_font_paragrafo"><b><a href="javascript:void(0)" class=" text-center " data-toggle="modal" data-target="#myModal">Clique aqui e realize uma cotação!</a></b></p>
																		',
																	],
																	[
																		'_id' => 3,
																		'_titulo' => 'Como funciona a Portaria Virtual para condomínios',
																		'_data_publicacao' => '02 DE MAIO DE 2018',
																		'_imagem' => 'como-funciona-o-acesso-do-visitante.png',
																		'_url' => 'como-funciona-a-portaria-virtual-para-condominios',
																		'_uf' => '',
																		'_cidade' => '',
																		'_autor' => 'Larissa Teixeira',
																		'_paragrafo_introducao' => 'O índice de criminalidade em condomínios aumenta a cada ano que passa e uma das estratégias mais utilizadas por criminosos para invadir condomínios é a rendição do porteiro, tendo em vista que um porteiro físico está sujeito a distrações e cansaço.',
																		'_texto' => '
																		<p class="_font_paragrafo">O índice de criminalidade em condomínios aumenta a cada ano que passa e uma das estratégias mais utilizadas por criminosos para invadir condomínios é a rendição do porteiro, tendo em vista que um porteiro físico está sujeito a distrações e cansaço.</p>
																		<p class="_font_paragrafo">Uma solução que diversos síndicos acharam é a Portaria Virtual, que acaba de uma vez com esse problema, pois não há um funcionário para vistoriar e fiscalizar presencialmente os portões de entrada e saída do condomínio.Atualmente esse sistema é o mais moderno e com o melhor custo-benefício para administrar o fluxo de entrada e saída em um local de forma segura e eficiente.</p>
																		<p class="_font_paragrafo">Veja abaixo como funciona a Portaria Virtual para condomínios.</p>
																		<p class="_font_paragrafo"><b>Como funciona a Portaria Virtual</b></p>

																		<iframe width="100%"  src="https://www.youtube.com/embed/FdRSsDoN-Xw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   

																		<p class="_font_paragrafo">Com a Portaria Virtual não existe mais a presença de porteiros humanos no condomínio, pois são substituídos por dispositivos de segurança implantados no local, como câmeras, leitores e eclusas com intertravamento.</p>
																		<p class="_font_paragrafo">Todos esses dispositivos são controlados e monitorados remotamente por uma equipe localizada na empresa prestadora do serviço.</p>
																		<p class="_font_paragrafo">Esta equipe realiza todo o controle de vigilância do local em tempo real, acionando a abertura e fechamento dos portões, assim monitorando todo o fluxo de entrada e saída de moradores, funcionários e pessoas que não costumam frequentar o condomínio, como os visitantes e entregadores.</p>
																		<iframe width="100%"  src="https://www.youtube.com/embed/M2spm-Ntexc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

																		<p class="_font_paragrafo"><b>Eclusa com intertravamento</b></p>
																		<p class="_font_paragrafo">Um dos primeiros passos para a implementação da Portaria Virtual é a construção da eclusa, constituída de portões duplos intertravados que impedem a entrada oportunista de criminosos.</p>
																		<p class="_font_paragrafo">A implementação da eclusa pode ser realizada tanto na entrada de pedestres como na de carros, o portão interno somente é liberado quando o morador ou visitante estiver no interior da eclusa.</p>
																		<p class="_font_paragrafo"><b>Como funciona o acesso do morador</b></p>
																		<p class="_font_paragrafo">O morador cadastrado possui um dispositivo, que ao aproximá-lo de um leitor o primeiro portão da eclusa abre e fecha automaticamente, estando o morador protegido dentro da eclusa, procede com a abertura do segundo portão, também utilizando o dispositivo.</p>
																		<p class="_font_paragrafo">Vale ressaltar que só irá acontecer a liberação do segundo portão que dá acesso ao condomínio, após o primeiro portão fechar completamente.</p>
																		<p class="_font_paragrafo"><b>Como funciona o acesso do visitante</b></p>
																		<p class="_font_paragrafo">Quando o visitante chega ao condomínio, ele se comunica com a central tocando o único botão do interfone. O atendente da portaria faz a identificação e entra em contato com o morador para que autorize a entrada. Autorizado, o operador aciona a abertura do 1º portão e logo após o seu fechamento o 2º portão é aberto.</p>
																		<p class="_font_paragrafo">Caso haja a necessidade, o operador poderá possibilitar que o visitante fale diretamente com o morador através do interfone.</p>
																		<p class="_font_paragrafo">Gostou desse post e quer saber mais sobre a Portaria Virtual? Então clique aqui e confira o post que preparamos sobre os 4 sinais que indicam que o seu condomínio precisa de uma Portaria Virtual.</p>
																		',
																	],
																];
																return $arr_noticias;
															}	

																										/*
																										 * ****************************************************************************************************************************************************
																										 * METODOS PRIVADOS :
																										 * ****************************************************************************************************************************************************
																										 */
																										private function strCharFind($needle, $haystack) {
																											$return = FALSE;
																											$arr = str_split($haystack, 1);
																											foreach ($arr as $value) {
																												if ($value == strtolower($needle) || $value == strtoupper($needle)) {
																													$return = TRUE;
																												}
																											}
																											return $return;
																										}
																										private function sendEmail($data, $tipo = null) {
																											switch ($tipo) {
																												case 'contato':
																												$mensagem = '
																												<table border="1">
																												<tr><td><b>Cliente:</b></td><td>' . $data['contato_cliente'] . '</td></tr>
																												<tr><td><b>Email:</b></td><td>' . $data['contato_email'] . '</td></tr>
																												<tr><td><b>Telefone:</b></td><td>' . $data['contato_telefone'] . '</td></tr>
																												<tr><td><b>Assunto:</b></td><td>' . $data['contato_assunto'] . '</td></tr>
																												<tr><td><b>Mensagem:</b></td><td>' . $data['contato_menssagem'] . '</td></tr>
																												<tr><td><b>Origem:</b></td><td>' . $data['contato_origem'] . '</td></tr>
																												</table>';
																												$this->email->from("revendavolpato@revendavolpato.com", "FORMULARIO : CONTATO");
																												$this->email->to($data['contato_destino'], $data['contato_cliente']);
																												$this->email->subject("SITE : PORTARIA VOLPATO");
																												$this->email->message($mensagem);
																												$this->email->send();
																												break;																														
																											}
																										}
																												//enviar captacao para o pluga.co (seguidor)
																										private function enviarCaptacao($dados,$url) {
																											$ch = curl_init();
																											curl_setopt($ch, CURLOPT_URL, $url);
																											curl_setopt($ch, CURLOPT_POST, true);
																											curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
																											$result = curl_exec($ch);
																											curl_close($ch);
																										}
																										private function loadPage($moduleRoute, $parameters = '') {
																											$data['assets'] = $this->loadAssets($moduleRoute);
																											$data['content'] = $this->load->view($moduleRoute, $parameters, TRUE);
																											$this->load->view('page', $data);
																										}
																										private function loadAssets($moduleRoute) {
																											$url = base_url();
																											switch ($moduleRoute) {
																												case '':
																												return array(
																													'css' => '
																													',
																													'javaScriptHeader' => '

																													',
																													'javaScriptFooter' => ' 										
																													'
																												);
																												break;            
																											}
																										}
} //Site.