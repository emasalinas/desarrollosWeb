<?php
/*********************************************************************
* Codigo del archivo	: PHP_001_constantesGlobales
* Nombre del archivo	: constantesGlobales.php
* Objetivo del archivo	: Constantes Globales del sistema
*
* Categoria				: PHP
* Paquete				: 001
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* URL's del sitio
*********************************************************************/

/********************************************************************
* Constantes del sistema
*********************************************************************/
$vFlag	= '';
if($vFlag == 'dev'){
define('CONS_BDHOST', 'localhost');
define('CONS_BDUSER', 'fe000180_dev');
define('CONS_BDPASS', '72tigeMUfu');
define('CONS_BDNAME', 'fe000180_dev');
}elseif($vFlag == 'qas'){
define('CONS_BDHOST', 'localhost');
define('CONS_BDUSER', 'fe000180_qas');
define('CONS_BDPASS', '72tigeMUfu');
define('CONS_BDNAME', 'fe000180_qas');
}elseif($vFlag == 'prd'){
define('CONS_BDHOST', 'localhost');
define('CONS_BDUSER', 'fe000180_prd');
define('CONS_BDPASS', '72tigeMUfu');
define('CONS_BDNAME', 'fe000180_prd');
}else{
define('CONS_BDHOST', 'localhost');
define('CONS_BDUSER', 'root');
define('CONS_BDPASS', '');
define('CONS_BDNAME', 'meansTravels');
}

define('C_PREFIX_HOME',			'/meansTravels');
define('C_ENCRYPTION_STRING', 	'enCryptMeansPlace$#');

define('C_USER_LOGIN_IN', 	'userIn');
define('C_USER_LOGIN_OUT', 	'userOut');

/********************************************************************
* Constantes del negocio
*********************************************************************/
define('estadoViaje0', 			'Sin Confirmar');
define('estadoViaje1', 			'Confirmado');

define('estadoAsientoLibre', 		'0');
define('estadoAsientoPendiente',	'1');
define('estadoAsientoOcupado', 		'2');

?>