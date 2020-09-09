<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = "site/index";

/*
*----------------------------------------------------------------------
* [ PRESENCIAL ] :
*----------------------------------------------------------------------
*/

$route['presencial'] = "site/portariaPresencial";
$route['presencial-empresa'] = "site/presencialEmpresa";
$route['presencial-blog/(:any)'] = "site/presencialBlog/$1";
$route['presencial-contato'] = "site/presencialContato";
$route['presencial-obrigado'] = "site/presencialObrigado";

/*
*----------------------------------------------------------------------
* [ VIRTUAL ] :
*----------------------------------------------------------------------
*/

$route['virtual'] 				= 'site/portariaVirtual';
$route['virtual-empresa']     	= "site/virtualEmpresa";
$route['virtual-blog/(:any)'] 	= "site/virtualBlog/$1";
$route['blog/(:any)'] 	        = "site/virtualBlog/$1";
$route['virtual-contato']       = "site/virtualContato";
$route['virtual-obrigado']		= "site/virtualObrigado";

$route['termos'] = "site/termos";
$route['politica-de-privacidade'] = "site/politicaPrivacidade";


/*
$route['inc-modal-abandono']= 'site/modalAbandono';
$route['inc-gatilho']= 'site/modalGatilho';
*/

$route['save'] = 'site/salvar';//rota do formulario
$route['salvar_monitoramento']= 'site/salvar_monitoramento';
$route['save-contato'] = 'site/saveContato';
$route['abrir.captacao']= 'site/monitoramento';
